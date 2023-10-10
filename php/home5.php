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

  <form action="action.php" method="POST">
    <div>
        <label>Nama</label> <br>
        <input type="text" name="nama">
    </div>
    <div>
        <label>Email</label> <br>
        <input type="email" name="email">
    </div>
    <div>
        <label>Usia</label> <br>
        <input type="number" name="usia">
    </div>
    <div>
        <label>Tanggal Lahir</label> <br>
        <input type="date" name="tanggal_lahir">
    </div>
    <div>
        <label>Alamat</label> <br>
        <textarea name="alamat"></textarea>
    </div>
    <div style="margin-bottom: 1rem;">
        <label>Jenis Kelamin</label> <br>
        <input type="radio" name="jenis_kelamin" value="l"> Laki-Laki <br>
        <input type="radio" name="jenis_kelamin" value="p"> Perempuan
    </div>
    <div style="margin-bottom: 1rem;">
        <label>Status</label> <br>
        <select name="status">
            <option value="lajang">Lajang</option>
            <option value="menikah">Menikah</option>
        </select>
    </div>
    <div style="margin-bottom: 1rem;">
        <label>Hobi</label> <br>
        <input type="checkbox" name="hobi[]" value="berenang"> Berenang <br>
        <input type="checkbox" name="hobi[]" value="sepak bola"> Sepak Bola <br>
        <input type="checkbox" name="hobi[]" value="bulu tangkis"> Bulu Tangkis <br>
        <input type="checkbox" name="hobi[]" value="ngoding"> Ngoding <br>
    </div>
    <div>
       <input type="submit" >
    </div>
</form>
  

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