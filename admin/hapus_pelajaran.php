<?php
include 'mikir.php'; 

function remove($id_pelajaran) {
    $db = db();


    $ambil = "SELECT pelajaran FROM pelajarans WHERE id_pelajaran = '$id_pelajaran'";
    $result = mysqli_query($db, $ambil);
    $data = mysqli_fetch_assoc($result);
    $nama_pelajaran = $data['pelajaran'];


    $update = "UPDATE guru 
               SET pelajaran = 'kosong' 
               WHERE pelajaran = '$nama_pelajaran'";
    mysqli_query($db, $update);

    
    mysqli_query($db, "DELETE FROM pelajarans WHERE id_pelajaran = '$id_pelajaran'");
}

$id_pelajaran = cek_data("id_pelajaran");
remove($id_pelajaran);
?>

<script>
    alert("Pelajaran berhasil dihapus!");
    location.href="index.php";
</script>