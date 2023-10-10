<?php
require 'koneksi.php';
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$passsword = $_POST["passsword"];

$query_sql = "INSERT INTO tbl_user (username, email, password, passsword)
            VALUES ('$username', ' $email',  '$Password', '$passsword' )";

if (mysqli_QUERY($conn, $query_sql)) {
    header("Location: index.html");
} else {
    echo "pendaftaran gagal : " . mysqli_error($conn);
}
?>