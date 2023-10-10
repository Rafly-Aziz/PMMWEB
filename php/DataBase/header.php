<?php
//cek apakah $title sudah didefinisikan?
//kalau belum, set $title menjadi "Undefined"
if (!isset($title)) $title = 'Undefined';
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>

        <style type="text/css">
          body {
            background-color:#eee;
          }
          th {
            background-color: #ccc;
            padding: 5px;
          }
          td {
            padding: 5px;
          }
        </style>
    </head>
    <body>

        <div class="menu">
            <a href="index.php">Home</a> |
            <a href="kategori.php">Kategori</a> 
        </div>