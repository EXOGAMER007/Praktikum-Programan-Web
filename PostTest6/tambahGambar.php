<?php
if (isset($_POST["uploadGambar"])) {
  // Tentukan direktori tempat file akan disimpan
  $target_dir = "Gambar/";

  // Ambil ekstensi file
  $fileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

  // Buat nama file baru dengan format yyyy-mm-dd hh.mm.ss.ekstensi
  $newFileName = date('Y-m-d H.i.s') . '.' . $fileType;
  $target_file = $target_dir . $newFileName;

  $uploadOk = 1;

  // Cek apakah file adalah gambar
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File bukan gambar.<br>";
    $uploadOk = 0;
  }

  // Batasi tipe file (hanya JPG, JPEG, PNG, GIF)
  if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
    echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.<br>";
    $uploadOk = 0;
  }

  // Batasi ukuran file (contohnya maksimal 5MB)
  if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Maaf, ukuran file terlalu besar.<br>";
    $uploadOk = 0;
  }

  // Jika semua pengecekan berhasil
  if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      // Simpan nama file ke dalam database
      $sql = "INSERT INTO gambar (gambar) VALUES (?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $newFileName);

      if ($stmt->execute()) {
        echo "Gambar berhasil diupload dan disimpan ke database.";
      } else {
        echo "Error: " . $stmt->error;
      }

      $stmt->close();
    } else {
      echo "Maaf, terjadi kesalahan saat mengupload file.<br>";
    }
  }

  // Refresh halaman
  header("Location: gambar.php");
  exit;
}
?>