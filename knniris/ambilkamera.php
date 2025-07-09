<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Input Data Bunga Iris</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
<body class="container py-5">

  <h2 class="mb-4">Input Bunga Iris</h2>
  <form id="formBunga" method="POST" action="upload.php">
    <div class="mb-3">
      <label for="namakelas" class="form-label">Nama Kelas</label>
      <input type="text" class="form-control" name="namakelas" id="namakelas" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Ambil Gambar Bunga</label><br>
      <video id="camera" autoplay></video><br>
      <button type="button" class="btn btn-primary mt-2" onclick="takePhoto()">Ambil Foto</button>
      <canvas id="snapshot" style="display:none;"></canvas>
      <input type="hidden" name="imageData" id="imageData">
    </div>

    <button type="submit" class="btn btn-success mt-3">Simpan Data</button>
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
</body>
</html>
