<?php 
    session_start();
    if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
    }else{
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Meta tag yang diperlukan -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <title>Dapur Mahasiswa</title>
    <style>
      .navbar-pink {
        background-color: #c9184a !important; /* Warna pink */
      }
      .navbar-nav {
        color: white !important; /* Mengubah warna teks menjadi putih */
        font-family: 'Poppins', sans-serif;
      }
      .navbar-nav .nav-link {
        color: white !important; /* Warna teks navbar item menjadi putih */
        font-family: 'Poppins', sans-serif;
      }
      .btn-custom {
        background-color: #c9184a; /* Warna pink yang diinginkan */
        color: white;
        border: none;
        font-family: 'Poppins', sans-serif;
      }
      .btn-custom:hover {
        background-color: #FFB6C1; /* Warna hover yang diinginkan */
        color: black;
      }
      .judul h3, .judul h5 {
        font-family: 'Poppins', sans-serif;
      }
    </style>
</head>
<body>
  <!-- Jumbotron -->
      <div class="jumbotron jumbotron-fluid text-center">
        
      </div>
  <!-- Akhir Jumbotron -->

  <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-pink">
        <div class="container">
        <a class="navbar-brand text-white" href="admin.php"><strong>Dapur Mahasiswa</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link mr-4" href="admin.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="daftar_menu.php">DAFTAR MENU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="pesanan.php">PESANAN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="logout.php">LOGOUT</a>
            </li>
          </ul>
        </div>
       </div> 
      </nav>
  <!-- Akhir Navbar -->

  <!-- Menu -->    
  <div class="container">
    <div class="judul text-center mt-5">
      <h3 class="font-weight-bold">Dapur Mahasiswa Institut Teknologi Bacharuddin Jusuf Habibie</h3>
      <h5>Jl. Pemuda No.6, Kota Pare-Pare, Sulawesi Selatan
      <br>Buka Jam <strong>08.30 - 17:00</strong></h5>
    </div>

    <div class="row mb-5 mt-5">
      <div class="col-md-6 d-flex justify-content-center mb-3">
        <a href="menu_pembeli.php" class="btn btn-custom btn-lg">LIHAT DAFTAR MENU</a>
      </div>
      <div class="col-md-6 d-flex justify-content-center mb-3">
        <a href="pesanan_pembeli.php" class="btn btn-custom btn-lg">LIHAT PESANAN</a>
      </div>
    </div>
  </div>
  <!-- Akhir Menu -->

  <!-- Awal Footer -->
      <hr class="footer">
      <div class="container">
        <div class="row footer-body">
          <div class="col-md-6">
          <div class="copyright">
            <strong>Copyright</strong> <i class="far fa-copyright"></i> 2024 - Dapur Mahasiswa </p>
          </div>
          </div>

          <div class="col-md-6 d-flex justify-content-end">
          <div class="icon-contact">
          <label class="font-weight-bold">Follow Us </label>
          <a href="#"><img src="images/icon/fb.png" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
          <a href="#"><img src="images/icon/ig.png" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
          <a href="#"><img src="images/icon/twitter.png" class="" data-toggle="tooltip" title="Twitter"></a>
        </div>
          </div>
        </div>
      </div>
  <!-- Akhir Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>
</html>
<?php } ?>
