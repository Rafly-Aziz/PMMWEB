<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="stylee.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
  <!-- Judul -->
  <div class="text-center">
    <h1>Berita dalam Berita</h1>
  </div>
  <!-- Navbar -->
  <div class="container">
    <nav>
      <ul>
        <li><a href="home.html">home</a></li>
        <li><a href="home2.html">news</a></li>
        <li><a href="home3.html">tecnology</a></li>
        <li><a href="home4.html">tv</a></li>
        <li><a href="home5.html">comedy</a></li>
        <li><a href="#">other</a>
          <ul class="dropdown">
            <li><a href="profil.html">profil</a></li>
            <li><a href="#">contact</a></li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>
  <!-- search -->
  <div class="boxContiner">
    <table class="elementsContainer">
      <tr>
        <td>
          <input type="text" placeholder="Search" class="search">
        </td>
        <td>
          <a href="#"><i class="material-icons">search</i></a>
        </td>
      </tr>
    </table>
  </div>

  <?php 
 $nama = $_POST['nama'];
    $email = $_POST['email'];
    $usia = $_POST['usia'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $hobi = $_POST['hobi'];

    echo "Nama : $nama <br>";
    echo "Email : $email <br>";
    echo "Usia : $usia <br>";
    echo "Tanggal Lahir : $tanggal_lahir <br>";
    echo "Alamat : $alamat <br>";
    echo "Jenis Kelamin : $jenis_kelamin <br>";
    echo "Status : $status <br>";
    echo "Hobi : $hobi <br>";
?>

  

  <!-- pagination -->
  <div class="pagination">
    <a href="">Previous</a>
    <a href="home.html">1</a>
    <a href="home2.html">2</a>
    <a href="home3.html">3</a>
    <a href="home4.html">4</a>
    <a href="home5.html">5</a>
    <a href="">Next</a>
  </div>

  

  <!-- footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col">
          <h4>news</h4>
          <ul>
            <li><a href="#">about us</a></li>
            <li><a href="#">our services</a></li>
            <li><a href="#">privacy policy</a></li>
            <li><a href="#">affiliate program</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>get help</h4>
          <ul>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">shipping</a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
  </footer>

</body>

</html>