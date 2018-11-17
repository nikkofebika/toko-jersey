<?php 
session_start();

$id = $_GET['id'];

//jika sudah ada produk itu dikeranjang. maka produk itu ditambah 1
if (isset($_SESSION['keranjang'][$id])) {
	$_SESSION['keranjang'][$id]+=1;
}
//sebaliknya (jika belum ada dikeranjang) maka produk itu dianggap beli 1
else{
	$_SESSION['keranjang'][$id]=1;
}
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

echo "<script>alert('Produk ditambahkan ke keranjang');</script>";
//header('location:keranjang.php');
echo "<script>location='keranjang.php';</script>";  
 ?>

 
 