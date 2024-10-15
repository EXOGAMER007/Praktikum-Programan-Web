<?php
function tambah_data($conn, $nama, $tier)
{//fungsi tambah data
    return $conn->query("INSERT INTO tbtier (nama, tier) VALUES ('$nama', '$tier')");
}
function hapus_data($conn, $target)
{//fungsi hapus data
    return $conn->query("DELETE FROM tbtier WHERE tier = '$target'");
}

function edit_data($conn, $nama, $tier, $target)
{//fungsi edit data
    return $conn->query("UPDATE tbtier SET nama = '$nama', tier = '$tier' WHERE tier = '$target'");
}

function tampilkanAlert($pesan): void
{
    echo "<script>alert('$pesan');</script>";
}
?>