<?php  
session_start(); 
include('../koneksi/koneksi.php');
	$id_kategori_blog = $_POST['kategori_blog'];
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	$id_user = $_SESSION['id_user'];
	$tanggal = date("Y-m-d");
		if (empty($id_kategori_blog)) {
			header("Location:tambahblog.php?notif=tambahkosong&
        	jenis=kategori_blog");
		}else if(empty($judul)){
			header("Location:tambahblog.php?notif=tambahkosong&
        	jenis=judul");
		}else if(empty($isi)){ 
			header("Location:tambahblog.php?notif=tambahkosong&
			jenis=isi");
		}else if(empty($tanggal)){ 
			header("Location:tambahblog.php?notif=tambahkosong&
			jenis=tanggal"); 
		}else{ 
 			$sql = "INSERT into `blog` (`id_kategori_blog`, `id_user`, `tanggal`, `judul`, `isi`) 
 			values ('$id_kategori_blog', '$id_user', '$tanggal', '$judul', '$isi')"; 
 			mysqli_query($koneksi,$sql); 
 			header("Location:blog.php?notif=tambahberhasil"); 
}
?> 