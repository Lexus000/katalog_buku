<?php  
include('../koneksi/koneksi.php'); 
    $penerbit = $_POST['penerbit']; 
    $alamat = $_POST['alamat']; 
        if(empty($penerbit) && empty($alamat)){

header("Location:tambahpenerbit.php?notif=tambahkosong"); 
        }else{ 
            $sql = "INSERT into `penerbit` (`penerbit`,`alamat`) values ('$penerbit', '$alamat')"; 
            mysqli_query($koneksi,$sql); 
            header("Location:penerbit.php?notif=tambahberhasil");  
        } 
?> 