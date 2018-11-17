<?php 
	$id = $_GET['id'];
	$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id'");
	$pecah = $ambil->fetch_assoc();

	$fotoproduk = $pecah['foto_produk'];
	if (file_exists("../foto_produk/$fotoproduk")) 
	{
		unlink("../foto_produk/$fotoproduk");
	}

	$koneksi->query("DELETE FROM produk WHERE id_produk='$id'");

	echo "<script>alert('Produk Berhasil Dihapus');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
 ?>
