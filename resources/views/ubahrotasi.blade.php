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
      padding: 20px;
      background-color: #ffffff;
    }

    h2 {
      color: #2e8b57;
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }

    th, td {
      padding: 10px;
      text-align: center;
      border-bottom: 1px solid #eee;
    }

    td {
      background-color: #eafff0;
      border-radius: 8px;
    }

    .btn-edit {
      background-color: #fff8cc;
      border: none;
      border-radius: 5px;
      padding: 6px;
      cursor: pointer;
    }

    .btn-delete {
      background-color: #ffe5e5;
      border: none;
      border-radius: 5px;
      padding: 6px;
      cursor: pointer;
    }

    .btn-add {
      background: linear-gradient(to right, #42aa7f, #6ac7c2);
      border: none;
      color: white;
      padding: 10px 30px;
      border-radius: 10px;
      font-size: 14px;
      cursor: pointer;
    }

    .popup {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100vw; height: 100vh;
      background: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .popup-content {
      background-color: white;
      padding: 30px;
      border-radius: 15px;
      width: 300px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      text-align: center;
    }

    .popup-content h3 {
      margin-bottom: 15px;
      color: #2e8b57;
    }

    .popup-content input {
      width: 90%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #2e8b57;
      border-radius: 6px;
    }

    .popup-content button {
      margin-top: 15px;
      padding: 10px 20px;
      background: linear-gradient(to right, #42aa7f, #6ac7c2);
      color: white;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }

    .popup-content .close-btn {
      background: none;
      color: red;
      font-size: 16px;
      float: right;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h2>Jadwal Rotasi</h2>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Rotasi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody id="jadwal-body">
      <tr>
        <td>1</td>
        <td>10/04/2025</td>
        <td>08.00</td>
        <td>3</td>
        <td>
          <button class="btn-edit" onclick="openPopup(this)">✏️</button>
          <button class="btn-delete" onclick="deleteRow(this)">❌</button>
        </td>
      </tr>
    </tbody>
  </table>

  <div style="text-align:center;">
    <button class="btn-add" onclick="window.history.back()">Tambah Jadwal</button>
  </div>

  <!-- Popup -->
  <div class="popup" id="popup">
    <div class="popup-content">
      <span class="close-btn" onclick="closePopup()">✖</span>
      <h3>Ubah Jadwal Rotasi</h3>
      <input type="text" id="editTanggal" placeholder="Tanggal">
      <input type="text" id="editJam" placeholder="Jam">
      <input type="text" id="editRotasi" placeholder="Rotasi">
      <button onclick="saveChanges()">Simpan</button>
    </div>
  </div>

  <script>
    let currentRow = null;

    function openPopup(button) {
      const row = button.closest("tr");
      currentRow = row;
      const cells = row.querySelectorAll("td");

      document.getElementById('editTanggal').value = cells[1].textContent;
      document.getElementById('editJam').value = cells[2].textContent;
      document.getElementById('editRotasi').value = cells[3].textContent;

      document.getElementById('popup').style.display = 'flex';
    }

    function closePopup() {
      document.getElementById('popup').style.display = 'none';
    }

    function saveChanges() {
      if (currentRow) {
        const cells = currentRow.querySelectorAll("td");
        cells[1].textContent = document.getElementById('editTanggal').value;
        cells[2].textContent = document.getElementById('editJam').value;
        cells[3].textContent = document.getElementById('editRotasi').value;
      }
      closePopup();
    }

    function deleteRow(button) {
      const row = button.closest("tr");
      row.remove();
    }
  </script>
</body>
</html>
