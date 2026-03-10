<?php include 'mikir.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console</title>
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
        <a href="http://localhost/Project%20MID%202026/admin/index.php" class="active">Admin</a>
    </div>

    <div class="body">

        <div class="page-title">Edit Data Guru</div>

        <!-- ROW 1 -->
        <div class="card-panel panel-wide">
            <h2>Daftar Guru</h2>
            <table>
                <tr>
                    <th>No.</th>
                    <th>Nama Guru</th>
                    <th>Mata Pelajaran</th>
                    <th colspan="2">Aksi</th>
                </tr>
                <?php $num = 1; foreach(show() as $z): ?>
                <tr>
                    <td><?= $num; ?></td>
                    <td><?= htmlspecialchars($z['nama_guru']); ?></td>
                    <td><?= htmlspecialchars($z['pelajaran']); ?></td>
                    <td><a href="hapus.php?id_guru=<?= $z['id_guru']; ?>" class="btn btn-delete">Hapus</a></td>
                    <td><a href="ubah.php?id_guru=<?= $z['id_guru']; ?>"  class="btn btn-edit">Ubah</a></td>
                </tr>
                <?php $num++; endforeach; ?>
            </table>
        </div>

        <div class="card-panel panel-narrow">
            <h2>Tambah Guru</h2>
            <form action="" method="GET">
                <div class="form-group">
                    <label for="nama">Nama Guru</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan nama guru">
                </div>
                <div class="form-group">
                    <label for="pelajaran">Mata Pelajaran</label>
                    <select name="pelajaran" id="pelajaran" required>
                        <option value="">-- Pilih Pelajaran --</option>
                        <?php
                            $data = pelajaran_tersedia();
                            while($row = mysqli_fetch_assoc($data)): ?>
                            <option value="<?= htmlspecialchars($row['pelajaran']); ?>">
                                <?= htmlspecialchars($row['pelajaran']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-actions">
                    <input type="submit" value="Tambah Guru" name="dor" class="btn btn-primary">
                </div>
            </form>
        </div>

        <!-- ROW 2 -->
        <div class="card-panel panel-wide">
            <h2>Daftar Mata Pelajaran</h2>
            <table>
                <tr>
                    <th>No.</th>
                    <th>Guru</th>
                    <th>Mata Pelajaran</th>
                    <th>Aksi</th>
                </tr>
                <?php $num = 1; foreach(show_matpel() as $z): ?>
                <tr>
                    <td><?= $num; ?></td>
                    <td><?= htmlspecialchars($z['guru']); ?></td>
                    <td><?= htmlspecialchars($z['pelajaran']); ?></td>
                    <td><a href="hapus_pelajaran.php?id_pelajaran=<?= $z['id_pelajaran']; ?>" class="btn btn-delete">Hapus</a></td>
                </tr>
                <?php $num++; endforeach; ?>
            </table>
        </div>

        <div class="card-panel panel-narrow">
            <h2>Tambah Mata Pelajaran</h2>
            <form action="" method="GET">
                <div class="form-group">
                    <label for="datapel">Nama Pelajaran</label>
                    <input type="text" name="datapel" id="datapel" placeholder="Masukkan mata pelajaran" required>
                </div>
                <div class="form-actions">
                    <input type="submit" value="Tambah" name="dor" class="btn btn-secondary">
                </div>
            </form>
        </div>

    </div>

    <div class="footer"></div>

</body>
</html>
