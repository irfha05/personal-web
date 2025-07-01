<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

$judul = mysqli_real_escape_string($db, $_POST['nama_artikel']);
$isi = mysqli_real_escape_string($db, $_POST['isi_artikel']);
$penulis = mysqli_real_escape_string($db, $_POST['nama_penulis']);
$tanggal = mysqli_real_escape_string($db, $_POST['tanggal_publish']);
$tag = mysqli_real_escape_string($db, $_POST['tag_artikel']);

// Upload gambar
$gambar = $_FILES['gambar_artikel']['name'];
$tmp_name = $_FILES['gambar_artikel']['tmp_name'];
$lokasi_upload = "../images/";
$nama_file_simpan = uniqid() . "_" . basename($gambar);
$upload_path = $lokasi_upload . $nama_file_simpan;

if (!file_exists($lokasi_upload)) {
    mkdir($lokasi_upload, 0777, true);
}

if (move_uploaded_file($tmp_name, $upload_path)) {
    $sql = "INSERT INTO tbl_artikel (nama_artikel, isi_artikel, nama_penulis, tanggal_publish, tag_artikel, gambar_artikel)
            VALUES ('$judul', '$isi', '$penulis', '$tanggal', '$tag', '$nama_file_simpan')";
    
    $query = mysqli_query($db, $sql);
    if ($query) {
        echo "<script>alert('Artikel berhasil ditambahkan.'); window.location='data_artikel.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan artikel.'); history.back();</script>";
    }
} else {
    echo "<script>alert('Upload gambar gagal.'); history.back();</script>";
}
?>
