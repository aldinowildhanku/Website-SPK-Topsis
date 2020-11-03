<?php
include("konfig/koneksi.php");

// mysqli_query($con,"delete from nilai_matrik");
// mysqli_query($con,"delete from alternatif");
session_destroy();   
include("matriks_ideal.php");
include("jarak_solusi.php");
header("location:index.php?a=hasiltopsis&k=nilai_preferensi");

?>