<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile</title>
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

    .profile-container {
      max-width: 600px;
      margin: 40px auto;
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      padding: 20px;
    }

    .header {
      text-align: center;
      font-size: 20px;
      font-weight: 600;
      color: #3ba57d;
      margin-bottom: 20px;
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 15px;
      background: linear-gradient(to right, #5ccba3, #5d92c1);
      padding: 16px;
      border-radius: 12px;
      color: #fff;
      margin-bottom: 20px;
    }

    .user-info img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #fff;
      padding: 4px;
    }

    .user-details {
      font-size: 16px;
    }

    .user-details small {
      display: block;
      font-size: 13px;
      opacity: 0.9;
    }

    .section-title {
      margin-top: 24px;
      font-weight: bold;
      font-size: 15px;
      color: #4a5568;
    }

    .menu-list {
      list-style: none;
      padding: 0;
      margin: 10px 0;
    }

    .menu-list li {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px;
      border-bottom: 1px solid #e2e8f0;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .menu-list li:hover {
      background-color: #f0f4f8;
    }

    .menu-list li i {
      color: #999;
    }

    .button-group {
      display: flex;
      flex-direction: column;
      gap: 12px;
      margin-top: 30px;
    }

    .logout-btn,
    .back-btn {
      display: block;
      width: 100%;
      padding: 12px;
      text-align: center;
      background-color: #e53e3e;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .logout-btn:hover {
      background-color: #c53030;
    }

    .back-btn {
      background-color: #3ba57d;
    }

    .back-btn:hover {
      background-color: #2f8b66;
    }

    @media (max-width: 768px) {
      .profile-container {
        margin: 20px auto;
      }
    }
  </style>
</head>
<body>

  <div class="profile-container">
    <div class="header">Profile</div>

    <div class="user-info">
      <img src="{{ asset('Layer 2.png') }}" alt="Foto Profil">
      <div class="user-details">
        <strong>Fahriz Septian</strong>
        <small>fahrizseptian7@gmail.com</small>
      </div>
    </div>

    <div class="section-title">Account</div>
    <ul class="menu-list">
      <li onclick="location.href='{{ url('/profile/personal') }}'">Personal Information <i>&gt;</i></li>
      <li onclick="location.href='{{ url('/gantipassword') }}'">Change Password <i>&gt;</i></li>
      <li onclick="location.href='{{ url('/profile/permission') }}'">Gatau di Isi apa?<i>&gt;</i></li>
    </ul>

    <div class="button-group">
      {{-- <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Log Out</button>
      </form> --}}
      <button class="back-btn" onclick="window.history.back();">← Kembali</button>
    </div>
  </div>

</body>
</html>
