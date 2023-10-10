<?php
//konfigurasi database
$db_host = 'localhost';//bisa juga ditulis IP local dengan 127.0.0.1
$db_user = 'root';
$db_pass = '';
$db_name = 'asset_pribadi';

//membuat koneksi ke database
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

//cek koneksi
if ($conn->connect_error) {
    echo "Error: Gagal koneksi ke MySQL.<br />";
    echo "Debugging error: " . $conn->connect_error;
    exit();
}