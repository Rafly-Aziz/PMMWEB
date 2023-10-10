<?php
include 'config.php';

//cek id_kategori, kalau kosong maka diredirect ke halaman kategori
$id_kategori = isset($_GET['id_kategori']) ? (int) $_GET['id_kategori'] : 0;
if (empty($id_kategori)) {
    //header location digunakan untuk meredirect ke halaman yang lain.
    header('location:kategori.php?info=error&msg=kategori tidak ditemukan');
    exit();
}

/*
ambil 1 data dari tabel_kategori berdasarkan id_kategori
Format:
SELECT * FROM nama_tabel where kondisi
*/

$sql = 'select * from tabel_kategori where id_kategori='.$id_kategori;
$result = $conn->query($sql);

//untuk mengambil 1 data dari query di atas
$row = $result->fetch_assoc();

//cek apakah id_kategori ada di database?
//kalau tidak ada redirect ke kategori.php
if ($id_kategori != $row['id_kategori']) {
    header('location:kategori.php?info=error&msg=kategori tidak ditemukan');
    exit();
}

//proses delete data di database MySQL
/*
Format delete data di database:
DELETE FROM table_name 
WHERE kondisi
*/

$sql = 'delete from tabel_kategori where id_kategori='.$id_kategori;

//jalankan dan cek query insert di atas
if ($conn->query($sql) === TRUE) {
  //berhasil
  $info = 'success';
  $msg = 'Kategori <b>'.$row['nama_kategori'].'</b> berhasil dihapus.';
} else {
  //gagal
  $info = 'error';
  $msg = 'Error terjadi: '.$conn->error;
}

$conn->close();

header('location:kategori.php?info='.$info.'&msg='.$msg);