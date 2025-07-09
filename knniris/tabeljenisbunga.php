<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jenis Bunga Iris - SIM AI KNN Bunga Iris V. 2025</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Tabel Jenis Bunga Iris - SIM AI KNN Bunga Iris V. 2025</h2>
  <p>Data set yang sudah ada :</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id Data</th>
        <th>Nama Kelas</th>
        <th>Foto Bunga</th>
      </tr>
    </thead>
    <tbody>
        <?php include_once('koneksi.db.php');
        $sql1="SELECT * FROM `jenisbunga`";
        $q1=mysqli_query($koneksi,$sql1);
        $r1=mysqli_fetch_assoc($q1);
        if (!empty($r1)) {
            do {
        ?>
      <tr>
        <td><?php echo $r1['IdClass'];?></td>
        <td><?php echo $r1['NamaKelas'];?></td>
        <td><img src="data:image/jpeg;base64,<?php echo base64_encode($r1['fotobunga']); ?>" width="150px" height="150px">
      </td>
      </tr>
      <?php } while($r1=mysqli_fetch_assoc($q1));
        }
        ?>
    </tbody>
  </table>
</div>

</body>
</html>
