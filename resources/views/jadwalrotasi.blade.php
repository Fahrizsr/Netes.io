<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jadwal Rotasi</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: white;
            display: flex;
            flex-direction: row;
            min-height: 100vh;
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

        .container {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            color: #2e8b57;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin-bottom: 30px;
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #008040;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #3de48a;
            color: #000;
        }

        tr:nth-child(odd) {
            background-color: #5ff2a3;
            color: #000;
        }

        .button {
            background: linear-gradient(to right, #3ba57d, #4aa3d1);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.1s ease;
        }

        .button:hover {
            background: linear-gradient(to right, #2e8b57, #418ad1);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
        }

        .button:active {
            background: linear-gradient(to right, #2e8b57, #418ad1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
            transform: translateY(1px);
        }

        .nav-bottom {
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
        <button class="nav-button">
            <img src="rotation.png" alt="Rotasi Rak" class="nav-icon" />
            <div>Rotasi</div>
        </button>
        <button class="nav-button" onclick="location.href='sensor'">
            <img src="symbolsmonitor.png" alt="Sensor" class="nav-icon" />
            <div>Sensor</div>
        </button>
    </div>

    <div class="container">
        <h2>Jadwal Rotasi</h2>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Jumlah Rotasi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>10/04/2025</td>
                    <td>08:00</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>18/04/2025</td>
                    <td>08:00</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>19/04/2025</td>
                    <td>08:00</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>30/04/2025</td>
                    <td>08:00</td>
                    <td>5</td>
                </tr>
            </tbody>
        </table>
        <button class="button" onclick="window.location.href='ubahrotasi'">Ubah Rotasi</button>
    </div>
</body>

</html>