<h2>data pembelian</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal Beli</th>
			<th>Total</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$no = 1;
			$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");
			while($loop = $ambil->fetch_assoc()){
		 ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $loop['nama_pelanggan'] ?></td>
			<td><?php echo $loop['tanggal_pembelian'] ?></td>
			<td><?php echo $loop['total_pembelian'] ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $loop['id_pembelian']; ?>" class="btn btn-primary btn-sm">Detail</a>
				<a href="" class="btn btn-danger btn-sm">Hapus</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>