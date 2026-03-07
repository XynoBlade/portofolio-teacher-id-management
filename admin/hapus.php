<?php 
include 'mikir.php'; 

function hapus($id){
    $db = db();

    // 1️⃣ Ambil nama guru dulu
    $ambil = "SELECT nama_guru FROM guru WHERE id_guru = '$id'";
    $result = mysqli_query($db, $ambil);
    $data = mysqli_fetch_assoc($result);
    $nama = $data['nama_guru'];

    // 2️⃣ Hapus dari tabel guru
    $delete = "DELETE FROM guru WHERE id_guru = '$id'";
    mysqli_query($db, $delete);

    // 3️⃣ Update pelajarans jadi kosong kalau gurunya sama
    $update = "UPDATE pelajarans 
               SET guru = 'kosong' 
               WHERE guru = '$nama'";
    mysqli_query($db, $update);
    
    }
    ?>
    <script>
        alert("Data berhasil dihapus!");
        location.href="index.php";
    </script>
    <?php
    hapus(cek_data("id_guru"));
?>

