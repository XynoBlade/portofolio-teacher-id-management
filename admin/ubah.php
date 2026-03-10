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
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: linear-gradient(135deg, #87ACAC, #6f9797);
            min-height: 100vh;
        }

        .header {
            width: 100%;
            height: 90px;
            background: #BAC8BC;
            display: flex;
            align-items: center;
            padding-left: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,.12);
        }
        .logo img { width: 70px; height: auto; }

        .menu-bar {
            width: 100%;
            height: 50px;
            background: #BAC8BC;
            display: flex;
            align-items: center;
            gap: 40px;
            padding-left: 30px;
            box-shadow: 0 2px 6px rgba(0,0,0,.10);
        }
        .menu-bar a {
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            color: #280F34;
            letter-spacing: .5px;
            padding-bottom: 2px;
            border-bottom: 2px solid transparent;
            transition: color .2s, border-color .2s;
        }
        .menu-bar a:hover { border-bottom-color: #280F34; }

        .body {
            display: flex;
            justify-content: center;
            padding: 50px 30px;
        }

        .card-panel {
            background: #EDE9DA;
            border-radius: 14px;
            box-shadow: 0 4px 14px rgba(0,0,0,.14);
            padding: 34px 36px;
            width: 100%;
            max-width: 500px;
        }

        .card-panel h2 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            color: #280F34;
            margin-bottom: 24px;
            padding-bottom: 12px;
            border-bottom: 2px solid #87ACAC;
        }

        .form-group { margin-bottom: 18px; }
        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #b0c4c4;
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            background: #f9f7f0;
            color: #333;
            transition: border-color .2s, box-shadow .2s;
        }
        .form-group input[type="text"]:focus {
            outline: none;
            border-color: #6f9797;
            box-shadow: 0 0 0 3px rgba(111,151,151,.15);
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .btn {
            display: inline-block;
            padding: 10px 22px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-family: inherit;
            transition: opacity .2s, transform .1s;
        }
        .btn:hover { opacity: .82; transform: translateY(-1px); }
        .btn-primary   { background: #6f9797; color: #fff; }
        .btn-secondary { background: #280F34; color: #fff; }

        .footer {
            width: 100%;
            height: 120px;
            background: #5F5F5F;
            margin-top: 30px;
        }
    </style>
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
                    <label for="pelajaran_upt">Mata Pelajaran</label>
                    <input type="text" name="pelajaran_upt" id="pelajaran_upt"
                           value="<?= htmlspecialchars($nama['pelajaran']); ?>">
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
