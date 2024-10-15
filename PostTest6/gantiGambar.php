<?php
if (isset($_POST["gantiGambar"])) {
  $id = $_POST["id"];
  $gambarLama = $_POST["gambarLama"];
  $target_dir = "Gambar/";

  // Hapus file gambar lama dari server
  $oldFile = $target_dir . $gambarLama;
  if (file_exists($oldFile)) {
    unlink($oldFile);
  }

  // Upload gambar baru
  $fileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
  $newFileName = date('Y-m-d H.i.s') . '.' . $fileType;
  $target_file = $target_dir . $newFileName;

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // Update nama file di database
    $sql = "UPDATE gambar SET gambar = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $newFileName, $id);

    if ($stmt->execute()) {
      echo "Gambar berhasil diganti.<br>";
    } else {
      echo "Error: " . $stmt->error;
    }

    $stmt->close();
  } else {
    echo "Maaf, terjadi kesalahan saat mengganti gambar.<br>";
  }

  // Refresh halaman
  header("Location: gambar.php");
  exit;
}
?>