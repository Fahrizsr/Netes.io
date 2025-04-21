<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netes.io</title>
    <style>
        /* Gaya Global */
        body {
            font-family: sans-serif; /* Font modern dan bersih */
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Latar belakang abu-abu muda yang kalem */
            color: #333; /* Warna teks utama yang gelap namun tidak terlalu hitam */
            line-height: 1.6;
            -webkit-font-smoothing: antialiased; /* Optimasi rendering font untuk tampilan lebih halus */
            -moz-osx-font-smoothing: grayscale;
        }

        /* Header */
        header {
            background-color: #fff; /* Latar belakang putih untuk header */
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Efek bayangan tipis untuk memisahkan header */
            position: sticky; /* Membuat header tetap di atas saat di-scroll */
            top: 0;
            z-index: 100;
        }

        header > div {
            max-width: 1200px; /* Lebar maksimum konten header */
            margin: 0 auto; /* Membuat konten header berada di tengah */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header img {
            height: 40px; /* Ukuran logo yang sedikit lebih besar */
        }

        header .login-button-container {
            /* Tidak ada style khusus untuk container saat ini */
        }

        header .login-button {
            color: white;
            padding: 12px 25px; /* Padding tombol yang lebih proporsional */
            border: none;
            border-radius: 8px; /* Sudut tombol yang lebih membulat untuk kesan modern */
            cursor: pointer;
            font-size: 1em;
            transition: background-image 0.3s ease; /* Efek transisi halus saat hover */
            background-image: linear-gradient(to right, #42aa7f, #4f79c6); /* Gradasi dari kiri ke kanan */
            background-size: 200% 100%; /* Ukuran background untuk animasi hover */
        }

        header .login-button:hover {
            background-position: 100% 0; /* Menggeser background ke kanan saat hover */
        }

        /* Hero Section */
        section:nth-child(2) { /* Memilih section kedua (hero section) */
            background-color: #e0f7fa; /* Hijau tosca muda yang kalem dan modern */
            padding: 100px 20px;
            text-align: center;
        }

        section:nth-child(2) > div { /* Kontainer untuk teks di hero section */
            max-width: 800px;
            margin: 0 auto;
        }

        section:nth-child(2) h1 {
            font-size: 2.5em;
            color: #2c3e50; /* Warna judul yang elegan */
            margin-bottom: 20px;
            line-height: 1.3;
        }

        section:nth-child(2) p {
            font-size: 1.1em;
            color: #555;
            margin-bottom: 30px;
        }

        section:nth-child(2) button {
            background-color: #007bff; /* Biru modern untuk tombol aksi */
            color: white;
            padding: 15px 35px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        section:nth-child(2) button:hover {
            background-color: #0056b3;
        }

        /* Fitur Section */
        section:nth-child(3) { /* Memilih section ketiga (fitur section) */
            padding: 80px 20px;
            text-align: center;
            background-color: #fff; /* Latar belakang putih untuk fitur */
        }

        section:nth-child(3) h2 {
            font-size: 2em;
            color: #2c3e50;
            margin-bottom: 40px;
        }

        section:nth-child(3) > div {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-around;
            gap: 30px; /* Jarak antar elemen fitur */
            flex-wrap: wrap; /* Membuat elemen fitur wrap pada layar kecil */
        }

        section:nth-child(3) > div > div {
            flex: 1 1 300px; /* Membuat setiap fitur memiliki lebar minimum 300px */
            padding: 30px;
            background-color: #f9f9f9; /* Latar belakang sedikit berbeda untuk setiap fitur */
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        section:nth-child(3) img {
            height: 60px;
            margin-bottom: 20px;
            opacity: 0.8; /* Sedikit mengurangi opasitas ikon */
        }

        section:nth-child(3) h3 {
            font-size: 1.3em;
            color: #333;
            margin-bottom: 10px;
        }

        section:nth-child(3) p {
            color: #666;
        }

        /* Footer */
        footer {
            background-color: #333; /* Latar belakang gelap untuk footer */
            color: #f4f4f4; /* Warna teks footer yang terang */
            padding: 40px 20px;
            text-align: center;
            border-top: 1px solid #555;
        }

        footer > div {
            max-width: 1200px;
            margin: 0 auto;
        }

        footer img {
            height: 30px;
            margin-bottom: 15px;
            opacity: 0.7;
        }

        footer p {
            margin-bottom: 10px;
            font-size: 0.9em;
        }

        footer a {
            color: #eee;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #ccc;
        }

        /* Responsive Design (opsional, tapi sangat penting) */
        @media (max-width: 768px) {
            header > div {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            header img {
                margin-bottom: 10px;
            }

            header > div > div:last-child { /* Tombol login di header mobile */
                margin-top: 10px;
            }

            section:nth-child(3) > div {
                flex-direction: column;
                align-items: center;
            }

            section:nth-child(3) > div > div {
                width: 90%;
                margin-bottom: 30px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div>
            <img src="image.png" alt="Netes.io">
            <div class="login-button-container"><a href="/login"><button class="login-button">Login</button></a></div>
        </div>
    </header>

    <section>
        <div>
            <h1>Tumbuh Bersama Netes.io: Solusi Sederhana untuk Kebutuhan Anda.</h1>
            <p>Netes.io hadir untuk memberikan solusi praktis dan efektif bagi Anda. Jelajahi fitur-fitur kami dan temukan bagaimana kami dapat membantu Anda mencapai lebih banyak.</p>
            {{-- <button>Pelajari Lebih Lanjut</button> --}}
        </div>
    </section>

    <section>
        <h2>Apa yang Ditawarkan Netes.io?</h2>
        <div>
            <div>
                <img src="ikon_1.png" alt="Fitur 1">
                <h3>Fitur Unggulan 1</h3>
                <p>Deskripsi singkat fitur unggulan pertama yang memberikan manfaat luar biasa bagi pengguna.</p>
            </div>
            <div>
                <img src="ikon_2.png" alt="Fitur 2">
                <h3>Fitur Unggulan 2</h3>
                <p>Fitur inovatif kedua kami yang dirancang untuk meningkatkan efisiensi dan produktivitas Anda.</p>
            </div>
            <div>
                <img src="ikon_3.png" alt="Fitur 3">
                <h3>Fitur Unggulan 3</h3>
                <p>Rasakan kemudahan dengan fitur ketiga kami yang intuitif dan mudah digunakan oleh siapa saja.</p>
            </div>
        </div>
    </section>

    <footer>
        <div>
            <img src="image.png" alt="Netes.io">
            <p>&copy; 2025 Netes.io. All rights reserved.</p>
            <div>
                <a href="/privacy">Kebijakan Privasi</a>
                <a href="/terms">Syarat Layanan</a>
            </div>
        </div>
    </footer>
</body>
</html>