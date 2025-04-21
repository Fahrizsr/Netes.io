<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Netes.io Login</title>
    <style>
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

        .or-text {
            color: #aaa;
            margin-bottom: 15px;
        }

        .signup-btn {
            width: 100%;
            padding: 12px;
            border: 1px solid #42aa7f;
            border-radius: 10px;
            background-color: white;
            color: #42aa7f;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
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
        <input type="text" class="input-field" placeholder="Username" id="name" />
        <input type="password" class="input-field" placeholder="Password" id="password" />
        <div class="checkbox-container">
            <input type="checkbox" id="remember" />
            <label for="remember">Remember me</label>
        </div>
        <button class="login-btn" onclick="login()">Login</button>
        <div class="or-text">or</div>
        <button class="signup-btn">Sign Up</button>
        <div id="error-message" class="error-message" style="display: none;">Invalid username or password.</div>
    </div>

    <script>
        function login() {
            const nameInput = document.getElementById('name');
            const passwordInput = document.getElementById('password');
            const errorMessageDiv = document.getElementById('error-message');

            const enteredName = nameInput.value;
            const enteredPassword = passwordInput.value;

            if (enteredName === "FahrizSeptian" && enteredPassword === "123456") {
                // Redirect to the home page (replace '/home' with your actual home page URL)
                window.location.href = '/home';
            } else {
                // Display the error message
                errorMessageDiv.style.display = 'block';
            }
        }
    </script>
</body>

</html>