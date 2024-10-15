<?php
require "konek.php";

$sql = mysqli_query($conn, "SELECT * FROM gambar");

$gambar = [];

while ($row = mysqli_fetch_assoc($sql)) {
  $gambar[] = $row;
}

require "tambahGambar.php";
require "hapusGambar.php";
require "gantiGambar.php";
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
  <?php require "navbar.php"; ?>
  <main class="container-content">
    <div class="sub-container">
      <form action="" method="POST" enctype="multipart/form-data">
        <label for="fileToUpload">Pilih file</label>
        <input type="file" name="fileToUpload" id="fileToUpload" />
        <input type="submit" name="uploadGambar" value="submit" />
      </form>
    </div>
    <div class="sub-container3">
      <?php foreach ($gambar as $data): ?>
        <img src="Gambar/<?php echo $data['gambar']; ?>" alt="">
        <div>
          <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['ID']; ?>">
            <input type="hidden" name="gambar" value="<?php echo $data['gambar']; ?>">
            <button type="submit" name="hapusGambar">
              <p>Hapus</p>
            </button>
          </form>
          <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data['ID']; ?>">
            <input type="hidden" name="gambarLama" value="<?php echo $data['gambar']; ?>">
            <input type="file" name="fileToUpload">
            <button type="submit" name="gantiGambar">
              <p>Ganti</p>
            </button>
          </form>
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