<?php 
session_start();
include 'config.php';

// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

if (empty($_SESSION['keranjang']) || !isset($_SESSION['keranjang'])) {
	echo "<script>alert('Keranjang Kosong. Silahkan Belanja Dulu');</script>";
	echo "<script>location='index.php';</script>";

}
 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Toko Jersey</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
</head>
<body>
	<!-- navbar -->
	<nav class="navbar navbar-default ">
		<div class="container">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="keranjang.php">Keranjang</a></li>
				<li><a href="checkout.php">Checkout</a></li>
				<?php if (isset($_SESSION['pelanggan'])): ?>
					<li><a href="logout.php">Logout</a></li>
				<?php else: ?>
					<li><a href="login.php">Login</a></li>
				<?php endif ?>
				
			</ul>
		</div>
	</nav>
	<!-- /navbar -->

	<section class="konten"> 
		<div class="container">
			<h2>Keranjang Belanja</h2>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<td>No</td>
						<td>Nama Produk</td>
						<td>Harga</td>
						<td>Jumlah</td>
						<td>Subharga</td>
						<td>Opsi</td>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 1;
						foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
						//menampilkan produk yang sedang diperulangkan berdasarkan id produk
							$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
							$pecah = $ambil->fetch_assoc();

						$subharga = $pecah['harga_produk']*$jumlah;
					 ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $pecah['nama_produk'] ?></td>
						<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
						<td><?php echo $jumlah ?></td>
						<td>Rp. <?php echo number_format($subharga); ?></td>
						<td>
							<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-primary">Lanjut Belanja</a>
			<a href="checkout.php" class="btn btn-success">Checkout</a>
		</div>
	</section>
</body>
</html>	