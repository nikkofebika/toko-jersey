<?php 
session_start();
$id = $_GET['id'];
unset($_SESSION['keranjang'][$id]);
echo "<script>location='keranjang.php';</script>"; 

 ?>