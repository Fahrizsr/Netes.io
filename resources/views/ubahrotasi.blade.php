<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ubah Rotasi</title>
  
  <style>
    html, body {
      overflow: hidden;
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f8;
      color: #2d3748;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      width: 90vw;
      max-width: 600px;
      min-width: 320px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      padding: 30px 40px;
      box-sizing: border-box;
    }

    h3 {
      text-align: center;
      color: #3ba57d;
      margin-bottom: 24px;
      font-size: 26px;
      font-weight: 600;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }

    form input,
    form select {
      width: 100%;
      box-sizing: border-box;
      padding: 12px 14px;
      border: 1px solid #cbd5e0;
      border-radius: 8px;
      font-size: 16px;
    }

    .btn-submit {
      background: linear-gradient(to right, #3ba57d, #4aa3d1);
      color: white;
      padding: 12px 18px;
      border: none;
      border-radius: 8px;
      font-size: 18px;
      cursor: pointer;
      transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.1s ease;
    }

    .btn-submit:hover {
      background: linear-gradient(to right, #2e8b57, #418ad1);
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
    }

    .btn-submit:active {
      transform: translateY(1px);
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
      .container {
        width: 95vw;
        padding: 24px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h3>Ubah Rotasi</h3>
    <form action="{{ route('ubahrotasi.store') }}" method="POST">
      @csrf
      <input type="date" name="tanggal_rotasi" required>
      <select name="jam_rotasi" required>
        <option value=""> Pilih Jam Rotasi </option>
        <option value="8">8 Jam</option>
        <option value="4">4 Jam</option>
        <option value="3">3 Jam</option>
      </select>
      <input type="number" name="jumlah_rotasi" value="1" readonly hidden>
      <button type="submit" class="btn-submit">Simpan Perubahan</button>
    </form>
  </div>
</body>
</html>
