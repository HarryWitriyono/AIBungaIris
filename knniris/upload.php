<?php
include 'koneksi.db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namakelas = $_POST['namakelas'];
    $imageData = $_POST['imageData'];

    // Ambil data base64 dari kamera
    if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
        $imageData = substr($imageData, strpos($imageData, ',') + 1);
        $imageData = base64_decode($imageData);
        if ($imageData === false) {
            die("Gagal decode gambar");
        }
    } else {
        die("Format gambar tidak sesuai");
    }

    $stmt = $conn->prepare("INSERT INTO jenisbunga (NamaKelas, fotobunga) VALUES (?, ?)");
    $stmt->bind_param("ss", $namakelas, $imageData);
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil disimpan'); window.location='inputjenisbunga.php';</script>";
    } else {
        echo "Gagal simpan: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
