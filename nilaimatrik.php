<h1>Nilai Matriks</h1>
<ul class="nav nav-tabs">

	<li class="active"><a href="index.php?a=kriteria&k=kriteria">Isi Nilai Matriks</a></li>



</ul>
<div class="box-header">
	<h3 class="box-title">Tambah Nilai Matriks</h3>
</div>


<form method="POST" action="">
	<div class="form-group">
		<label class="control-label col-lg-2">Id Alternatif</label>
		<div class="col-lg-4">
			<select name="id_alt" class="form-control">
				<?php
				include("konfig/koneksi.php");
				$s = mysqli_query($con, "select * from alternatif");
				while ($d = mysqli_fetch_assoc($s)) {
				?>

					<option value="<?php echo $d['id_alternatif'] ?>"><?php echo $d['id_alternatif'] . " | " . $d['nm_alternatif'] ?></option>
				<?php
				}
				?>
			</select>


		</div>

	</div>
	<br />
	<hr />

	<div class="form-group">
		<?php
		$i = 1;
		$alt = mysqli_query($con, "select * from kriteria order by id_kriteria ASC");
		//hitung jml kriteria		
		$jml_krit = mysqli_num_rows($alt);

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
			<style>
				tr>td {
					padding-bottom: 1em;
				}
			</style>
			<table align="left">
				<tr>
					<td width="200">
						<label><?php echo $dalt['nama_kriteria']; ?></label>
						<input type="hidden" name="id_krite<?php echo $i; ?>" value="<?php echo $dalt['id_kriteria']; ?>" />
					</td>
					<div class="col-md-8">
						<td width="200">
							<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin1']; ?>" /><?php echo $a1; ?>
						</td>
						<td width="200">
							<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin2']; ?>" /><?php echo $b1; ?>
						</td>
						<td width="200">
							<?php
							if ($dalt['poin3'] != 0) {
							?>
								<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin3']; ?>" /><?php echo $c1; ?>
							<?php
							} else {
							?>

							<?php
							}
							?>
						</td>
						<td width="200">
							<?php
							if ($dalt['poin4'] != 0) {
							?>
								<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin4']; ?>" /><?php echo $d1; ?>
							<?php
							} else {
							?>

							<?php
							}
							?>
						</td>
						<td width="200">
							<?php
							if ($dalt['poin5'] != 0) {
							?>
								<input type="radio" name="nilai<?php echo $i; ?>" value="<?php echo $dalt['poin5']; ?>" /><?php echo $e1; ?>
							<?php
							} else {
							?>

							<?php
							}
							?>
						</td>
				</tr>

			<?php
			$i++;
		}
			?>
			<tr>
				<td colspan=5 align="center">
					<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
				</td>
			</tr>
			</table>

	</div>

	</div>


</form>
<?php
$b = mysqli_query($con, "select * from kriteria");
$c = mysqli_fetch_assoc($b);



if (isset($_POST['simpan'])) {

	$o = 1;

	//cek id alternatif
	$id_alt = $_POST['id_alt'];
	$cek = mysqli_query($con, "select * from alternatif where id_alternatif='$id_alt'");
	$cek_l = mysqli_num_rows($cek);
	if ($cek_l > 0) {
		$del = mysqli_query($con, "delete from nilai_matrik where id_alternatif='$id_alt'");
	}

	for ($n = 1; $n <= $jml_krit; $n++) {
		$id_k = $_POST['id_krite' . $o];
		$nilai_k = $_POST['nilai' . $o];


		$m = mysqli_query($con, "insert into nilai_matrik (id_alternatif,id_kriteria,nilai) values('$_POST[id_alt]','$id_k','$nilai_k')");

		// if ($m) {
			// echo "OK <br>";
		// }
		echo $_POST['id_krite'.'1'] . " " . $id_k ."<br />";
		$o++;
	}
	echo "ashoe";
}
?>