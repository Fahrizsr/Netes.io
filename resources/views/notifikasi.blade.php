<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Notifikasi</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f6f8;
      color: #2d3748;
      min-height: 100vh;
      overflow-x: hidden;
      display: flex;
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
      text-decoration: none;
    }

    .nav-button:hover {
      background-color: rgba(66, 170, 127, 0.2);
    }

    .nav-icon {
      margin-bottom: 4px;
      width: 24px;
      height: 24px;
    }

    .main {
      flex-grow: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .container {
      width: 100%;
      max-width: 480px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #3ba57d;
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: bold;
    }

    .date-heading {
      font-weight: bold;
      margin-top: 15px;
      margin-bottom: 10px;
      color: #4a5568;
      font-size: 16px;
    }

    .notif {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #edf2f7;
      border-radius: 8px;
      padding: 12px;
      margin-bottom: 10px;
      border-left: 5px solid #3ba57d;
    }

    .notif-icon {
      background-color: #e0f5ee;
      padding: 8px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 12px;
    }

    .notif-icon img {
      width: 24px;
      height: 24px;
      color: #3ba57d;
    }

    .notif-content {
      flex-grow: 1;
      font-size: 16px;
    }

    .notif-time {
      font-size: 0.8em;
      color: #718096;
    }

    @media (max-width: 768px) {
      body {
        flex-direction: column;
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

      .nav-button {
        width: auto;
        margin-bottom: 0;
      }

      .main {
        order: 0;
        padding: 10px;
      }

      .container {
        margin: 0 auto;
      }
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <button class="nav-button" onclick="location.href='home'">
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

  <div class="main">
    <div class="container">
      <h2>Notifikasi</h2>

      <div class="date-heading">Sabtu, 12 April 2025</div>
      <div class="notif">
        <div class="notif-icon">
          <img src="https://img.icons8.com/ios-filled/24/000000/temperature.png" alt="Temp" style="filter: invert(54%) sepia(45%) saturate(600%) hue-rotate(138deg) brightness(95%) contrast(94%);" />
        </div>
        <div class="notif-content">Peringatan: Suhu diluar batas wajar</div>
        <div class="notif-time">09:41</div>
      </div>

      <div class="date-heading">Minggu, 13 April 2025</div>
      <div class="notif">
        <div class="notif-icon">
          <img src="https://img.icons8.com/ios-filled/24/000000/hygrometer.png" alt="Humidity" style="filter: invert(54%) sepia(45%) saturate(600%) hue-rotate(138deg) brightness(95%) contrast(94%);" />
        </div>
        <div class="notif-content">Peringatan: Kelembaban diluar batas wajar</div>
        <div class="notif-time">07:41</div>
      </div>

      <div class="notif">
        <div class="notif-icon">
          <img src="https://img.icons8.com/ios-filled/24/000000/rotate.png" alt="Rotasi" style="filter: invert(54%) sepia(45%) saturate(600%) hue-rotate(138deg) brightness(95%) contrast(94%);" />
        </div>
        <div class="notif-content">Jadwal perubahan rotasi</div>
        <div class="notif-time">09:21</div>
      </div>
    </div>
  </div>
</body>
</html>
