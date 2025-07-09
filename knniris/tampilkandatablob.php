<?php include_once('koneksi.db.php');
$sql="select * from jenisbunga";
$q=mysqli_query($koneksi,$sql);
$r=mysqli_fetch_array($q);
do {
    $image=$r['fotobunga'];
    $imageterkode=base64_encode($image);
    //header("Content-Type: image/jpeg");
    echo "<br><img src='data:image/jpeg;base64," . $imageterkode . "' alt='Image'>";
}while($r=mysqli_fetch_array($q));
?>