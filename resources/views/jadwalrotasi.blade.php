<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jadwal Rotasi</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
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
            transition: background-color 0.2s ease-in-out;
        }

        .nav-button:hover,
        .nav-button.active {
            background-color: rgba(59, 165, 125, 0.2);
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
            margin-left: 90px;
        }

        h2 {
            color: #2e8b57;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 90%;
            border-collapse: separate;
            border-spacing: 0;
            margin-bottom: 30px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            background-color: #ffffff;
        }

        th {
            background-color: #2e8b57;
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            background-color: #f9f9f9;
            color: #333333;
        }

        tr:nth-child(even) td {
            background-color: #f0f7f4;
        }

        tr:hover td {
            background-color: #d3f2e2;
        }

        th,
        td {
            padding: 14px 18px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
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
                position: static;
                height: auto;
            }

            .nav-button {
                width: auto;
                margin-bottom: 0;
            }

            .container {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <button class="nav-button" onclick="location.href='{{ url('home') }}'">
            <img src="{{ asset('Vector.png') }}" alt="Home" class="nav-icon" />
            <div>Home</div>
        </button>
        <button class="nav-button" onclick="location.href='{{ url('kelembabansuhu') }}'">
            <img src="{{ asset('temperature.png') }}" alt="Suhu" class="nav-icon" />
            <div>Suhu</div>
        </button>
        <button class="nav-button active">
            <img src="{{ asset('rotation.png') }}" alt="Rotasi Rak" class="nav-icon" />
            <div>Rotasi</div>
        </button>
        <button class="nav-button" onclick="location.href='{{ url('sensor') }}'">
            <img src="{{ asset('symbolsmonitor.png') }}" alt="Sensor" class="nav-icon" />
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
                @if(isset($rotasiTelur) && count($rotasiTelur) > 0)
                    @foreach ($rotasiTelur as $rotasi)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($rotasi->created_at)->format('d/m/Y') }}</td>
                            <td>{{ $rotasi->jam_rotasi }}</td>
                            <td>{{ $rotasi->jumlah_rotasi }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">Data rotasi belum tersedia.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <button class="button" onclick="window.location.href='{{ url('ubahrotasi') }}'">Ubah Rotasi</button>
    </div>
</body>

</html>
