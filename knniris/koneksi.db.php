<?php error_reporting(1);
$host="localhost";
$user="root";
$pass="";
$db="bungairis";
$koneksi = new mysqli($host, $user, $pass, $db);
if ($koneksi->connect_error) {
    die("Gagal koneksi database ! " . $koneksi->connect_error);
}
?>