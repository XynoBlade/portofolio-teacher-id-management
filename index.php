<?php
    include 'admin/mikir.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
    <link rel="stylesheet" href="admin/asset/style.css">
</head>
<body>
    <nav>
        <div class="img">
            <a href="http://localhost/Project%20MID%202026/index.php"><img src="admin/asset/logo.png" alt="logo" id="logo"></a>
        </div>

        <div class="list">
        <li><a href="http://localhost/Project%20MID%202026/admin/index.php">Admin</a></li>
        <li><a href="http://localhost/Project%20MID%202026/index.php">Dashboard</a></li>
        </div>
    </nav>

    <div class="page-wrapper">
        <h1>Data Guru</h1>

        <div class="card">
            <table>
                <tr>
                    <th>No.</th>
                    <th>Nama Guru</th>
                    <th>Mata Pelajaran</th>
                </tr>
                <?php
                $num = 1;
                foreach(show() as $z){ ?>
                <tr>
                    <td><?= $num; ?></td>
                    <td><?= $z['nama_guru']; ?></td>
                    <td><?= $z['pelajaran'] ?></td>
                </tr>
                <?php $num++; } ?>
            </table>
        </div>
    </div>
</body>
</html>