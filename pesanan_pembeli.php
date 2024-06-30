<?php  
include('koneksi.php');
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit;
}

if (empty($_SESSION["pesanan"]) OR !isset($_SESSION["pesanan"])) {
    echo "<script>alert('Pesanan kosong, Silahkan Pesan dahulu');</script>";
    echo "<script>location= 'menu_pembeli.php'</script>";
    exit;
}
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
    <title>Dapur Mahasiswa</title>
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

<!-- Menu -->
<div class="container">
    <div class="judul-pesanan mt-5">
        <h3 class="text-center font-weight-bold">PESANAN ANDA</h3>
    </div>
    <form method="POST" action="">
        <table class="table table-bordered" id="example">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pesanan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Subharga</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $totalbelanja = 0; ?>
                <?php foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) : ?>
                <?php 
                  include('koneksi.php');
                  $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
                  $pecah = $ambil -> fetch_assoc();
                  $subharga = $pecah["harga"] * $jumlah;
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah["nama_menu"]; ?></td>
                    <td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm btn-minus" data-id="<?php echo $id_menu; ?>">-</button>
                        <?php echo $jumlah; ?>
                        <button type="button" class="btn btn-primary btn-sm btn-plus" data-id="<?php echo $id_menu; ?>">+</button>
                    </td>
                    <td>Rp. <?php echo number_format($subharga); ?></td>
                    <td>
                        <a href="hapus_pesanan.php?id_menu=<?php echo $id_menu ?>" class="badge badge-danger">Hapus</a>
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php $totalbelanja += $subharga; ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Belanja</th>
                    <th colspan="2">Rp. <?php echo number_format($totalbelanja) ?></th>
                </tr>
            </tfoot>
        </table><br>
        <a href="menu_pembeli.php" class="btn btn-primary btn-sm">Lihat Menu</a>
        <div class="form-group">
            <label for="metode_pembayaran">Pilih Metode Pembayaran:</label>
            <select class="form-control" id="metode_pembayaran" name="metode_pembayaran">
                <option value="tunai">Tunai</option>
                <option value="transfer">Transfer</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success btn-sm" name="konfirm">Konfirmasi Pesanan</button>
    </form>        

    <?php
if (isset($_POST['konfirm'])) {
    $tanggal_pemesanan = date("Y-m-d");
    $metode_pembayaran = $_POST['metode_pembayaran'];

    // Menyimpan data ke tabel pemesanan
    $insert = mysqli_query($koneksi, "INSERT INTO pemesanan (tanggal_pemesanan, total_belanja, metode_pembayaran) 
    VALUES ('$tanggal_pemesanan', '$totalbelanja', '$metode_pembayaran')");

    // Mendapatkan ID baru
    $id_terbaru = $koneksi->insert_id;

    // Menyimpan data ke tabel pemesanan produk
    foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) {
        $insert = mysqli_query($koneksi, "INSERT INTO pemesanan_produk (id_pemesanan, id_menu, jumlah) 
          VALUES ('$id_terbaru', '$id_menu', '$jumlah')");
    }          

    // Mengosongkan pesanan dari session
    unset($_SESSION["pesanan"]);

    // Redirect ke halaman nota atau sukses
    echo "<script>alert('Pemesanan Sukses!');</script>";
    echo "<script>location= 'nota.php?id_pemesanan=$id_terbaru'</script>";
}
?>


<!-- Akhir Menu -->

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
<!-- jQuery pertama, kemudian Popper.js, dan terakhir Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();

    $('.btn-plus').click(function() {
        var id_menu = $(this).data('id');
        $.ajax({
            url: 'update_jumlah.php',
            type: 'POST',
            data: {
                id_menu: id_menu,
                action: 'plus'
            },
            success: function(response) {
                console.log(response); // Debugging output
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $('.btn-minus').click(function() {
        var id_menu = $(this).data('id');
        $.ajax({
            url: 'update_jumlah.php',
            type: 'POST',
            data: {
                id_menu: id_menu,
                action: 'minus'
            },
            success: function(response) {
                console.log(response); // Debugging output
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
</script>
</body>
</html>
