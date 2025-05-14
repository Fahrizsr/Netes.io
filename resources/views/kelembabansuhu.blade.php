<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      min-height: 100vh;
      overflow-x: hidden;
      flex-direction: row;
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

    .nav-button:hover {
      background-color: rgba(66, 170, 127, 0.2);
    }

    .nav-icon {
      margin-bottom: 4px;
      width: 24px;
      height: 24px;
    }

    .container {
      flex-grow: 1;
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 20px;
      padding-bottom: 40px;
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
      transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .condition-value.changed {
      transform: scale(1.2);
      color: #48bb78;
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
      border: 2px solid #fff;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    .slider::-moz-range-thumb {
      width: 20px;
      height: 20px;
      background: #48bb78;
      cursor: pointer;
      border-radius: 50%;
      border: 2px solid #fff;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    .setting-value {
      font-size: 14px;
      color: #718096;
      min-width: 60px;
      text-align: right;
      font-family: monospace;
      transition: all 0.2s ease-in-out;
    }

    .save-button {
      background: linear-gradient(to right, #3ba57d, #4aa3d1);
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
      transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.1s ease;
    }

    .save-button:hover {
      background: linear-gradient(to right, #2e8b57, #418ad1);
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
    }

    .save-button:active {
      background: linear-gradient(to right, #2e8b57, #418ad1);
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
      transform: translateY(1px);
    }

  </style>
</head>

<body>
  <div class="sidebar">
    <button class="nav-button" onclick="location.href='home'">
      <img src="Vector.png" alt="Home" class="nav-icon" />
      <div>Home</div>
    </button>
    <button class="nav-button">
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
    <div class="current-condition">
      <div class="condition-card">
        <div class="condition-icon thermometer-icon">
          🌡️
        </div>
        <div class="condition-label">Suhu saat ini</div>
        <div class="condition-value" id="currentSuhu">37.5</div>
        <div class="condition-unit">°C</div>
      </div>
      <div class="condition-card">
        <div class="condition-icon humidity-icon">
          💧
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
          <input type="range" id="suhu" class="slider" min="0" max="50" value="37.5" />
          <div class="setting-value" id="suhuValue">37.5°C</div>
        </div>
      </div>
      <div class="setting-row">
        <label for="kelembaban" class="setting-label">Kelembaban</label>
        <div class="slider-container">
          <input type="range" id="kelembaban" class="slider" min="0" max="100" value="60" />
          <div class="setting-value" id="kelembabanValue">60%</div>
        </div>
      </div>

      <button class="save-button">Simpan Pengaturan</button>
    </div>
  </div>

  <script>
    
    const suhuSlider = document.getElementById('suhu');
    const kelembabanSlider = document.getElementById('kelembaban');
    const suhuValue = document.getElementById('suhuValue');
    const kelembabanValue = document.getElementById('kelembabanValue');
    const currentSuhu = document.getElementById('currentSuhu');
    const currentKelembaban = document.getElementById('currentKelembaban');
    const saveButton = document.querySelector('.save-button');

    suhuSlider.addEventListener('input', function () {
      suhuValue.textContent = `${suhuSlider.value}°C`;
      updateConditionValue(currentSuhu, suhuSlider.value);
    });

    kelembabanSlider.addEventListener('input', function () {
      kelembabanValue.textContent = `${kelembabanSlider.value}%`;
      updateConditionValue(currentKelembaban, kelembabanSlider.value);
    });

    saveButton.addEventListener('click', function () {
      localStorage.setItem('suhu', suhuSlider.value);
      localStorage.setItem('kelembaban', kelembabanSlider.value);
      alert('Pengaturan berhasil disimpan!');
    });

    window.addEventListener('load', function () {
      const storedSuhu = localStorage.getItem('suhu');
      const storedKelembaban = localStorage.getItem('kelembaban');
      if (storedSuhu) {
        suhuSlider.value = storedSuhu;
        suhuValue.textContent = `${storedSuhu}°C`;
        currentSuhu.textContent = storedSuhu;
      }
      if (storedKelembaban) {
        kelembabanSlider.value = storedKelembaban;
        kelembabanValue.textContent = `${storedKelembaban}%`;
        currentKelembaban.textContent = storedKelembaban;
      }
    });

    function updateConditionValue(element, newValue) {
      element.classList.add('changed');
      element.textContent = newValue;
      setTimeout(() => {
        element.classList.remove('changed');
      }, 300);
    }
  </script>
</body>

</html>
