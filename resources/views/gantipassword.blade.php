<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ganti Password</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f8;
      color: #2d3748;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .container {
      max-width: 500px;
      margin: 40px auto;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      padding: 25px 30px;
    }

    h2 {
      color: #3ba57d;
      text-align: center;
      margin-bottom: 25px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      font-size: 14px;
      color: #4a5568;
    }

    input[type="password"] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #cbd5e0;
      border-radius: 8px;
      font-size: 14px;
      margin-bottom: 10px;
      transition: border-color 0.2s;
    }

    input[type="password"]:focus {
      border-color: #3ba57d;
      outline: none;
    }

    .error {
      color: #e53e3e;
      font-size: 13px;
      margin-top: -8px;
      margin-bottom: 12px;
    }

    .alert {
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 15px;
      font-size: 14px;
    }

    .alert-success {
      background-color: #d4edda;
      color: #155724;
    }

    .alert-error {
      background-color: #f8d7da;
      color: #721c24;
    }

    .btn-group {
      display: flex;
      gap: 12px;
      margin-top: 15px;
      justify-content: flex-end;
    }

    button {
      background-color: #3ba57d;
      border: none;
      color: white;
      font-weight: bold;
      padding: 12px 20px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.2s;
      font-size: 14px;
    }

    button:hover {
      background-color: #2f8b66;
    }

    .back-btn {
      background-color: #718096;
    }

    .back-btn:hover {
      background-color: #4a5568;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Ganti Password</h2>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
      <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('password.change') }}">
      @csrf

      <label for="current_password">Password Lama</label>
      <input type="password" id="current_password" name="current_password" required>
      @error('current_password')
        <div class="error">{{ $message }}</div>
      @enderror

      <label for="new_password">Password Baru</label>
      <input type="password" id="new_password" name="new_password" required>
      @error('new_password')
        <div class="error">{{ $message }}</div>
      @enderror

      <label for="new_password_confirmation">Konfirmasi Password Baru</label>
      <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
      @error('new_password_confirmation')
        <div class="error">{{ $message }}</div>
      @enderror

      <div class="btn-group">
        <button type="submit">Simpan</button>
        <button type="button" class="back-btn" onclick="window.history.back();">Batal</button>
      </div>
    </form>
  </div>

</body>
</html>
