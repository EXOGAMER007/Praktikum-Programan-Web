<?php 
require "konek.php";
require "functions.php";

$nama = "";
$tier = "";

$sql = mysqli_query($conn, "SET SQL_SAFE_UPDATES = 0");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST["name"];
    $tier = $_POST["tier"];
    $mode = $_POST["mode"];
    $target = $_POST["target"];
    $kode = $_POST["kode"];

    $cek2 = mysqli_query($conn, "SELECT * FROM tbtier where tier = '$tier'");
    $cek = mysqli_query($conn, "SELECT * FROM tbtier where tier = '$target'");


    switch ($kode) {
      case 2222:
        if($mode == "tambah") {
          if ($cek2->num_rows < 1) {
            tampilkanAlert('Berhasil Menambah data');
            $tambah1=tambah_data($conn, $nama, $tier);
          }else {
            tampilkanAlert('Mohon pilih Tier lain');
          }
        }
        if ($mode=="hapus") {
          tampilkanAlert('Data berhasil di hapus');
          hapus_data($conn, $target);
        }
        if ($mode== "edit") {
          if ($cek2->num_rows < 1) {
            tampilkanAlert('Data berhasil di edit');
            edit_data($conn, $nama, $tier, $target);
          }else {
            tampilkanAlert('Mohon pilih Tier lain');
          }
        }
        break;
      
      default:

        tampilkanAlert('Kode Salah!!!');
        break;
    }
}

$sql = mysqli_query($conn, "SELECT * FROM tbtier ORDER BY FIELD(tier, 'S', 'A', 'B', 'C', 'D');");

$tier = [];

while ($row = mysqli_fetch_assoc($sql)){
    $tier[] = $row;
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
      <a href="index.php" class="nav-item">Home</a>
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
            <textarea name="name" id="name" placeholder="Masukan nama semua karakter yang ingin di masukan(hanya di isi saat akan menambahkan)" require></textarea>
          </div>

          <div class="sub-form2">
            <label for="tier"> Tier :</label>
            <input type="radio" name="tier" id="tierS" value="S" checked/><label for="tierS">S</label>
            <input type="radio" name="tier" id="tierA" value="A"/><label for="tierA">A</label>
            <input type="radio" name="tier" id="tierB" value="B"/><label for="tierB">B</label>
            <input type="radio" name="tier" id="tierC" value="C"/><label for="tierC">C</label>
            <input type="radio" name="tier" id="tierD" value="D"/><label for="tierD">D</label>
          </div>

          <div class="sub-form3">
            <label for="mode">Mode :</label>
            <input type="radio" name="mode" id="tambah" value="tambah" checked/><label for="tambah">Tambah</label>
            <input type="radio" name="mode" id="hapus" value="hapus"/><label for="hapus">Hapus</label>
            <input type="radio" name="mode" id="edit" value="edit"/><label for="edit">Edit</label>
          </div>

          <div class="sub-form6">
            <label for="target"> target :</label>
            <input type="radio" name="target" id="targetS" value="S" checked/><label for="targetS">S</label>
            <input type="radio" name="target" id="targetA" value="A"/><label for="targetA">A</label>
            <input type="radio" name="target" id="targetB" value="B"/><label for="targetB">B</label>
            <input type="radio" name="target" id="targetC" value="C"/><label for="targetC">C</label>
            <input type="radio" name="target" id="targetD" value="D"/><label for="targetD">D</label>
          </div>

          <div class="sub-form4">
            <label for="kode">kode </label>
            <input type="password" name="kode" id="kode" placeholder="Masukan kode(2222)" />
          </div>

          <button type="submit" class="sub-form5">Submit</button>
        </form>
      </div>
      <h1>Output :</h1><br>
      <div class="sub-container2">
        <?php foreach($tier as $data) : ?>
        <div class="container-tier">
            <div class="tier-<?=$data['tier'] ?>"><?php echo $data['tier'] ?></div>
            <p class="Karakter"><?php echo $data['nama'] ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </main>
    <footer>
      <p>Copyright &copy; EXOGAMER007</p>
      <button class="mode">Mode Backround</button>
    </footer>
    <script src="script.js"></script>
  </body>
</html>