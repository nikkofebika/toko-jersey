<?php 
session_start();
include 'config.php';

// if (!isset($_SESSION['pelanggan'])) {
// 	echo "<script>alert('Anda Harus Login Terlebih Dahulu');</script>";	
// 	echo "<script>location='login.php';</script>";	
// }

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

	<!-- <pre><?php print_r($_SESSION["pelanggan"]); ?></pre> -->

	<!-- KONTEN -->
	<section class="konten">
		<div class="container">
			<div class="row">
				
			</div>
		</div>
	</section>
	<!-- /KONTEN -->
</body>
</html>