<h2>data pelanggan</h2>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>No. Telp</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$no = 1;
			$ambil = $koneksi->query("SELECT * FROM pelanggan");
			while($loop = $ambil->fetch_assoc()) {
		 ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $loop['nama_pelanggan'] ?></td>
			<td><?php echo $loop['email_pelanggan'] ?></td>
			<td><?php echo $loop['telepon_pelanggan'] ?></td>
			<td>
				<a href="" class="btn btn-info btn-sm">Edit</a>
				<a href="" class="btn btn-danger btn-sm">Hapus</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>