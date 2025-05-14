<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pilih Kelamin</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 20px; 
            background: #f4f6f8; 
            display: flex;
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
        }

        .container {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); 
            padding: 30px; 
            width: 90%;
            max-width: 500px; 
            text-align: center; 
        }

        h2 {
            color: #2ca974;
            margin-bottom: 30px;
        }

        .option-grid {
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%; 
        }

        .option {
            border-radius: 10px;
            padding: 18px; 
            background: #e9ecef; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            cursor: pointer;
            transition: background-color 0.3s ease, border 0.3s ease; 
            text-align: left; 
        }

        .option:hover {
            background-color: #d3d9df; 
        }

        .option h3 {
            margin: 0 0 8px 0;
            color: #343a40; 
            font-size: 1.1em; 
        }

        .option p {
            font-size: 0.9em;
            color: #6c757d;
            margin: 0;
        }

        .option.active {
            border: 2px solid #2ca974;
            background: #e0f8f0;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1); 
        }

        .btn-save {
            display: block;
            margin-top: 30px;
            padding: 15px 30px; 
            background: linear-gradient(to right, #3ba57d, #4aa3d1);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1em; 
            width: 100%; 
            cursor: pointer;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-save:hover {
            background: linear-gradient(to right, #2e8b57, #418ad1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .bottom-nav {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Pilih Jenis Kelamin</h2>

        <div class="option-grid">
            <div class="option active" onclick="selectOption(this)">
                <h3>Jantan</h3>
                <p>Pilih opsi ini jika Anda ingin memilih jenis kelamin jantan.</p>
            </div>
            <div class="option" onclick="selectOption(this)">
                <h3>Betina</h3>
                <p>Pilih opsi ini jika Anda ingin memilih jenis kelamin betina.</p>
            </div>
            <div class="option" onclick="selectOption(this)">
                <h3>Seimbang</h3>
                <p>Pilih opsi ini jika Anda ingin memilih opsi seimbang.</p>
            </div>
        </div>

        <button class="btn-save" onclick="window.history.back()">Simpan</button>

    </div>

    <script>
    function selectOption(selected) {
        document.querySelectorAll('.option').forEach(option => {
            option.classList.remove('active');
        });
        selected.classList.add('active');

        const selectedGender = selected.querySelector('h3').innerText;
        localStorage.setItem('selectedGender', selectedGender);
    }

    window.onload = function () {
        const savedGender = localStorage.getItem('selectedGender');
        if (savedGender) {
            document.querySelectorAll('.option').forEach(option => {
                if (option.querySelector('h3').innerText === savedGender) {
                    option.classList.add('active');
                }
            });
        }
    }

    function saveAndBack() {
        const selected = document.querySelector('.option.active');
        if (selected) {
            const selectedGender = selected.querySelector('h3').innerText;
            alert("Pilihan disimpan: " + selectedGender);
            window.history.back(); 
        } else {
            alert("Silakan pilih jenis kelamin terlebih dahulu.");
        }
    }
    </script>

</body>

</html>