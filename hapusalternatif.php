<?php
include ("konfig/koneksi.php");

$s=mysqli_query($con,"delete from alternatif where id_alternatif='$_GET[id]' ");
mysqli_query($con,"delete from nilai_matrik where id_alternatif='$_GET[id]'");

if($s){
	echo "<script>window.open('index.php?a=alternatif&k=alternatif','_self');</script>";
}

?>