<?php
session_start();
if ($_SESSION['email'] == null && $_SESSION['password'] == null){
 header('location:index.php'); 
}else{
	$id = $_GET['id'];
	include_once './ketnoi.php';
	$sql = "DELETE FROM `sanpham` WHERE id_sp = $id";
	$query = mysqli_query($conn,$sql);
	header('location:quantri.php?page_layout=danhsachsp');
}

?>
