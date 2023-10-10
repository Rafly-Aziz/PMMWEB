<?php
include 'config.php';

//cek id_asset, kalau kosong maka diredirect ke halaman asset
$id_asset = isset($_GET['id_asset']) ? (int) $_GET['id_asset'] : 0;
if (empty($id_asset)) {
    //header location digunakan untuk meredirect ke halaman yang lain.
    header('location:index.php?info=error&msg=asset tidak ditemukan');
    exit();
}

/*
ambil 1 data dari tabel_asset berdasarkan id_asset
Format:
SELECT * FROM nama_tabel where kondisi
*/

$sql = 'select * from tabel_asset where id_asset='.$id_asset;
$result = $conn->query($sql);

//untuk mengambil 1 data dari query di atas
$row = $result->fetch_assoc();

//cek apakah id_asset ada di database?
//kalau tidak ada redirect ke index.php
if ($id_asset != $row['id_asset']) {
    header('location:index.php?info=error&msg=asset tidak ditemukan');
    exit();
}

//proses delete data di database MySQL
/*
Format delete data di database:
DELETE FROM table_name 
WHERE kondisi
*/

$sql = 'delete from tabel_asset where id_asset='.$id_asset;

//jalankan dan cek query insert di atas
if ($conn->query($sql) === TRUE) {
  //berhasil
  $info = 'success';
  $msg = 'asset <b>'.$row['nama_asset'].'</b> berhasil dihapus.';
} else {
  //gagal
  $info = 'error';
  $msg = 'Error terjadi: '.$conn->error;
}

$conn->close();

header('location:index.php?info='.$info.'&msg='.$msg);