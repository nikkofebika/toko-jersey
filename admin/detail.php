<h2>Detail Pembelian</h2>

<?php 
	$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
	$detail = $ambil->fetch_assoc();
?>
<pre><?php echo print_r($detail) ?></pre>
<strong><?php echo $detail['nama_pelanggan'] ?></strong>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$no = 1;
			$ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]' ");
			while($loop = $ambil->fetch_assoc()){
		 ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $loop['nama_produk'] ?></td>
			<td><?php echo $loop['harga_produk'] ?></td>
			<td><?php echo $loop['jumlah'] ?></td>
			<td><?php echo $loop['jumlah']*$loop['harga_produk']; ?></td>
			<td>
				
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>