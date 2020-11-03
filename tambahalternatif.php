<?php

include("konfig/koneksi.php");


$query = "SELECT max(id_alternatif) as idMaks FROM alternatif";
$hasil = mysqli_query($con, $query);
$data  = mysqli_fetch_array($hasil);
$nim = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) substr($nim, 2, 3);
$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
$char = "al";
//%03s untuk mengatur 3 karakter di belakang 201353
$IDbaru = $char . sprintf("%03s", $noUrut);

?>
<div class="box-header">
	<h3 class="box-title">Tambah Alternatif</h3>
</div>

<div class="box-body pad">
	<form action="" method="POST">

		<input type="hidden" name="id_alternatif" class="form-control" value="<?php echo $IDbaru; ?>" readonly>
		<br />
		<input type="text" name="nama_alternatif" class="form-control" placeholder="Nama Calon Kepala Desa">
		<br /><?php
				$i = 1;
				$alt = mysqli_query($con, "select * from kriteria order by id_kriteria ASC");
				$krit = mysqli_num_rows($alt);
				while ($dalt = mysqli_fetch_assoc($alt)) {
					$a1 = $dalt['poin1'];
					$b1 = $dalt['poin2'];
					$c1 = $dalt['poin3'];
					$d1 = $dalt['poin4'];
					$e1 = $dalt['poin5'];
					if ($i == 1) {
						$a1 = "Tidak Sekolah";
						$b1 = "SMA";
						$c1 = "S1";
						$d1 = "S2";
						$e1 = "S3";
					} else if ($i == 2) {
						$a1 = "Pengangguran";
						$b1 = "Aktif bekerja";
						$c1 = "Pensiunan";
					} else if ($i == 3) {
						$a1 = "Cacat hukum";
						$b1 = "Tidak cacat hukum";
					} else if ($i == 4) {
						$a1 = "Tidak sehat";
						$b1 = "Sehat";
					} else if ($i == 5) {
						$a1 = "Penghasilan < 1 juta";
						$b1 = "2 juta > Penghasilan >=  1 Juta ";
						$c1 = "3 juta > Penghasilan >=  2 Juta ";
						$d1 = "4 juta > Penghasilan >=  3 Juta ";
						$e1 = "Penghasilan >=  4 Juta ";
					} else if ($i == 6) {
						$a1 = "Tidak ikut keorganisasian";
						$b1 = "Aktif partai politik";
						$c1 = "Aktif organisasi";
					} else if ($i == 7) {
						$a1 = "Pendatang";
						$b1 = "Penduduk asli";
					}
				?>
			<label for="<?php echo $dalt['nama_kriteria'] ?>"><?php echo $dalt['nama_kriteria'] ?> </label>
			<select class="form-control" name="<?php echo $dalt['id_kriteria'] ?>">
				<option value="<?php echo $dalt['poin1']; ?>"><?php echo $a1 ?></option>
				<option value="<?php echo $dalt['poin2']; ?>"><?php echo $b1 ?></option>
				<?php
					if ($dalt['poin3'] != 0) {
				?>
					<option value="<?php echo $dalt['poin3']; ?>"><?php echo $c1 ?></option>
				<?php
					} else {
				?>

				<?php
					}
				?>


				<?php
					if ($dalt['poin4'] != 0) {
				?>
					<option value="<?php echo $dalt['poin4']; ?>"><?php echo $d1 ?></option>
				<?php
					} else {
				?>

				<?php
					}
				?>

				<?php
					if ($dalt['poin5'] != 0) {
				?>
					<option value="<?php echo $dalt['poin5']; ?>"><?php echo $e1 ?></option>
				<?php
					} else {
				?>

				<?php
					}
				?>
			</select>
			<br />
		<?php $i++;
				} ?>
		<br />
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		<br />
	</form>

</div>
<?php
if (isset($_POST['simpan'])) {
	$idalter = $_POST['id_alternatif'];
	$namabar = $_POST['nama_alternatif'];
	$v1	= $_POST['kr001'];
	$v2	= $_POST['kr002'];
	$v3	= $_POST['kr003'];
	$v4	= $_POST['kr004'];
	$v5	= $_POST['kr005'];
	$v6	= $_POST['kr006'];
	$v7	= $_POST['kr007'];
	$y = 0;
	$arr_v = array($v1, $v2, $v3, $v4, $v5, $v6, $v7);
	$hsl = mysqli_query($con, "select * from kriteria order by id_kriteria asc");
	$jmlhhsl = mysqli_num_rows($hsl);
	while ($hslq = mysqli_fetch_assoc($hsl)) {
		mysqli_query($con, "insert into nilai_matrik (id_alternatif,id_kriteria,nilai) values('$idalter','$hslq[id_kriteria]','$arr_v[$y]')");
		$y++;
	}
	mysqli_query($con, "insert into alternatif value('$idalter','$namabar',$v1,$v2,$v3,$v4,$v5,$v6,$v7)");
	// mysqli_query($con,"insert into altenatif values ()
	// $s = mysqli_query($con, "insert into alternatif (id_alternatif,nm_alternatif,pendidikan,pekerjaan,status_hukum,kesehatan,penghasilan,orgaisasi,domisili) 
	// values ('$_POST[id_alternatif]','$_POST[nama_alternatif]','$_POST[kr001]','$_POST[kr002]','$_POST[kr003]','$_POST[kr004]','$_POST[kr005]','$_POST[kr006]','$_POST[kr007]')");
	// if ($s) {
	echo "<script>alert('Disimpan'); window.open('index.php?a=alternatif&k=alternatif','_self');</script>";
	// }
}

?>