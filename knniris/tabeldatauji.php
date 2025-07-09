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
  <h2>Tabel Data uji - SIM AI KNN Bunga Iris V. 2025</h2>
  <p>Data set yang sudah ada :</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id Data</th>
        <th>Sepal_length</th>
        <th>Sepal_width</th>
        <th>Petal_length</th>
        <th>Petal_width</th>
        <th>Class</th>
        <th>Foto Bunga</th>
      </tr>
    </thead>
    <tbody>
        <?php $sql1="SELECT d.*,j.NamaKelas,j.fotobunga FROM `datauji` d inner join jenisbunga j on d.IdClass=j.IdClass";
        $q1=mysqli_query($koneksi,$sql1);
        $r1=mysqli_fetch_assoc($q1);
        if (!empty($r1)) {
            do {
        ?>
      <tr>
        <td><?php echo $r1['IdData'];?></td>
        <td><?php echo $r1['sepal_length'];?></td>
        <td><?php echo $r1['sepal_width'];?></td>
        <td><?php echo $r1['petal_length'];?></td>
        <td><?php echo $r1['petal_width'];?></td>
        <td><?php echo $r1['NamaKelas'];?></td>
        <td><?php echo $r1['fotobunga'];?><br><img src="<?php echo $r1['fotobunga'];?>" width="150px" height="150px"></td>
      </tr>
      <?php } while($r1=mysqli_fetch_assoc($q1));
        }
        ?>
    </tbody>
  </table>
</div>

</body>
</html>
