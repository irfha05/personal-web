<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

$id = $_POST['id_artikel'];
$judul = mysqli_real_escape_string($db, $_POST['nama_artikel']);
$isi = mysqli_real_escape_string($db, $_POST['isi_artikel']);
$penulis = mysqli_real_escape_string($db, $_POST['nama_penulis']);
$tanggal = mysqli_real_escape_string($db, $_POST['tanggal_publish']);
$tag = mysqli_real_escape_string($db, $_POST['tag_artikel']);

// Handle gambar (jika diupload)
$gambarBaru = $_FILES['gambar_artikel']['name'];
$lokasiUpload = "../images/";
$gambarPath = "";

if (!empty($gambarBaru)) {
    $tmp_name = $_FILES['gambar_artikel']['tmp_name'];
    $namaBaru = uniqid() . "_" . basename($gambarBaru);
    $gambarPath = $lokasiUpload . $namaBaru;

    if (move_uploaded_file($tmp_name, $gambarPath)) {
        $gambarSQL = ", gambar_artikel = '$namaBaru'";
    } else {
        echo "<script>alert('Gagal upload gambar baru.'); history.back();</script>";
        exit;
    }
} else {
    $gambarSQL = "";
}

// Update semua field
$sql = "UPDATE tbl_artikel SET 
            nama_artikel = '$judul', 
            isi_artikel = '$isi', 
            nama_penulis = '$penulis', 
            tanggal_publish = '$tanggal', 
            tag_artikel = '$tag'
            $gambarSQL
        WHERE id_artikel = '$id'";

$query = mysqli_query($db, $sql);

if ($query) {
    echo "<script>alert('Artikel berhasil diperbarui.'); window.location='data_artikel.php';</script>";
} else {
    echo "<script>alert('Gagal mengedit artikel.'); history.back();</script>";
}
?>
