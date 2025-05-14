<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            display: flex; 
            min-height: 100vh;
            overflow-x: hidden;
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

        .profile-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            padding: 20px;
            flex-grow: 1; /* Agar kontainer profil mengambil sisa ruang */
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

        .logout-btn {
            display: block;
            width: 100%;
            padding: 12px;
            text-align: center;
            margin-top: 30px;
            background-color: #e53e3e;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #c53030;
        }

        .bottom-nav {
            display: none; 
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

            .profile-container {
                order: 0; 
                margin: 20px auto; 
            }

            .bottom-nav {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                background-color: #fff;
                border-top: 1px solid #e2e8f0;
                display: flex;
                justify-content: space-around;
                padding: 10px 0;
                box-shadow: 0 -1px 3px rgba(0, 0, 0, 0.05);
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

    <div class="profile-container">
        <div class="header">Profile</div>

        <div class="user-info">
            <img src="{{ asset('Layer 2.png') }}" alt="Foto Profil">
            <div class="user-details">
                <strong>Fahriz Septian</strong>
                <small>fahrizseptian7@gmail.com</small>
            </div>
        </div>

        <div class="section-title">Account & Security</div>
        <ul class="menu-list">
            <li onclick="location.href='{{ url('/profile/personal') }}'">Personal Information <i>&gt;</i></li>
            <li onclick="location.href='{{ url('/profile/password') }}'">Change Password <i>&gt;</i></li>
            <li onclick="location.href='{{ url('/profile/permission') }}'">Information dan your permission <i>&gt;</i></li>
        </ul>

        <div class="section-title">General</div>
        <ul class="menu-list">
            <li onclick="location.href='{{ url('/terms') }}'">Terms & Conditions <i>&gt;</i></li>
            <li onclick="location.href='{{ url('/privacy') }}'">Privacy Policy <i>&gt;</i></li>
            <li onclick="location.href='{{ url('/support') }}'">Customer Service <i>&gt;</i></li>
        </ul>

        {{-- <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">Log Out</button>
        </form> --}}
    </div>


</body>
</html>