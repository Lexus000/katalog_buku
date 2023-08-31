<?php  
include('../koneksi/koneksi.php'); 
	$nama = $_POST['nama']; 
	$email = $_POST['email']; 
	$username = $_POST['username']; 
	$password = MD5($_POST['password']); 
	$level = $_POST['level']; 
	$lokasi_file = $_FILES['foto']['tmp_name'];
		if(empty($lokasi_file) && empty($nama) && empty($email)
		&& empty($username) && empty($password) && empty($level)){
			
header("Location:tambahuser.php?notif=tambahkosong");
	}else{ 
		$lokasi_file = $_FILES['foto']['tmp_name']; 
    	$nama_file = $_FILES['foto']['name']; 
    	$direktori = 'foto/'.$nama_file;
			if(move_uploaded_file($lokasi_file,$direktori)){
				$sql = "INSERT INTO `user` (`nama`, `email`, `username`, `password`, `level`, `foto`)
				VALUES ('$nama', '$email', '$username', '$password', '$level', '$nama_file')"; 
				mysqli_query($koneksi,$sql); 
header("Location:user.php?notif=tambahberhasil");
			}
	} 
?> 