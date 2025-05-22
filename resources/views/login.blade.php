<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Netes.io Login</title>
    <style>
        /* CSS sama seperti yang kamu punya */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
            font-family: Arial, sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 360px;
            padding: 20px;
            text-align: center;
        }

        .logo {
            width: 80px;
            margin-bottom: 20px;
        }

        .login-title {
            font-size: 24px;
            font-weight: bold;
            color: #000;
            margin-bottom: 30px;
        }

        .input-field {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .checkbox-container input {
            margin-right: 10px;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(to right, #42aa7f, #4f79c6);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 15px;
        }

        .login-btn:hover {
            opacity: 0.9;
        }

        .error-message {
            color: red;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="image.png" alt="Netes.io Logo" class="logo" />
        <div class="login-title">Login</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" name="username" class="input-field" placeholder="Username" value="{{ old('username') }}" required />
            <input type="password" name="password" class="input-field" placeholder="Password" required />
            <div class="checkbox-container">
                <input type="checkbox" name="remember" id="remember" />
                <label for="remember">Remember me</label>
            </div>
            <button type="submit" class="login-btn">Login</button>
            @if($errors->any())
                <div class="error-message">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>
</body>

</html>
