<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Netes.io Dashboard</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #ffffff;
      display: flex;
      flex-direction: row; /* Pastikan sidebar di kiri */
      height: 100vh;
      overflow: hidden; /* Menghilangkan scrollbar */
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
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px;
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

    .notification {
      width: 24px;
      height: 24px;
    }

    .main-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
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
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 20px;
      width: 100%;
      max-width: 400px;
    }

    .info-card {
      flex: 1 1 45%;
      padding: 10px;
      background-color: #e3f2f1;
      border-radius: 12px;
      text-align: center;
      min-width: 140px;
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
      gap: 10px;
      margin-bottom: 20px;
      flex-wrap: wrap;
      justify-content: center;
    }

    .buttons button {
      background: linear-gradient(90deg, #42aa7f, #7cc6b4);
      color: white;
      border: none;
      padding: 10px 16px;
      border-radius: 8px;
      font-size: 12px;
      cursor: pointer;
    }

    .chart-container {
      width: 100%;
      max-width: 400px;
    }

    .chart {
      background-color: #e0f5ee;
      padding: 10px;
      border-radius: 12px;
      margin-bottom: 20px;
    }

    .chart h4 {
      margin: 0 0 10px;
      font-size: 14px;
      color: #333;
    }

    .chart img {
      width: 100%;
      height: auto;
    }

    /* RESPONSIVE LAYOUT */
    @media (max-width: 768px) {
      body {
        flex-direction: column;
        overflow: auto; /* Agar konten bisa di-scroll di tampilan mobile */
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

      .nav-button {
        width: auto;
        margin-bottom: 0;
      }
    }
  </style>
</head>

<body>
  <div class="sidebar">
    <button class="nav-button">
      <img src="temperature.png" alt="Suhu" class="nav-icon" />
      <div>Suhu</div>
    </button>
    <button class="nav-button">
      <img src="rotation.png" alt="Rotasi Rak" class="nav-icon" />
      <div>Rotasi</div>
    </button>
    <button class="nav-button">
      <img src="symbolsmonitor.png" alt="Sensor" class="nav-icon" />
      <div>Sensor</div>
    </button>
  </div>

  <div class="container">
    <div class="header">
      <div>
        <div class="greeting">Good morning,</div>
        <div class="name">Fahriz Septian</div>
      </div>
      <img src="notification.png" alt="Notification" class="notification" />
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
        <button>Atur Jadwal Rotasi</button>
        <button>Ubah Pengaturan</button>
        <button>Pilih Jenis Kelamin</button>
      </div>

      <div class="chart-container">
        <div class="chart">
          <h4>Grafik Suhu</h4>
          <img src="temperature-graph.png" alt="Grafik Suhu">
        </div>
        <div class="chart">
          <h4>Grafik Kelembaban</h4>
          <img src="humidity-graph.png" alt="Grafik Kelembaban">
        </div>
      </div>
    </div>
  </div>
</body>

</html>
