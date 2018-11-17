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
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Login</div>
						<div class="panel-body">
							<?php 
								if (isset($_GET['pesan'])) {
									if ($_GET['pesan']== "login_gagal") {
										echo " <div class='alert alert-danger'>Login Gagal</div>";
									}
										
								}
							 ?>

							<form method="post">
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" required="required" class="form-control">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="pass" required="required" class="form-control">
								</div>
								<button class="btn btn-success" name="login">Login</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /KONTEN -->
	<?php 
		if (isset($_POST['login'])) {
			$email = $_POST['email'];
			$pass =	$_POST['pass'];
			$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$pass'");

			$yangcocok = $ambil->num_rows;

			if ($yangcocok == 1) {
				$akun = $ambil->fetch_assoc();
				$_SESSION['pelanggan'] = $akun;


				echo "<script>alert('Login Berhasil');</script>";	
				echo "<script>location='checkout.php';</script>";	
			}	
			else{
				//echo " <div class='alert alert-danger'>Login Gagal</div>";
				//header('location: login.php?pesan="login_gagal"');
				echo "<script>alert('Login Gagal. Periksa Akun Anda');</script>";	
				echo "<script>location='login.php';</script>";	
			}
		}

	 ?>
</body>
</html>