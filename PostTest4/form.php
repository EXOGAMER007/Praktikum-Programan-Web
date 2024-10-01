<?php 
$nama = "";
$tier = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST["name"];
    $tier = $_POST["tier"];
    $umur = $_POST["umur"];
    $kode = $_POST["kode"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <a href="index.html" class="nav-item">Home</a>
      <p>Genshin Tier List</p>
      <div class="sub-nav">
        <a href="form.php" class="nav-item">Form</a>
        <a href="biodata.html" class="nav-item">About </a>
      </div>
    </header>
    <main class="container-content">
      <div class="sub-container">
        <h1>Formulir Pengisian</h1>
      </div>
      <div class="sub-container2">
        <form action="" method="POST" id="form">
          <div class="sub-form1">
            <label for="name"> Nama </label><br>
            <textarea name="name" id="name" placeholder="Masukan nama semua karakter yang ingin di masukan" require></textarea>
          </div>

          <div class="sub-form2">
            <label for="tier"> Tier :</label>
            <input type="radio" name="tier" id="tierS" value="S" checked/><label for="tierS">S</label>
            <input type="radio" name="tier" id="tierA" value="A"/><label for="tierA">A</label>
            <input type="radio" name="tier" id="tierB" value="B"/><label for="tierB">B</label>
            <input type="radio" name="tier" id="tierC" value="C"/><label for="tierC">C</label>
            <input type="radio" name="tier" id="tierD" value="D"/><label for="tierD"></label>
          </div>

          <div class="sub-form3">
            <label for="">umur</label>
            <input type="number" name="umur" id="umur" placeholder="Masukan umur asli pemilik" value="1"/>
          </div>

          <div class="sub-form4">
            <label for="kode">kode </label>
            <input type="password" name="kode" id="kode" placeholder="Masukan kode" />
          </div>

          <button type="submit" class="sub-form5">Submit</button>
        </form>
      </div>
      <h1>Output :</h1><br>
      <div class="container-tier">
        <?php if ($nama == "" || $tier == ""):?>
          <p></p>
        <?php elseif ($kode != 123 || $umur != 18): ?>
          <p>Kode atau umur tidak sesuai</p>
        <?php else: ?>
          <div class="tier-<?=$tier ?>"><?= $tier ?></div>
          <br />
          <p class="karakter"><?= $nama ?></p>
        <?php endif; ?>
      </div>
    </main>
    <footer>
      <p>Copyright &copy; EXOGAMER007</p>
      <button class="mode">Mode Backround</button>
    </footer>
    <script src="script.js"></script>
  </body>
</html>
