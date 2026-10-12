
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Parkir Kendaraan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 30px 15px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #245b70;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 25px;
            border: none;
            border-radius: 6px;
            background: #397f96;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #285f73;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Parkir Kendaraan</h2>

    <form action="proses.php" method="POST">

        <label for="no_parkir">Nomor Parkir</label>
        <input type="text" id="no_parkir"
               name="no_parkir" required>

        <label for="no_kendaraan">Nomor Kendaraan</label>
        <input type="text" id="no_kendaraan"
               name="no_kendaraan" required>

        <label for="jenis_kendaraan">Jenis Kendaraan</label>
        <select id="jenis_kendaraan"
                name="jenis_kendaraan" required>
            <option value="">-- Pilih Kendaraan --</option>
            <option value="Motor">Motor</option>
            <option value="Mobil">Mobil</option>
            <option value="Truk">Truk</option>
        </select>

        <label for="lama_parkir">Lama Parkir (jam)</label>
        <input type="number" id="lama_parkir"
               name="lama_parkir"
               min="1" max="100" step="1"
               placeholder="Masukkan 1–100 jam"
               required>

        <label for="nama_petugas">Nama Petugas</label>
        <input type="text" id="nama_petugas"
               name="nama_petugas" required>

        <button type="submit">Submit</button>

    </form>
</div>

</body>
</html>
