<?php include 'admin/mikir.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin/asset/style.css">
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
        <a href="http://localhost/Project%20MID%202026/index.php" class="active">Menu</a>
        <a href="http://localhost/Project%20MID%202026/admin/index.php">Admin</a>
    </div>

    <div class="body">
        <div class="page-title">Data Guru</div>

        <div class="card-panel">
            <table>
                <tr>
                    <th>No.</th>
                    <th>Nama Guru</th>
                    <th>Mata Pelajaran</th>
                </tr>
                <?php $num = 1; foreach(show() as $z): ?>
                <tr>
                    <td><?= $num; ?></td>
                    <td><?= htmlspecialchars($z['nama_guru']); ?></td>
                    <td><?= htmlspecialchars($z['pelajaran']); ?></td>
                </tr>
                <?php $num++; endforeach; ?>
            </table>
        </div>
    </div>

    <div class="footer"></div>

</body>
</html>
