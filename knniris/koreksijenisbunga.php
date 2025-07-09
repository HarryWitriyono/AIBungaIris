<!DOCTYPE html>
<html lang="en">
<head>
  <title>Koreksi Jenis Bunga Iris - SIM AI KNN Bunga Iris V. 2025</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <h1>Koreksi Jenis Bunga Iris</h1>
  <?php include_once('koneksi.db.php');
    $IdClass=mysqli_real_escape_string($koneksi,$_POST['IdClass']);
    $sqlk="SELECT * FROM jenisbunga WHERE IdClass='".$IdClass."'";
    $qk=mysqli_query($koneksi,$sqlk);
    $rk=mysqli_fetch_assoc($qk);
    if (empty($rk)) {
        echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href=\'inputjenisbunga.php\'"></button>
  <strong>Failed !</strong> Rekord tidak ditemukan !.
</div>';
        exit();
    }
  ?>
<form method="post">
  <div class="form-group row">
    <label for="NamaKelas" class="col-4 col-form-label">Nama Kelas</label> 
    <div class="col-8">
      <input id="NamaKelas" name="NamaKelas" type="text" class="form-control" required="required" value="<?php echo $rk['NamaKelas'];?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="fotobunga" class="col-4 col-form-label">Foto Bunga</label> 
    <div class="col-8">
      <img src="data:image/jpeg;base64,<?php echo base64_encode($rk['fotobunga']); ?>" width="150px" height="150px">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">💾 Simpan Rekord Koreksi</button>
      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">🔍 Cari Rekord</button>
    </div>
  </div>
</form>
<?php include_once('koneksi.db.php');
if (isset($_POST['submit'])) {
    $NamaKelas=mysqli_real_escape_string($koneksi,$_POST['NamaKelas']);
    $fotobunga=mysqli_real_escape_string($koneksi,$_POST['fotobunga']);
    $sql="INSERT INTO `jenisbunga`(`NamaKelas`, `fotobunga`) VALUES ('".$NamaKelas."','".$fotobunga."')";
    $q=mysqli_query($koneksi,$sql);
    if ($q) {
        echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Success!</strong> Rekord sudah tersimpan !.
</div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Success!</strong> Rekord gagal tersimpan !.
</div>';
    }
}
?>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Koreksi dan Hapus Rekord</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post">
            <div class="form-group row">
                <label for="IdClass" class="col-4 col-form-label">Id Class</label> 
                <div class="col-8">
                    <input id="IdClass" name="IdClass" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="ksubmit" type="submit" class="btn btn-primary" formaction="koreksijenisbunga.php"> 🛠️ Koreksi</button>
                    <button name="hsubmit" type="submit" class="btn btn-danger" formaction="hapusjenisbunga.php" onclick="return confirm('Apakah yakin akan menghapusnya ?')"> 🗑️ Hapus</button>
                </div>
            </div>
        </form>
    </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- end modal--->
</div>

</body>
</html>