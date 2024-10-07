<?php
require "konek.php";
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
        <h1>Genshin Impact Tier List</h1>
        <p>Rankings for the best characters in Genshin Impact.</p>
      </div>
      <div class="sub-container2">
      <?php foreach($tier as $data) : ?>
        <div class="container-tier">
            <div class="tier-<?=$data['tier'] ?>"><?php echo $data['tier'] ?></div>
            <p class="Karakter"><?php echo $data['nama'] ?></p>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="sub-container">
        <div>
          <h1 class="namanya"></h1>
        </div>
        <div>
          <p>kenalan Yok🤩</p>
        </div>
        <form action="" class="kenalan">
          <input
            type="text"
            placeholder="Tulis Namamu"
            name="Nama"
            class="nama2"
          />
        </form>
      </div>
    </main>
    <footer>
      <p>Copyright &copy; EXOGAMER007</p>
      <button class="mode">Mode Backround</button>
    </footer>
    <script src="script.js"></script>
  </body>
</html>
