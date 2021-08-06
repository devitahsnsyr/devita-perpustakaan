<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Datatables -->
    <link rel="stylesheet" href="css/style.css">

    <title>Halaman Guru</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid" style="margin-left: 55px; margin-right:55px;" >
      <a class="navbar-brand" href="guru.php" style="color:grey;">Guru</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="guru.php" style="color:white;">Beranda</a>
        </li>
        <!-- dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
            Inputan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="?menu=input_distributor">Input Distributor</a></li>
            <li><a class="dropdown-item" href="?menu=input_buku">Input Buku</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"style="color:white;">
            Laporan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="?menu=data_buku">Semua Data Buku</a></li>
            <li><a class="dropdown-item" href="?menu=filter_penulis">Filter Penulis Buku</a></li>
          </ul>
        </li>
    </ul>
    <form class="d-flex">
        <ul class="nav navbar-expand-lg justify-content-end ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
                    Guru
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="?menu=ubah_pass">Ubah Password</a></li>
                </ul>
            </li>
            <li class="nav-right">
            <a class="nav-link" aria-current="page" href="login.php" style="color:white;"onclick="return confirm('Anda Yakin Ingin Keluar?')">Logout</a>
            </li>
        </ul>
      </form>
    </div>
  </div>
</nav>
  <aside>
      <div class="box" >
          <img src="img/book.png" width="100%">
            <div style="text-align:center;">
              <h2>Perpustakaan</h2>
              <h6>SMK Wikrama Bogor</h6>
          </div>
      </div>
  </aside>
<br>
<?php 
    switch(@$_GET['menu']){
        case 'input_distributor';
        include 'input_distributor.php';
        break;

        case 'input_buku';
        include 'input_buku.php';
        break;

        case 'data_buku';
        include 'data_buku.php';
        break;

        case 'filter_penulis';
        include 'filter_penulis.php';
        break;

        case 'ubah_pass';
        include 'ubah_pass.php';
        break;
        
        break;
    }
?>


   <!-- link js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> 
    
  </body>
</html>