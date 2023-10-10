<?php 
$servername = "localhost";
$database = "pmmweb";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die ("koneksi gagal : " . mysqli_connect_eror());
} else {
    echo "koneksi berhasil";
}
?>