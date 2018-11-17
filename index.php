<?php 
session_start();
include 'config.php';

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

	<!-- KONTEN -->
	<section class="konten">
		<div class="container">
			<div class="row">
				<?php 
					$ambil = $koneksi->query("SELECT * FROM produk");
					while($perproduk = $ambil->fetch_assoc()){;
				 ?>
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="foto_produk/<?php echo $perproduk['foto_produk'] ?>" width="200" height="200" >
						<div class="caption">
							<h3><?php echo $perproduk['nama_produk'] ?></h3>
							<h4>Rp. <?php echo number_format($perproduk['harga_produk']) ?></h4>
							<a href="beli.php?id=<?php echo $perproduk['id_produk'] ?>" class="btn btn-primary">Beli</a>
						</div>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</section>
	<!-- /KONTEN -->
</body>
</html>