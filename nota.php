<?php  
include('koneksi.php');
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit; // tambahkan exit setelah header untuk menghentikan eksekusi script
}

// Pastikan ID pemesanan diterima dari URL
if (!isset($_GET['id_pemesanan'])) {
    header("location: menu_pembeli.php");
    exit; // tambahkan exit jika ID pemesanan tidak ada
}

// Ambil data pemesanan terakhir
$id_pemesanan = $_GET['id_pemesanan'];

// Query untuk mengambil data pemesanan berdasarkan ID
$query = "SELECT * FROM pemesanan WHERE id_pemesanan = '$id_pemesanan'";
$result = mysqli_query($koneksi, $query);
$data_pemesanan = mysqli_fetch_assoc($result);

// Query untuk mengambil data pemesanan produk berdasarkan ID pemesanan
$query_produk = "SELECT pp.jumlah, p.nama_menu, p.harga 
                FROM pemesanan_produk pp
                JOIN produk p ON pp.id_menu = p.id_menu
                WHERE pp.id_pemesanan = '$id_pemesanan'";
$result_produk = mysqli_query($koneksi, $query_produk);

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Meta tag yang diperlukan -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Nota Pemesanan</title>
</head>
<body>
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid text-center">
    
</div>
<!-- Akhir Jumbotron -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="background-color: #c9184a;">
    <div class="container">
        <a class="navbar-brand text-light" href="user.php"><strong>Dapur Mahasiswa</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav mr-4 text-light" href="user.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav mr-4 text-light" href="menu_pembeli.php">DAFTAR MENU</a>
                </li>
                <li class="nav-item">
                    <a class="nav mr-4 text-light" href="pesanan_pembeli.php">PESANAN ANDA</a>
                </li>
                <li class="nav-item">
                    <a class="nav mr-4 text-light" href="logout.php">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div> 
</nav>
<!-- Akhir Navbar -->

<!-- Detail Nota -->
<div class="container">
    <div class="judul-pesanan mt-5">
        <h3 class="text-center font-weight-bold">NOTA PEMESANAN</h3>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <h5>Detail Pemesanan</h5>
        </div>
        <div class="card-body">
            <p><strong>Tanggal Pemesanan:</strong> <?php echo date('d F Y', strtotime($data_pemesanan['tanggal_pemesanan'])); ?></p>
            <p><strong>Metode Pembayaran:</strong> <?php echo $data_pemesanan['metode_pembayaran']; ?></p>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h5>Detail Produk Pesanan</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $nomor = 1; 
                    $total_bayar = 0;
                    while ($row = mysqli_fetch_assoc($result_produk)) {
                        $subtotal = $row['harga'] * $row['jumlah'];
                        $total_bayar += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $row['nama_menu']; ?></td>
                        <td>Rp. <?php echo number_format($row['harga']); ?></td>
                        <td><?php echo $row['jumlah']; ?></td>
                        <td>Rp. <?php echo number_format($subtotal); ?></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Bayar</th>
                        <th>Rp. <?php echo number_format($total_bayar); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- Akhir Detail Nota -->

<!-- Awal Footer -->
<hr class="footer">
<div class="container">
    <div class="row footer-body">
        <div class="col-md-6">
            <div class="copyright">
                <strong>Copyright</strong> <i class="far fa-copyright"></i> 2024 - Dapur Mahasiswa</p>
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
<!-- jQuery pertama, kemudian Popper.js, dan terakhir Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js
