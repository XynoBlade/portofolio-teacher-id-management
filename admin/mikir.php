<?php
    function db() {
    $conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "gurudb"
    
    );

if($conn -> connect_errno == 1){
        return $conn -> $connect_error;
    }else{
        return $conn;
    }
}

function cek_data($manuk){
        if(isset($_GET[$manuk]) == TRUE){
            if(isset($_GET[$manuk]) == NULL){
                return '0';
            }else{
                return $_GET[$manuk];
            }
        }else{
            return '0';
}
}

function show(){
    $query = "SELECT * FROM guru";
    //koneksi, command
    $data = mysqli_query(db(), $query);
    return $data;
}

function add($nama, $pelajaran){
    $db = db();

    $cek = "SELECT id_guru FROM guru WHERE nama_guru = '$nama'";
    $data = mysqli_query($db, $cek);

    if(mysqli_num_rows($data) > 0){
        $update = "UPDATE guru 
                   SET pelajaran = '$pelajaran'
                   WHERE nama_guru = '$nama'";
        mysqli_query($db, $update);
    }else{
        $insert = "INSERT INTO guru VALUES(NULL, '$nama', '$pelajaran')";
        mysqli_query($db, $insert);
    }
}

function update($id, $nama_baru, $pelajaran) {
    $db = db();
    $ambil = "SELECT nama_guru FROM guru WHERE id_guru = '$id'";
    $result = mysqli_query($db, $ambil);
    $data = mysqli_fetch_assoc($result);
    $nama_lama = $data['nama_guru'];

    $query = "UPDATE guru 
              SET nama_guru = '$nama_baru', pelajaran = '$pelajaran' 
              WHERE id_guru = '$id'";
    mysqli_query($db, $query);

    $update_pelajaran = "UPDATE pelajarans 
                         SET guru = '$nama_baru'
                         WHERE guru = '$nama_lama'";
    mysqli_query($db, $update_pelajaran);

    ?>
        <script>
            alert("Data Telah Diubah ygy!");
            location.href="index.php";
        </script>
    <?php
}

function update_pelajaran($nama, $pelajaran) {
    $db = db();
    $cek = "SELECT id_pelajaran FROM pelajarans WHERE pelajaran = '$pelajaran'";
    $data = mysqli_query($db, $cek);

    if (mysqli_num_rows($data) > 0) {
        $update = "UPDATE pelajarans 
                   SET guru = '$nama'
                   WHERE pelajaran = '$pelajaran'";
        mysqli_query($db, $update);
    } else {
        $insert = "INSERT INTO pelajarans (guru, pelajaran)
                   VALUES ('$nama', '$pelajaran')";
        mysqli_query($db, $insert);
    }
}

if (cek_data("dor") == "Kirim"){
    add(cek_data('nama'),cek_data('pelajaran'));
    update_pelajaran(cek_data('nama'),cek_data('pelajaran'));
    ?>
    <script>
        alert("Data telah ditambah!!");
        location.href="index.php";
    </script>
<?php

}else if(cek_data('dor') == "Ubah"){
    update(cek_data('id_upt'), cek_data('guruBaru'), cek_data('pelajaran_upt'));
}else if(cek_data('dor') == "Tambah"){
    nambah_pelajaran(cek_data('datapel'));
}


function nambah_pelajaran($pelajaran){
    $kosong = "kosong";
    $query = "INSERT INTO pelajarans VALUES(NULL, '$kosong', '$pelajaran')";
    mysqli_query(db(), $query);
    ?>
    <script>
        alert("Pelajaran telah ditambah!!");
        location.href="index.php";
    </script>
    <?php
}

function show_matpel(){
    $query = "SELECT * FROM pelajarans";
    //koneksi, command
    $data = mysqli_query(db(), $query);
    return $data;
}

function pelajaran_tersedia(){
    $db = db();
    $query = "SELECT * FROM pelajarans WHERE guru = 'kosong'";
    return mysqli_query($db, $query);
}
?>