<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Riwayat</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f6f8;
      color: #2d3748;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 30px;
    }

    .container {
      width: 100%;
      max-width: 700px; 
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
      padding: 20px;
      max-height: 90vh; 
      overflow-y: auto; 
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
    }

    .notif-content {
      flex-grow: 1;
      font-size: 16px;
    }

    .notif-time {
      font-size: 0.8em;
      color: #718096;
    }

    .back-button {
      margin-top: 30px;
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #3ba57d;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      text-align: center;
      transition: background-color 0.3s;
    }

    .back-button:hover {
      background-color: #329066;
    }

    .see-more {
      text-align: right;
      font-size: 14px;
      color: #3182ce;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      .container {
        margin: 0 10px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Riwayat</h2>

    @foreach($groupedRiwayat as $tanggal => $items)
      <div class="date-heading">{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y') }}</div>
      @foreach($items->take(10) as $notif)
        <div class="notif">
          <div class="notif-icon">
            <img src="{{ $notif->icon }}" alt="icon" style="filter: invert(54%) sepia(45%) saturate(600%) hue-rotate(138deg) brightness(95%) contrast(94%);" />
          </div>
          <div class="notif-content">{{ $notif->pesan }}</div>
          <div class="notif-time">{{ $notif->jam }}</div>
        </div>
      @endforeach

      @if($items->count() > 5)
        <div class="see-more" onclick="alert('Buat fitur lihat selengkapnya nanti di sini')">Lihat {{ $items->count() - 3 }} lainnya...</div>
      @endif
    @endforeach

    <button class="back-button" onclick="history.back()">← Kembali</button>
  </div>
</body>
</html>
