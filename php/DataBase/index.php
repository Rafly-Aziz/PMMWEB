<?php
include 'config.php';

$title = 'Home - Asset Pribadi';
include 'header.php';

//membuat array kategori agar bisa ditampilkan di tabel
$sql = 'select * from tabel_kategori';
$result = $conn->query($sql);

$arr_kategori = array();
//cek jumlah hasil query
if ($result->num_rows > 0) {

    $no = 0;

    //ekstrak hasil query menggunakan fungsi loop WHILE
    while($row = $result->fetch_assoc()) {
        $arr_kategori[$row['id_kategori']] = $row['nama_kategori'];
    }
}
?>

<script type="text/javascript">
  /*
  fungsi javascript untuk menghapus data
  */
    function deleteData(id_asset) {
      //fungsi confirm untuk memastikan user setuju.
        var cfm = confirm("Apakah anda yakin akan menghapus data ini?");
        if (cfm) {
            window.location.href='delete-asset.php?id_asset='+id_asset;
        }
    }
</script>

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

  <p><a href="add-asset.php">Add New</a> | <a href="index.php">Reload</a></p>

    <table border = "1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Asset</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          /*
          tampilkan data dari tabel_asset
          Format:
      SELECT nama_kolom1, namakolom2, dst FROM nama_tabel
      atau utk menampilkan semua kolom, pakai *:
      SELECT * FROM nama_tabel
      */

      $sql = 'select * from tabel_asset';
      $result = $conn->query($sql);

      //cek jumlah hasil query
      if ($result->num_rows > 0) {

        $no = 0;

        //ekstrak hasil query menggunakan fungsi loop WHILE
        while($row = $result->fetch_assoc()) {

          //buat $no dilakukan penambahan 1, sama spt $no = $no + 1;
          $no++;

                $link_edit = '<a href="edit-asset.php?id_asset='.$row['id_asset'].'">[Edit]</a>';
                $link_delete = '<a href="javascript:void:;" onclick="deleteData(\''.$row['id_asset'].'\')">[Delete]</a>';

                $nama_kategori = 'Tanpa kategori';
                if (isset($arr_kategori[$row['id_kategori']])) {
                  $nama_kategori = $arr_kategori[$row['id_kategori']];
                }

          echo '
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$row['nama_asset'].'</td>
                    <td>'.$nama_kategori.'</td>
                    <td align="right">Rp '.number_format($row['harga_asset']).'</td>
                    <td>'.nl2br($row['keterangan_asset']).'</td>
                    <td>'.$link_edit.' '.$link_delete.'</td>
                </tr>
          ';
          //number_format adalah fungsi PHP untuk memformat angka.
          //nl2br untuk memberikan line break / ganti baris jika ada.
        }
      } else {
        echo '
        <tr>
          <td colspan="6">Data tidak ditemukan.</td>
        </tr>
        ';
      }

      //tutup koneksi MySQL
      $conn->close();
          ?>
        </tbody>
    </table>

</div>

<?php
include 'footer.php';