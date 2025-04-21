<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netes.io - Suhu & Kelembaban</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            flex-grow: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .header {
            background-color: #fff;
            padding: 15px 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            text-align: center;
            font-size: 18px;
            font-weight: 600;
            color: #2d3748;
        }

        .current-condition {
            display: flex;
            gap: 15px;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .condition-card {
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .condition-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 20px;
        }

        .thermometer-icon {
            background-color: #63b3ed;
        }

        .humidity-icon {
            background-color: #81e6d9;
        }

        .condition-label {
            font-size: 14px;
            color: #718096;
            text-align: center;
        }

        .condition-value {
            font-size: 24px;
            font-weight: bold;
            color: #2d3748;
        }

        .condition-unit {
            font-size: 16px;
            color: #718096;
        }

        .settings {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-width: 400px;
            margin: 0 auto;
        }

        .setting-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .setting-label {
            font-size: 16px;
            color: #2d3748;
        }

        .slider-container {
            flex-grow: 1;
            margin-left: 15px;
            margin-right: 15px;
            display: flex;
            align-items: center;
        }

        .slider {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 8px;
            background: #d1d8e0;
            border-radius: 5px;
            outline: none;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            background: #48bb78;
            cursor: pointer;
            border-radius: 50%;
        }

        .slider::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: #48bb78;
            cursor: pointer;
            border-radius: 50%;
            border: none;
        }

        .setting-value {
            font-size: 14px;
            color: #718096;
            width: 40px;
            text-align: right;
        }

        .save-button {
            background: linear-gradient(to right, #48bb78, #81e6d9);
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            max-width: 400px;
            margin: 20px auto 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease;
        }

        .save-button:hover {
            background: linear-gradient(to right, #38a169, #68d391);
        }

        .bottom-navbar {
            background-color: #fff;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 15px 0;
            border-top: 1px solid #e0e6ed;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            color: #718096;
            font-size: 12px;
            text-decoration: none;
        }

        .nav-item.active {
            color: #48bb78;
        }

        .nav-icon {
            width: 24px;
            height: 24px;
            background-color: #cbd5e0;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .nav-item.active .nav-icon {
            background-color: #81e6d9;
        }

        @media (max-width: 600px) {
            .current-condition {
                flex-direction: column;
                align-items: center;
            }

            .setting-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .slider-container {
                margin-left: 0;
                margin-right: 0;
            }

            .setting-value {
                text-align: left;
                width: auto;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">Suhu dan Kelembaban</div>

        <div class="current-condition">
            <div class="condition-card">
                <div class="condition-icon thermometer-icon">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M8.25 3.75a3 3 0 1 1 6 0v10.5a3 3 0 1 1-6 0V3.75Zm9.75 8.25a3 3 0 1 1-6 0v-3a.75.75 0 0 1 1.5 0v3a1.5 1.5 0 1 0 3 0v-3a.75.75 0 0 1 1.5 0v3Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="condition-label">Suhu saat ini</div>
                <div class="condition-value" id="currentSuhu">37.5</div>
                <div class="condition-unit">°C</div>
            </div>
            <div class="condition-card">
                <div class="condition-icon humidity-icon">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M9.53 2.47a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06L12 4.31V11a.75.75 0 0 1-1.5 0V4.31L6.59 8.03a.75.75 0 0 1-1.06-1.06l4.5-4.5ZM3 13.5a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="condition-label">Kelembaban saat ini</div>
                <div class="condition-value" id="currentKelembaban">60</div>
                <div class="condition-unit">%</div>
            </div>
        </div>

        <div class="settings">
            <div class="setting-row">
                <label for="suhu" class="setting-label">Suhu</label>
                <div class="slider-container">
                    <input type="range" id="suhu" min="0" max="50" value="37.5" step="0.1" class="slider">
                    <span class="setting-value" id="suhuValue">37.5 °C</span>
                </div>
            </div>
            <div class="setting-row">
                <label for="kelembaban" class="setting-label">Kelembaban</label>
                <div class="slider-container">
                    <input type="range" id="kelembaban" min="0" max="100" value="60" class="slider">
                    <span class="setting-value" id="kelembabanValue">60%</span>
                </div>
            </div>
        </div>

        <button class="save-button">Simpan Pengaturan</button>
    </div>

    <div class="bottom-navbar">
        <a href="#" class="nav-item active">
            <div class="nav-icon">
                <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M8.25 3.75a3 3 0 1 1 6 0v10.5a3 3 0 1 1-6 0V3.75Zm9.75 8.25a3 3 0 1 1-6 0v-3a.75.75 0 0 1 1.5 0v3a1.5 1.5 0 1 0 3 0v-3a.75.75 0 0 1 1.5 0v3Z" clip-rule="evenodd" />
                </svg>
            </div>
            <div>Suhu &<br>Kelembaban</div>
        </a>
        <a href="#" class="nav-item">
            <div class="nav-icon">
                <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.795 9.29a.75.75 0 0 1-.048-1.09l4.5-4.5a.75.75 0 1 1 1.06 1.06l-3.976 3.975H16.25a.75.75 0 0 1 0 1.5H10.5v3.975l3.975-3.975a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.09-.048v-4.5Z" />
                </svg>
            </div>
            <div>Rotasi Rak</div>
        </a>
        <a href="#" class="nav-item">
            <div class="nav-icon">
                <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M16.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM7.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM19.666 13.666a.75.75 0 0 0-1.06-.06l-2.51 2.51a7.5 7.5 0 0 1-10.71-7.07l2.51-2.51a.75.75 0 0 0-.06-1.061L4.586 2.914a.75.75 0 0 0-1.06 0l-1.5 1.5a9 9 0 0 0 12.866 10.21l2.51 2.51a.75.75 0 0 0 1.06.06l1.5-1.5a.75.75 0 0 0 .06-1.061l-2.51-2.51a7.5 7.5 0 0 1 7.07 10.71l-2.51 2.51a.75.75 0 0 0 .06 1.06l1.5 1.5a9 9 0 0 0-10.21-12.866l2.51-2.51a.75.75 0 0 0 1.06.06l1.5-1.5Z" />
                </svg>
            </div>
            <div>Sensor</div>
        </a>
    </div>

    <script>
        const suhuSlider = document.getElementById('suhu');
        const kelembabanSlider = document.getElementById('kelembaban');
        const suhuValue = document.getElementById('suhuValue');
        const kelembabanValue = document.getElementById('kelembabanValue');
        const currentSuhu = document.getElementById('currentSuhu');
        const currentKelembaban = document.getElementById('currentKelembaban');

        suhuSlider.addEventListener('input', function () {
            suhuValue.textContent = this.value + ' °C';
            currentSuhu.textContent = this.value;
        });

        kelembabanSlider.addEventListener('input', function () {
            kelembabanValue.textContent = this.value + '%';
            currentKelembaban.textContent = this.value;
        });
    </script>
</body>

</html>
