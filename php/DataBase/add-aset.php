<?php
include 'config.php';

$nama_asset = isset($_POST['nama_asset']) ? $_POST['nama_asset'] : '';
if (!empty($nama_asset)) {

    $id_kategori = isset($_POST['id_kategori']) ? (int) $_POST['id_kategori'] : 0;
    $nama_asset = isset($_POST['nama_asset']) ? $_POST['nama_asset'] : '';
    $harga_asset = isset($_POST['harga_asset']) ? (int) $_POST['harga_asset'] : 0;
    $keterangan_asset = isset($_POST['keterangan_asset']) ? $_POST['keterangan_asset'] : '';
    
    //proses submit ke database MySQL
    /*
    Format insert ke database:
    INSERT INTO table_name (column1, column2, column3,...)
  VALUES (value1, value2, value3,...)
    */

    $sql = 'insert into tabel_asset 
            (id_kategori, nama_asset, harga_asset, keterangan_asset) 
            values 
            (\''.$id_kategori.'\',\''.$nama_asset.'\',\''.$harga_asset.'\',\''.$keterangan_asset.'\')
            ';
    //id_asset tidak perlu ditulis karena AUTOINCREMENT (otomatis id akan bertambah 1)

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

    header('location:add-asset.php?info='.$info.'&msg='.$msg);
    exit();
}

$title = 'Add Asset - Asset Pribadi';
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

  <p><a href="index.php">&laquo; Back</a> | <a href="add-asset.php">Reload</a></p>

    <form method="POST" action="">
        <table border="1">
            <tr>
                <td>Nama Asset</td>
                <td>:</td>
                <td><input type="text" name="nama_asset" size="50"></td>
            </tr>
            <tr>
                <td>Harga Asset</td>
                <td>:</td>
                <td><input type="number" name="harga_asset" size="50"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td>
                    <select name="id_kategori">
                        <option value="0">Tanpa Kategori</option>
                        <?php
                        /*
                        tampilkan data dari tabel_kategori
                        Format:
                        SELECT nama_kolom1, namakolom2, dst FROM nama_tabel
                        atau utk menampilkan semua kolom, pakai *:
                        SELECT * FROM nama_tabel
                        */

                        $sql = 'select * from tabel_kategori';
                        $result = $conn->query($sql);

                        //cek jumlah hasil query
                        if ($result->num_rows > 0) {

                            $no = 0;

                            //ekstrak hasil query menggunakan fungsi loop WHILE
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row['id_kategori'].'">'.$row['nama_kategori'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><textarea name="keterangan_asset" cols="47" rows="5"></textarea></td>
            </tr>
        </table>
        <p>
            <input type="submit" name="sbm" value="Submit" />
        </p>
    </form>

</div>

<?php
include 'footer.php';