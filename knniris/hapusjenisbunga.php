<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hapus enis Bunga Iris - SIM AI KNN Bunga Iris V. 2025</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  
<div class="container">
  <h1>Hapus Jenis Bunga Iris</h1>
  <?php include_once('koneksi.db.php');
  $IdClass=filter_var($_POST['IdClass'],FILTER_VALIDATE_INT);
  $sql="SELECT * FROM jenisbunga WHERE IdClass= ?";
  $kodesql=$koneksi->prepare($sql);
  $kodesql->bind_param("i",$sql);
  $kodesql->execute();
  $hasil=$kodesql->get_result();
  $r=$hasil->fetch_assoc();echo $r;exit();
  if (!empty($r)) {
    $sqld="DELETE FROM jenisbunga WHERE IdClass= '".$IdClass."'";
    $q=$koneksi->prepare($sqld);
    if ($q->execute()) {
        echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href=\'inputjenisbunga.php\'"></button>
    <strong>Success!</strong> Rekord sudah dihapus !.
    </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href=\'inputjenisbunga.php\'"></button>
    <strong>Failed !</strong> Rekord gagal dihapus !.
    </div>';
    }
  } else {
    echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href=\'inputjenisbunga.php\'"></button>
    <strong>Failed !</strong> Rekord tidak ditemukan !.
    </div>';
  }
  ?>
</div>

</body>
</html>