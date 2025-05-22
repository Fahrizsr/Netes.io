<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Monitoring Sensor</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
    <style>
    
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            background-color: #ffffff;
            color: #333;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .sidebar {
            width: 90px;
            background-color: #f5faff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
            border-right: 1px solid #ddd;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
        }

        .nav-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 12px;
            color: #3ba57d;
            border: none;
            background-color: rgba(59, 165, 125, 0.05);
            padding: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            border-radius: 8px;
            width: 60px;
            height: 60px;
            text-align: center;
        }

        .nav-button:hover,
        .nav-button.active {
            background-color: rgba(59, 165, 125, 0.2);
        }

        .nav-icon {
            margin-bottom: 4px;
            width: 24px;
            height: 24px;
        }

        .container {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-left: 90px;
        }

        h2 {
            text-align: center;
            color: #3ba57d;
            margin-bottom: 20px;
        }

        .chart-section {
            background-color: #e5faf3;
            border-radius: 12px;
            padding: 15px;
            margin: 15px 0;
            width: 80%;
            max-width: 600px;
        }

        .chart-section h4 {
            text-align: center;
            color: #2e8b57;
            margin-top: 0;
        }

        canvas {
            max-height: 300px;
        }

        .status-connection {
            margin: 10px 0;
            font-size: 14px;
            text-align: center;
        }

        .status {
            background-color: #3ba57d;
            color: white;
            padding: 3px 10px;
            border-radius: 8px;
            font-weight: bold;
        }

        .log-list {
            margin-top: 10px;
            width: 80%;
            max-width: 600px;
        }

        .log-list h4 {
            color: #2e8b57;
            text-align: center;
        }

        .log-item {
            background-color: #f6f8f7;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 8px;
            display: flex;
            justify-content: space-between;
            font-size: 12px;
        }

        .log-item span.temp-high {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <button class="nav-button" onclick="location.href='home'">
            <img src="Vector.png" alt="Home" class="nav-icon" />
            <div>Home</div>
        </button>
        <button class="nav-button" onclick="location.href='kelembabansuhu'">
            <img src="temperature.png" alt="Suhu" class="nav-icon" />
            <div>Suhu</div>
        </button>
        <button class="nav-button" onclick="location.href='jadwalrotasi'">
            <img src="rotation.png" alt="Rotasi Rak" class="nav-icon" />
            <div>Rotasi</div>
        </button>
        <button class="nav-button active">
            <img src="symbolsmonitor.png" alt="Sensor" class="nav-icon" />
            <div>Sensor</div>
        </button>
    </div>

    <div class="container">
        <h2>Monitoring Sensor</h2>

        <div class="chart-section">
            <h4>Grafik Suhu</h4>
            <canvas id="tempChart"></canvas>
        </div>

        <div class="chart-section">
            <h4>Grafik Kelembaban</h4>
            <canvas id="humidityChart"></canvas>
        </div>

        <div class="status-connection">
            <p>Status Koneksi ESP32: <span class="status" id="statusESP">Menghubungkan...</span></p>
        </div>

        <h4>Log Data</h4>
        <div class="log-list" id="logList"></div>
    </div>

    <script>
        const tempCtx = document.getElementById('tempChart').getContext('2d');
        const humidityCtx = document.getElementById('humidityChart').getContext('2d');
        const statusSpan = document.getElementById('statusESP');
        const logList = document.getElementById('logList');

        const suhuChart = new Chart(tempCtx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Suhu (°C)',
                    data: [],
                    fill: true,
                    backgroundColor: '#c6f1e7',
                    borderColor: '#3ba57d',
                    tension: 0.4
                }]
            },
            options: { responsive: true }
        });

        const kelembabanChart = new Chart(humidityCtx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Kelembaban (%)',
                    data: [],
                    fill: true,
                    backgroundColor: '#d0f2ea',
                    borderColor: '#2e8c70',
                    tension: 0.4
                }]
            },
            options: { responsive: true }
        });

        // === MQTT SETUP ===
        const client = mqtt.connect('wss://broker.hivemq.com:8884/mqtt'); // Ganti dengan broker jika lokal

        client.on('connect', () => {
            console.log('Terhubung ke MQTT broker');
            statusSpan.innerText = "Terhubung";
            statusSpan.style.backgroundColor = "#3ba57d";
            client.subscribe('sensor/suhu');
            client.subscribe('sensor/kelembaban');
        });

        client.on('error', (err) => {
            console.error('MQTT error:', err);
            statusSpan.innerText = "Terputus";
            statusSpan.style.backgroundColor = "red";
        });

        client.on('message', (topic, message) => {
            const waktu = new Date().toLocaleTimeString('id-ID');
            const nilai = parseFloat(message.toString());

            if (topic === 'sensor/suhu') {
                if (suhuChart.data.labels.length >= 10) {
                    suhuChart.data.labels.shift();
                    suhuChart.data.datasets[0].data.shift();
                }
                suhuChart.data.labels.push(waktu);
                suhuChart.data.datasets[0].data.push(nilai.toFixed(2));
                suhuChart.update();
            }

            if (topic === 'sensor/kelembaban') {
                if (kelembabanChart.data.labels.length >= 10) {
                    kelembabanChart.data.labels.shift();
                    kelembabanChart.data.datasets[0].data.shift();
                }
                kelembabanChart.data.labels.push(waktu);
                kelembabanChart.data.datasets[0].data.push(nilai.toFixed(2));
                kelembabanChart.update();
            }

            const logItem = document.createElement('div');
            logItem.className = 'log-item';
            logItem.innerHTML = `
                <span>${new Date().toLocaleString('id-ID')}</span>
                <span class="${nilai > 38 && topic === 'sensor/suhu' ? 'temp-high' : ''}">
                    ${topic === 'sensor/suhu' ? 'Temp' : 'Humidity'}: ${nilai.toFixed(1)} ${topic === 'sensor/suhu' ? '°C' : '%'}
                </span>
            `;
            logList.prepend(logItem);
            if (logList.children.length > 10) {
                logList.removeChild(logList.lastChild);
            }
        });

        // OPTIONAL: Simulasi dummy jika ESP belum aktif
        /*
        setInterval(() => {
            client.emit('message', 'sensor/suhu', (Math.random() * 10 + 30).toFixed(2));
            client.emit('message', 'sensor/kelembaban', (Math.random() * 30 + 50).toFixed(2));
        }, 5000);
        */
    </script>
</body>
</html>
