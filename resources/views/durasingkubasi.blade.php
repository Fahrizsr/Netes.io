<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Durasi Inkubasi</title>
    <style>
        * { box-sizing: border-box; }
        
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f6f8fb;
            color: #2d3748;
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
        }

        .container {
            max-width: 600px;
            width: 100%; 
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            margin: 20px; 
        }

        .title {
            text-align: center;
            color: #3ba57d;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 24px;
        }

        .incubation-card {
            display: flex;
            align-items: center;
            gap: 20px;
            background: linear-gradient(to right, #5ccba3, #5d92c1);
            border-radius: 16px;
            padding: 20px;
            color: white;
            margin-bottom: 30px;
        }

        .incubation-card img {
            width: 80px;
            height: 80px;
        }

        .incubation-status {
            font-size: 14px;
        }

        .incubation-days {
            font-size: 28px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
            margin-bottom: 6px;
            display: block;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e0;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            background: linear-gradient(to right, #5ccba3, #5d92c1);
            border: none;
            color: white;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.95;
        }

        .footer-nav {
            display: none; 
        }

        @media (max-width: 600px) {
            .incubation-card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .container {
                margin: 15px; 
            }

            .footer-nav {
                display: flex; 
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">Durasi Inkubasi</div>

        <div class="incubation-card">
            <img src="{{ asset('egg.png') }}" alt="Incubator">
            <div>
                <div class="incubation-status">Durasi inkubasi saat ini</div>
                <div class="incubation-days">{{ $durasi?->durasi_hari ?? 'Belum Ada' }} Hari</div>
            </div>
        </div>

        @if(session('success'))
            <p style="color: green">{{ session('success') }}</p>
        @endif

        <p>Durasi inkubasi saat ini: <strong>{{ $durasi ? $durasi->durasi_hari : '-' }} hari</strong></p>

        <form method="POST" action="{{ route('durasi.update') }}">
        @csrf
            <label for="duration">Ubah durasi inkubasi:</label>
            <input type="number" name="duration"id="duartion" min="1" required style="margin-bottom: 12px;">
    
            <button type="submit" style="margin-top: 10px;">Simpan</button>
        </form>                 

    </div>
</body>
</html>             