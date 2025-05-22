<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Home Netes.io</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    * { box-sizing: border-box; }
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #ffffff;
      display: flex;
      flex-direction: row;
      height: 100vh;
      overflow: hidden;
    }

    .sidebar {
      width: 90px;
      min-width: 90px;
      background-color: #f5faff;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px 0;
      border-right: 1px solid #ddd;
    }

    .nav-button {
      display: flex;
      flex-direction: column;
      align-items: center;
      font-size: 12px;
      color: #42aa7f;
      border: none;
      background-color: rgba(66, 170, 127, 0.05);
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
      flex-grow: 1;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px 24px;
      flex-wrap: wrap;
    }

    .header .greeting {
      font-size: 14px;
      color: #555;
    }

    .header .name {
      font-size: 16px;
      font-weight: bold;
      color: #000;
    }

    .header-buttons {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .icon-button {
      background: none;
      border: none;
      cursor: pointer;
      padding: 4px;
      border-radius: 50%;
      transition: background 0.2s ease;
    }

    .icon-button:hover {
      background-color: rgba(66, 170, 127, 0.1);
    }

    .notification {
      width: 24px;
      height: 24px;
    }

    .profile {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      object-fit: cover;
    }

    .main-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px 40px;
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
    }

    .egg-machine {
      width: 180px;
      margin-bottom: 20px;
    }

    .status {
      margin-bottom: 16px;
      font-size: 14px;
    }

    .status span {
      background-color: #42aa7f;
      color: white;
      padding: 4px 10px;
      border-radius: 8px;
      font-size: 12px;
    }

    .info-cards {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
      width: 100%;
    }

    .info-card {
      flex: 1;
      padding: 10px;
      background-color: #e3f2f1;
      border-radius: 12px;
      text-align: center;
    }

    .info-card h3 {
      margin: 0;
      font-size: 14px;
      color: #333;
    }

    .info-card p {
      margin: 8px 0 0;
      font-size: 20px;
      font-weight: bold;
      color: #333;
    }

    .buttons {
      display: flex;
      gap: 16px;
      margin: 20px 0;
      flex-wrap: wrap;
      justify-content: center;
    }

    .buttons button {
      background: linear-gradient(to right, #3ba57d, #4aa3d1);
      color: white;
      border: none;
      padding: 14px 30px;
      border-radius: 12px;
      font-size: 15px;
      min-width: 200px;
      cursor: pointer;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      transition: background 0.3s ease, box-shadow 0.3s ease;
    }

    .buttons button:hover {
      background: linear-gradient(to right, #2e8b57, #418ad1);
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
    }

    .chart-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      width: 100%;
    }

    .chart {
      flex: 1;
      background-color: #e0f5ee;
      padding: 10px;
      border-radius: 12px;
    }

    .chart h4 {
      margin: 0 0 10px;
      font-size: 14px;
      color: #333;
    }

    @media (max-width: 768px) {
      body {
        flex-direction: column;
        overflow: auto;
      }

      .sidebar {
        flex-direction: row;
        width: 100%;
        min-width: 100%;
        border-right: none;
        border-bottom: 1px solid #ddd;
        justify-content: space-around;
        padding: 10px 0;
        order: 1;
      }

      .container {
        order: 0;
        height: auto;
      }

      .main-content {
        padding: 20px;
      }

      .nav-button {
        width: auto;
        margin-bottom: 0;
      }

      .chart-container {
        flex-direction: column;
      }

      .buttons button {
        min-width: 100%;
        padding: 12px;
      }
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <button class="nav-button active">
      <img src="Vector.png" alt="Home" class="nav-icon" id="home" />
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
    <button class="nav-button" onclick="location.href='sensor'">
      <img src="symbolsmonitor.png" alt="Sensor" class="nav-icon" />
      <div>Sensor</div>
    </button>
  </div>

  <div class="container">
    <div class="header">
      <div>
        <div class="greeting" id="greetingText"></div>
        <div class="name">Fahriz Septian</div>
      </div>
      <div class="header-buttons">
        <button class="icon-button" onclick="window.location.href='notifikasi'">
          <img src="notification.png" alt="Notification" class="notification" />
        </button>
        <button class="icon-button" onclick="window.location.href='profile'">
          <img src="Layer 2.png" alt="Profile" class="profile" />
        </button>
      </div>
    </div>

    <div class="main-content">
      <img src="egg.png" alt="Egg Incubator" class="egg-machine" />
      <div class="status">Status Rotasi Rak: <span>Aktif</span></div>

      <div class="info-cards">
        <div class="info-card">
          <h3>Suhu saat ini</h3>
          <p>37.5°C</p>
        </div>
        <div class="info-card">
          <h3>Kelembaban saat ini</h3>
          <p>60%</p>
        </div>
      </div>

      <div class="buttons">
        <button onclick="window.location.href='durasingkubasi'">Durasi Inkubasi</button>
        <button onclick="window.location.href='pilihkelamin'">Pilih Jenis Kelamin</button>
      </div>

      <div class="chart-container">
        <div class="chart">
          <h4>Grafik Suhu</h4>
          <canvas id="suhuChart"></canvas>
        </div>
        <div class="chart">
          <h4>Grafik Kelembaban</h4>
          <canvas id="kelembabanChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <script>
    function updateGreeting() {
      const hour = new Date().getHours();
      const greeting = document.getElementById("greetingText");
      if (hour >= 5 && hour < 12) {
        greeting.textContent = "Selamat pagi!";
      } else if (hour >= 12 && hour < 17) {
        greeting.textContent = "Selamat siang!";
      } else if (hour >= 17 && hour < 21) {
        greeting.textContent = "Selamat sore!";
      } else {
        greeting.textContent = "Selamat malam!";
      }
    }

    updateGreeting();
    setInterval(updateGreeting, 60000);

    const waktu = ["08:00", "09:00", "10:00", "11:00", "12:00"];
    const suhuData = [36.8, 37.1, 37.5, 37.3, 37.4];
    const kelembabanData = [58, 60, 61, 59, 60];

    const ctxSuhu = document.getElementById("suhuChart").getContext("2d");
    new Chart(ctxSuhu, {
      type: "line",
      data: {
        labels: waktu,
        datasets: [{
          label: "Suhu (°C)",
          data: suhuData,
          borderColor: "#42aa7f",
          backgroundColor: "rgba(66, 170, 127, 0.2)",
          fill: true,
          tension: 0.3
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: false }
        }
      }
    });

    const ctxKelembaban = document.getElementById("kelembabanChart").getContext("2d");
    new Chart(ctxKelembaban, {
      type: "line",
      data: {
        labels: waktu,
        datasets: [{
          label: "Kelembaban (%)",
          data: kelembabanData,
          borderColor: "#7cc6b4",
          backgroundColor: "rgba(124, 198, 180, 0.2)",
          fill: true,
          tension: 0.3
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: false }
        }
      }
    });
  </script>
</body>
</html>
