<h2>Edit Produk</h2>

<?php 
	$id = $_GET['id'];
	$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id'");
	$pecah = $ambil->fetch_assoc();

	$harga = $pecah['harga_produk'];
 ?>
 <pre><?php print_r($pecah) ?></pre>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" required="required" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Harga (Rp.)</label>
		<input type="number" required="required" name="harga" class="form-control" value="<?php echo $harga?>">
	</div>
	<div class="form-group">
		<label>Berat (gr)</label>
		<input type="number" required="required" name="berat" class="form-control" value="<?php echo $pecah['berat_produk']; ?>">
	</div>
	<div class="form-group">
		<img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="200">	
	</div>
	<div class="form-group">
		<label>Foto Produk</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="5"><?php echo $pecah['deskripsi_produk'] ?></textarea>
	</div>
	<center><button class="btn btn-primary" name="simpan">Simpan</button></center>
</form>

<?php 
	if (isset($_POST['simpan'])) {
		$nama 		= $_POST['nama'];
		$harga 		= $_POST['harga'];
		$berat 		= $_POST['berat'];
		$deskripsi 	= $_POST['deskripsi'];

		$namafoto 	= $_FILES['foto']['name'];
		$lokasifoto = $_FILES['foto']['tmp_name'];

		if (!empty($lokasi)) 
		{
			move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

			$koneksi->query("UPDATE produk SET nama_produk='$nama', harga_produk='$harga', berat_produk='$berat', foto_produk='$namafoto', deskripsi_produk='$deskripsi' WHERE id_produk='$id' ");
		}
		else{
			$koneksi->query("UPDATE produk SET nama_produk='$nama', harga_produk='$harga', berat_produk='$berat', deskripsi_produk='$deskripsi' WHERE id_produk='$id' ");
		}

		echo "<script>alert('Produk berhasil diupdate');</script>";
		echo "<script>location='index.php?halaman=produk'</script>";
	}
 ?>






