<?php
function tambah_data($conn,$nama, $tier){
    return $conn->query("INSERT INTO tbtier (nama, tier) VALUES ('$nama', '$tier')");
}
function hapus_data($conn,$target){
    return $conn->query("DELETE FROM tbtier WHERE tier = '$target'");
}

function edit_data($conn,$nama, $tier, $target){
    return $conn->query("UPDATE tbtier SET nama = '$nama', tier = '$tier' WHERE tier = '$target'");
}

function tampilkanAlert($pesan) {
    echo "<script>alert('$pesan');</script>";
}
?>