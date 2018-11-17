<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" required="required">
	</div>
	<div class="form-group">
		<label>Harga (Rp.)</label>
		<input type="number" name="harga" class="form-control" required="required">
	</div>
	<div class="form-group">
		<label>Berat (gr)</label>
		<input type="number" name="berat" class="form-control" required="required">
	</div>
	<div class="form-group">
		<label>Foto Produk</label>
		<input type="file" name="foto" class="form-control" required="required">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" placeholder="Deskripsi produk" rows="5"></textarea>
	</div>
	<button class="btn btn-primary" name="simpan">Simpan</button>
</form>

<?php 
	if (isset($_POST['simpan'])) 
	{
		$nama 	= $_POST['nama'];
		$harga 	= $_POST['harga'];
		$berat 	= $_POST['berat'];
		$deskripsi = $_POST['deskripsi'];

		$foto 	= $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi, "../foto_produk/".$foto);

		$koneksi->query("INSERT INTO produk (nama_produk, harga_produk, berat_produk, foto_produk, deskripsi_produk) VALUES ('$nama','$harga','$berat','$foto','$deskripsi')");

		echo "<script>alert('Data Berhasil Disimpan');</script>";
		echo "<script>location='index.php?halaman=produk';</script>";
	}
 ?>





