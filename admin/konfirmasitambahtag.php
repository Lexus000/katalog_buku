<?php  
include('../koneksi/koneksi.php'); 
    $tag = $_POST['tag']; 
    if(empty($tag)){
        
header("Location:tambahtag.php?notif=tambahkosong"); 
    }else{ 
        $sql = "INSERT into `tag` (`tag`) values ('$tag')"; 
        mysqli_query($koneksi,$sql); 
header("Location:tag.php?notif=tambahberhasil");  
    }   
?> 