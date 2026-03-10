<?php
include 'mikir.php';

$id = cek_data("id_guru");

$query = "SELECT * FROM gurus WHERE id_guru = '$id'";
$data  = mysqli_query(db(), $query);
$nama  = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Guru</title>
    <link rel="stylesheet" href="asset/style.css">
</head>
<body>
    <nav>
        <li><a href="http://localhost/Project%20MID/admin/index.php">Admin</a></li>
        <li><a href="http://localhost/Project%20MID/index.php">Dashboard</a></li>
    </nav>

    <div class="page-wrapper">
        <h1>Update Jadi Apa?</h1>

        <div class="card" style="max-width: 480px;">
            <form action="mikir.php" method="get">

                <input type="hidden" name="id_upt" value="<?= $id; ?>">

                <div class="form-group">
                    <label for="guruBaru">Nama Guru Baru</label>
                    <input type="text" name="guruBaru" id="guruBaru"
                           value="<?= $nama['nama_guru']; ?>">
                </div>

                <div class="form-group">
                    <label for="pelajaran_upt">Pelajaran</label>
                    <input type="text" name="pelajaran_upt" id="pelajaran_upt"
                           value="<?= $nama['pelajaran']; ?>">
                </div>

                <div class="form-actions">
                    <input type="submit" value="Ubah" name="dor" class="btn btn-primary">
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>

            </form>
        </div>
    </div>
</body>
</html>