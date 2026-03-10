<?php
include 'mikir.php';

$id    = cek_data("id_guru");
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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="asset/style.css">
</head>
<body>

    <div class="header">
        <div class="logo">
            <a href="http://localhost/Project%20MID%202026/index.php">
                <img src="https://s3.srv.kirei.co.id/sis-prod/school/tzuchi_1754821551496.png" alt="logo">
            </a>
        </div>
    </div>

    <div class="menu-bar">
        <a href="http://localhost/Project%20MID%202026/index.php">Menu</a>
        <a href="http://localhost/Project%20MID%202026/admin/index.php">Admin</a>
    </div>

    <div class="body">
        <div class="card-panel">
            <h2>Ubah Data Guru</h2>
            <form action="mikir.php" method="GET">

                <input type="hidden" name="id_upt" value="<?= $id; ?>">

                <div class="form-group">
                    <label for="guruBaru">Nama Guru</label>
                    <input type="text" name="guruBaru" id="guruBaru"
                           value="<?= htmlspecialchars($nama['nama_guru']); ?>">
                </div>

                <div class="form-group">
                    <input type="text" name="pelajaran_upt" id="pelajaran_upt"
                           value="<?= htmlspecialchars($nama['pelajaran']); ?>" hidden>
                </div>

                <div class="form-actions">
                    <input type="submit" value="Simpan Perubahan" name="dor" class="btn btn-primary">
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <div class="footer"></div>

</body>
</html>
