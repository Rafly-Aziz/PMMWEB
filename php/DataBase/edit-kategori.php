<?php
include 'config.php';

//cek id_kategori, kalau kosong maka diredirect ke halaman kategori
$id_kategori = isset($_GET['id_kategori']) ? (int) $_GET['id_kategori'] : 0;
if (empty($id_kategori)) {
    //header location digunakan untuk meredirect ke halaman yang lain.
    header('location:kategori.php?info=error&msg=kategori tidak ditemukan');
    exit();
}


//cek apakah user melakukan submit
$nama_kategori = isset($_POST['nama_kategori']) ? $_POST['nama_kategori'] : '';
if (!empty($nama_kategori)) {
    //proses submit ke database MySQL
    /*
    Format update ke database:
    UPDATE table_name SET namakolom1=value1, namakolom2=value2, dst
    WHERE kondisi
    */

    $sql = 'update tabel_kategori set nama_kategori=\''.$nama_kategori.'\' where id_kategori='.$id_kategori;

    //jalankan dan cek query di atas
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

    header('location:kategori.php?info='.$info.'&msg='.$msg);
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

$title = 'Edit Kategori - Asset Pribadi';
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

  <p><a href="kategori.php">&laquo; Back</a> | <a href="edit-kategori.php?id_kategori=<?php echo $id_kategori;?>">Reload</a></p>

    <form method="POST" action="">
        <table border="1">
            <tr>
                <td>Nama Kategori</td>
                <td>:</td>
                <td><input type="text" name="nama_kategori" size="50" value="<?php echo $row['nama_kategori']; ?>"></td>
            </tr>
        </table>
        <p>
            <input type="submit" name="sbm" value="Submit" />
        </p>
    </form>

</div>

<?php
include 'footer.php';