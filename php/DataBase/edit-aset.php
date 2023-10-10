<?php
include 'config.php';

//cek id_asset, kalau kosong maka diredirect ke halaman asset
$id_asset = isset($_GET['id_asset']) ? (int) $_GET['id_asset'] : 0;
if (empty($id_asset)) {
    //header location digunakan untuk meredirect ke halaman yang lain.
    header('location:asset.php?info=error&msg=asset tidak ditemukan');
    exit();
}

$nama_asset = isset($_POST['nama_asset']) ? $_POST['nama_asset'] : '';
if (!empty($nama_asset)) {

    $id_kategori = isset($_POST['id_kategori']) ? (int) $_POST['id_kategori'] : 0;
    $nama_asset = isset($_POST['nama_asset']) ? $_POST['nama_asset'] : '';
    $harga_asset = isset($_POST['harga_asset']) ? (int) $_POST['harga_asset'] : 0;
    $keterangan_asset = isset($_POST['keterangan_asset']) ? $_POST['keterangan_asset'] : '';
    
    //proses submit ke database MySQL
    /*
    Format update ke database:
    UPDATE table_name SET namakolom1=value1, namakolom2=value2, dst
    WHERE kondisi
    */

    $sql = 'UPDATE tabel_asset 
            SET 
            id_kategori=\''.$id_kategori.'\',
            nama_asset=\''.$nama_asset.'\',
            harga_asset=\''.$harga_asset.'\',
            keterangan_asset=\''.$keterangan_asset.'\'
            WHERE
            id_asset=\''.$id_asset.'\'
            ';

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

    header('location:index.php?info='.$info.'&msg='.$msg);
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

$title = 'Edit Asset - Asset Pribadi';
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

  <p><a href="index.php">&laquo; Back</a> | <a href="edit-asset.php?id_asset=<?php echo $id_asset;?>">Reload</a></p>

    <form method="POST" action="">
        <table border="1">
            <tr>
                <td>Nama Asset</td>
                <td>:</td>
                <td><input type="text" name="nama_asset" size="50" value="<?php echo $row['nama_asset'];?>"></td>
            </tr>
            <tr>
                <td>Harga Asset</td>
                <td>:</td>
                <td><input type="number" name="harga_asset" size="50" value="<?php echo $row['harga_asset'];?>"></td>
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
                            while($row_kategori = $result->fetch_assoc()) {
                                echo '<option value="'.$row_kategori['id_kategori'].'" ';

                                if ($row['id_kategori']==$row_kategori['id_kategori']) {
                                    echo 'selected';
                                }
                                
                                echo '>'.$row_kategori['nama_kategori'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><textarea name="keterangan_asset" cols="47" rows="5"><?php echo $row['keterangan_asset'];?></textarea></td>
            </tr>
        </table>
        <p>
            <input type="submit" name="sbm" value="Submit" />
        </p>
    </form>

</div>

<?php
include 'footer.php';