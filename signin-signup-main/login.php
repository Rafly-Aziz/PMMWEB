<?php
require 'koneksi.php';
$email = $_POST["email"];
$password = $_POST["password"];

$query_sql = "SELECT * FROM tbl_user 
                        WHERE email = '$email' AND password ='password'";

$result = mysql_query($conn, $query_sql);


if (mysqli_num_rows($result)> 0) {
    header("Location: dashbord.html");
} else {
    echo "<center><h1>Email atau password salah. silahkan coba lagi kembali. </h1>
    <button><strong><a href= 'index.html'>login</a><>/strong></button></center";
}
?>