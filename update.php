<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>DATA PEGAWAI| CRUD</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light" style="background-color: #008B8B; text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php">DATA PEGAWAI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Data Pegawai</h3>
            </div>
            <hr>
        </div>
<body>

  <?php

    // Ambil data dari patameter url browser
    $id = $_GET['id'];

    // Query ambil data dari param jika ada.
    $query = "SELECT * FROM tbl_pegawai WHERE id = $id";
    // Hasil Query
    $result = mysqli_query($koneksi, $query);
    foreach($result as $data) {
  ?>

  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Update Data</h1><br>
      <form method="POST">
        <!-- Inputan tersembunyi untuk menyimpan data id yang digunakan untuk mengupdate data, lebih aman di banding menggunakan id dari params -->
        <input type="hidden" value="<?= $data['id'] ?>" name="id">
        <div class="mb-3">
          <label for="inputNIP" class="form-label">NIP</label>
          <input type="text" class="form-control" id="inputNIP" value="<?= $data['nip'] ?>" name="nip" placeholder="Masukan NIP">
        </div>
        <div class="mb-3">
          <label for="inputNama" class="form-label">Nama Pegawai</label>
          <input type="text" class="form-control" id="inputNama" value="<?= $data['nama'] ?>" name="nama" placeholder="Masukan Nama Pegawai">
        </div>
        <div class="mb-3">
          <label for="inputAlamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" id="inputAlamat" value="<?= $data['alamat'] ?>" name="alamat" placeholder="Masukan Alamat Pegawai">
        </div>
        <input name="rekam" type="submit" class="btn btn-primary" value="Ubah">
        <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
      </form>
    </div>
  </section>

  <?php } ?>

  <?php
    
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['rekam'])){
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $id = $_POST['id'];
      $nip = $_POST['nip'];
      $nama = $_POST['nama'];
      $alamat = $_POST['alamat'];

      // Membuat Query
      $query = "UPDATE tbl_pegawai SET nip = '$nip', nama = '$nama', alamat = '$alamat' WHERE id = '$id'";

      $result = mysqli_query($koneksi, $query);

      if($result){
        header("location: index.php");
      } else {
        echo "<script>alert('Data Gagal di update!')</script>";
      }

    }    

  ?>
  <!-- Footer -->
    <div class="container-fluid" style="margin-top: 30px;">
        <div class="row bg-light" style="background-color: #008B8B;text-white">
            <div class="col-md-6 my-2" id="about">
                <h4 class="fw-bold text-uppercase">The True Vocation</h4>
                <p>Politeknik Harapan Bersama Tegal, Program Studi Teknik Informatika</p>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center" style="padding: 5px;">
        <p>Created with <i class="&copy" style="color: red;"></i> by <u style="color: #fff;">Yonif Mayoma</u></p>
    </footer>
    <!-- Close Footer -->
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


</body>
</html>