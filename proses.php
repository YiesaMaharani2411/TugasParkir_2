
<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$no_parkir = trim($_POST["no_parkir"] ?? "");
$no_kendaraan = trim($_POST["no_kendaraan"] ?? "");
$jenis_kendaraan = $_POST["jenis_kendaraan"] ?? "";
$nama_petugas = trim($_POST["nama_petugas"] ?? "");

$lama_parkir = filter_var(
    $_POST["lama_parkir"] ?? null,
    FILTER_VALIDATE_INT
);

if (
    $no_parkir === "" ||
    $no_kendaraan === "" ||
    $nama_petugas === "" ||
    $lama_parkir === false ||
    $lama_parkir < 1 ||
    $lama_parkir > 100
) {
    exit("Input tidak valid. Lama parkir harus 1–100 jam.");
}

$tarif_awal = 0;
$tarif_lanjutan = 0;

switch ($jenis_kendaraan) {
    case "Motor":
        $tarif_awal = 3000;
        $tarif_lanjutan = 2000;
        break;

    case "Mobil":
        $tarif_awal = 5000;
        $tarif_lanjutan = 3000;
        break;

    case "Truk":
        $tarif_awal = 7000;
        $tarif_lanjutan = 3000;
        break;

    default:
        exit("Jenis kendaraan tidak valid.");
}

$total_bayar = $tarif_awal;

if ($lama_parkir > 1) {
    $total_bayar +=
        ($lama_parkir - 1) * $tarif_lanjutan;
}

function aman($nilai) {
    return htmlspecialchars(
        (string) $nilai,
        ENT_QUOTES,
        "UTF-8"
    );
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Parkir</title>

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
        }

        .hasil {
            line-height: 1.9;
        }

        .total {
            margin-top: 20px;
            padding: 15px;
            background: #e5f5eb;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #245b70;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Hasil Parkir Kendaraan</h2>

    <div class="hasil">
        <strong>Nomor Parkir:</strong>
        <?= aman($no_parkir) ?><br>

        <strong>Nomor Kendaraan:</strong>
        <?= aman($no_kendaraan) ?><br>

        <strong>Jenis Kendaraan:</strong>
        <?= aman($jenis_kendaraan) ?><br>

        <strong>Lama Parkir:</strong>
        <?= aman($lama_parkir) ?> jam<br>

        <strong>Nama Petugas:</strong>
        <?= aman($nama_petugas) ?>
    </div>

    <div class="total">
        Total Bayar: Rp<?= number_format(
            $total_bayar, 0, ',', '.'
        ) ?>
    </div>

    <a href="index.php">Kembali ke Form</a>
</div>

</body>
</html>
