<?php
include 'config.php';

$nama_kategori = isset($_POST['nama_kategori']) ? $_POST['nama_kategori'] : '';
if (!empty($nama_kategori)) {
    //proses submit ke database MySQL
    /*
    Format insert ke database:
    INSERT INTO table_name (column1, column2, column3,...)
  VALUES (value1, value2, value3,...)
    */

    $sql = 'insert into tabel_kategori (nama_kategori) values (\''.$nama_kategori.'\')';
    //id_kategori tidak perlu ditulis karena AUTOINCREMENT (otomatis id akan bertambah 1)

    //jalankan dan cek query insert di atas
  if ($conn->query($sql) === TRUE) {
    //berhasil
    $info = 'success';
    $msg = 'Data berhasil diproses';
  } else {
    //gagal
    $info = 'error';
    $msg = 'Error terjadi: '.$conn->error;
  }

  $conn->close();

    header('location:add-kategori.php?info='.$info.'&msg='.$msg);
    exit();
}

$title = 'Add Kategori - Asset Pribadi';
include 'header.php';

?>

<div class="content">
    <h1><?php echo $title; ?></h1>

    <?php
    //cek apakah ada info error/success?
    //kalau ada ditampilkan
    $info = isset($_GET['info']) ? $_GET['info'] : '';
    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
    if (!empty($info)) {
        echo 'Info: '.$info;
        echo '<br />Msg: '.$msg;
        echo '<br />';
    }
    ?>

  <p><a href="kategori.php">&laquo; Back</a> | <a href="add-kategori.php">Reload</a></p>

    <form method="POST" action="">
        <table border="1">
            <tr>
                <td>Nama Kategori</td>
                <td>:</td>
                <td><input type="text" name="nama_kategori" size="50"></td>
            </tr>
        </table>
        <p>
            <input type="submit" name="sbm" value="Submit" />
        </p>
    </form>

</div>

<?php
include 'footer.php';