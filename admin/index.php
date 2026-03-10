<?php
    include 'mikir.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console</title>
    <link rel="stylesheet" href="asset/style.css">
</head>
<body>
    <nav>
        <div class="img">
            <a href="http://localhost/Project%20MID%202026/index.php"><img src="asset/logo.png" alt="logo" id="logo"></a>
        </div>

        <div class="list">
        <li><a href="http://localhost/Project%20MID%202026/admin/index.php">Admin</a></li>
        <li><a href="http://localhost/Project%20MID%202026/index.php">Dashboard</a></li>
        </div>
    </nav>

    <div class="page-wrapper">
        <h1>Edit Data Guru</h1>

        <div class="two-col">

            <!-- LEFT: Forms -->
            <div>
                <div class="card">
                    <form action="" method="GET">
                        <div class="form-group">
                            <label for="nama">Nama Guru</label>
                            <input type="text" name="nama" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="pelajaran">Mata Pelajaran</label>
                            <select name="pelajaran" id="pelajaran" required>
                                <option value="">-- Pilih Pelajaran --</option>
                                <?php
                                    $data = pelajaran_tersedia();
                                    while($row = mysqli_fetch_assoc($data)){ ?>
                                    <option value="<?= $row['pelajaran']; ?>">
                                        <?= $row['pelajaran']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-actions">
                            <input type="submit" value="Kirim" name="dor" class="btn btn-primary">
                        </div>
                    </form>
                </div>

                <div class="card">
                    <form action="" method="GET">
                        <div class="form-group">
                            <label for="datapel">Mata Pelajaran</label>
                            <input type="text" name="datapel" id="datapel" required>
                        </div>
                        <div class="form-actions">
                            <input type="submit" value="Tambah" name="dor" class="btn btn-secondary">
                        </div>
                    </form>
                </div>
            </div>

            <!-- RIGHT: Tables -->
            <div>
                <div class="card">
                    <table>
                        <tr>
                            <th>No.</th>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <?php
                        $num = 1;
                        foreach(show() as $z){ ?>
                        <tr>
                            <td><?= $num; ?></td>
                            <td><?= $z['nama_guru']; ?></td>
                            <td><?= $z['pelajaran'] ?></td>
                            <td><a href="hapus.php?id_guru=<?= $z['id_guru']; ?>" class="btn btn-delete">Hapus</a></td>
                            <td><a href="ubah.php?id_guru=<?= $z['id_guru']; ?>" class="btn btn-edit">Ubah</a></td>
                        </tr>
                        <?php $num++; } ?>
                    </table>
                </div>

                <div class="card">
                    <table>
                        <tr>
                            <th>No.</th>
                            <th>Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $num = 1;
                        foreach(show_matpel() as $z){ ?>
                        <tr>
                            <td><?= $num; ?></td>
                            <td><?= $z['guru']; ?></td>
                            <td><?= $z['pelajaran'] ?></td>
                            <td><a href="hapus_pelajaran.php?id_pelajaran=<?= $z['id_pelajaran']; ?>" class="btn btn-delete">Hapus</a></td>
                        </tr>
                        <?php $num++; } ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>
</html>