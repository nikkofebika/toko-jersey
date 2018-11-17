<h2>data produk</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Foto</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$no = 1;
			$ambil = $koneksi->query("SELECT * FROM produk");
			while($loop = $ambil->fetch_assoc()){
		 ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $loop['nama_produk'] ?></td>
			<td><?php echo $loop['harga_produk'] ?></td>
			<td><?php echo $loop['berat_produk'] ?></td>
			<td><img src="../foto_produk/<?php echo $loop['foto_produk'] ?>" width="100"></td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $loop['id_produk'] ?>" class="btn btn-danger btn-sm">Hapus</a>
				<a href="index.php?halaman=editproduk&id=<?php echo $loop['id_produk'] ?>" class="btn btn-info btn-sm">Edit</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Produk</a>