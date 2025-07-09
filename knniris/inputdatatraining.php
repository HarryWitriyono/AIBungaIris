<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Training - SIM AI KNN Bunga Iris V. 2025</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  
<div class="container">
  <h1>Tabel Data Training - SIM AI KNN Bunga Iris V. 2025</h1>
<form method="post">
  <div class="form-group row">
    <label for="sepal_length" class="col-4 col-form-label">Sepal_length</label> 
    <div class="col-8">
      <input id="sepal_length" name="sepal_length" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="sepal_width" class="col-4 col-form-label">Sepal_width</label> 
    <div class="col-8">
      <input id="sepal_width" name="sepal_width" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="petal_length" class="col-4 col-form-label">Petal_length</label> 
    <div class="col-8">
      <input id="petal_length" name="petal_length" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="petal_width" class="col-4 col-form-label">Petal_width</label> 
    <div class="col-8">
      <input id="petal_width" name="petal_width" type="text" class="form-control" required="required">
    </div>
  </div> 
  <div class="form-group row">
    <label for="IdClass" class="col-4 col-form-label">Class</label> 
    <div class="col-8">
      <select id="IdClass" name="IdClass" class="custom-select">
        <?php include_once('koneksi.db.php');
        $sqlb="SELECT * FROM `jenisbunga`";
        $qb=mysqli_query($koneksi,$sqlb);
        $rb=mysqli_fetch_assoc($qb);
        do {
        ?>
        <option value="<?php echo $rb['IdClass'];?>"><?php echo $rb['NamaKelas'];?></option>
        <?php }while($rb=mysqli_fetch_assoc($qb)); ?>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">💾 Simpan Rekord Baru</button>
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">🔍 Cari Rekord</button>
    </div>
  </div>
</form>
<?php include_once('koneksi.db.php');
if (isset($_POST['submit'])) {
    $sepal_length=mysqli_real_escape_string($koneksi,$_POST['sepal_length']);
    $sepal_width=mysqli_real_escape_string($koneksi,$_POST['sepal_width']);
    $petal_length=mysqli_real_escape_string($koneksi,$_POST['petal_length']);
    $petal_width=mysqli_real_escape_string($koneksi,$_POST['petal_width']);
    $IdClass=mysqli_real_escape_string($koneksi,$_POST['IdClass']);
    $sql="INSERT INTO `datatraining`(`sepal_length`, `sepal_width`, `petal_length`, `petal_width`, `IdClass`) VALUES ('".$sepal_length."','".$sepal_width."','".$petal_length."','".$petal_width."','".$IdClass."')";
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
    <label for="IdClass" class="col-4 col-form-label">Nama Kelas</label> 
    <div class="col-8">
      <input id="IdClass" name="IdClass" type="text" class="form-control" required="required">
    </div>
  </div>
      </div>
</form>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" formaction="koreksidatatraining.php">🖌️ Koreksi Rekord</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" formaction="hapusdatatraining.php">🗑️ Hapus Rekord</button>
      </div>

    </div>
  </div>
</div>
<!-- end modal--->
 <?php include('tabeldatatraining.php'); ?>
</div>

</body>
</html>