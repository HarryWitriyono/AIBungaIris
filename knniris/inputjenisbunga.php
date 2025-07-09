<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jenis Bunga Iris - SIM AI KNN Bunga Iris V. 2025</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
      #camera, #snapshot {
        width: 100%;
        max-width: 400px;
      }
      video, canvas {
        border: 1px solid #ccc;
      }
    </style>
</head>
<body>
  
<div class="container">
  <h1>Tabel Jenis Bunga Iris</h1>
<form method="post">
  <div class="form-group row">
    <label for="NamaKelas" class="col-4 col-form-label">Nama Kelas</label> 
    <div class="col-8">
      <input id="NamaKelas" name="NamaKelas" type="text" class="form-control" required="required">
    </div>
  </div>
  <!--div class="form-group row">
    <label for="fotobunga" class="col-4 col-form-label">Foto Bunga</label> 
    <div class="col-8">
      <input id="fotobunga" name="fotobunga" type="text" class="form-control" required="required">
    </div>
  </div--> 
  <div class="mb-3">
      <label class="form-label">Ambil Gambar Bunga</label><br>
      <video id="camera" autoplay></video><br>
      <button type="button" class="btn btn-primary mt-2" onclick="takePhoto()">Ambil Foto</button>
      <canvas id="snapshot" style="display:none;"></canvas>
      <input type="hidden" name="imageData" id="imageData">
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">💾 Simpan Rekord Baru</button>
      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">🔍 Cari Rekord</button>
    </div>
  </div>
</form>
<script>
    const video = document.getElementById('camera');
    const canvas = document.getElementById('snapshot');
    const imageDataInput = document.getElementById('imageData');

    // Aktifkan kamera
    navigator.mediaDevices.getUserMedia({ video: true })
      .then(stream => {
        video.srcObject = stream;
      })
      .catch(err => {
        alert("Kamera tidak dapat diakses: " + err);
      });

    function takePhoto() {
      canvas.style.display = 'block';
      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;
      canvas.getContext('2d').drawImage(video, 0, 0);

      const imageData = canvas.toDataURL('image/png'); // base64 format
      imageDataInput.value = imageData;
    }
  </script>
<?php include_once('koneksi.db.php');
if (isset($_POST['submit'])) {
    $NamaKelas=strip_tags($_POST['NamaKelas']);
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
    $sql="INSERT INTO `jenisbunga`(`NamaKelas`, `fotobunga`) VALUES (?,?)";
    $stmnt=$koneksi->prepare($sql);
    $stmnt->bind_param("ss",$NamaKelas,$imageData);
    if ($stmnt->execute()) {
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
 <?php include('tabeljenisbunga.php'); ?>
</div>

</body>
</html>