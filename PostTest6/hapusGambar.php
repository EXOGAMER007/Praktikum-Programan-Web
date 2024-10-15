<?php
if (isset($_POST["hapusGambar"])) {
  $id = $_POST["id"];
  $gambar = $_POST["gambar"];
  $target_file = "Gambar/" . $gambar;

  // Hapus file dari direktori
  if (file_exists($target_file)) {
    unlink($target_file);
  }

  // Hapus data dari database
  $sql = "DELETE FROM gambar WHERE ID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    echo "Gambar berhasil dihapus.<br>";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();

  // Refresh halaman
  header("Location: gambar.php");
  exit;
}
?>