<?php
include 'config.php';

$title = 'Kategori - Asset Pribadi';
include 'header.php';

?>
<script type="text/javascript">
  /*
  fungsi javascript untuk menghapus data
  */
    function deleteData(id_kategori) {
      //fungsi confirm untuk memastikan user setuju.
        var cfm = confirm("Apakah anda yakin akan menghapus data ini?");
        if (cfm) {
            window.location.href='delete-kategori.php?id_kategori='+id_kategori;
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

  <p><a href="add-kategori.php">Add New</a> | <a href="kategori.php">Reload</a></p>

    <table border = "1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
          /*
          tampilkan data dari tabel_kategori
          Format:
      SELECT nama_kolom1, namakolom2, dst FROM nama_tabel
      atau utk menampilkan semua kolom, pakai *:
      SELECT * FROM nama_tabel
      */

      //ORDER BY untuk mengurutkan kolom
      //ASC : dari kecil ke besar
      //DESC: dari besar ke kecil
      $sql = 'select * from tabel_kategori ORDER BY nama_kategori ASC';
      $result = $conn->query($sql);

      //cek jumlah hasil query
      if ($result->num_rows > 0) {

        $no = 0;

        //ekstrak hasil query menggunakan fungsi loop WHILE
        while($row = $result->fetch_assoc()) {

          //buat $no dilakukan penambahan 1, sama spt $no = $no + 1;
          $no++;

                $link_edit = '<a href="edit-kategori.php?id_kategori='.$row['id_kategori'].'">[Edit]</a>';
                $link_delete = '<a href="javascript:void:;" onclick="deleteData(\''.$row['id_kategori'].'\')">[Delete]</a>';

          echo '
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$row['nama_kategori'].'</td>
                    <td>'.$link_edit.' '.$link_delete.'</td>
                </tr>
          ';
        }
      } else {
        echo '
        <tr>
          <td colspan="3">Data tidak ditemukan.</td>
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