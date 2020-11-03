<?php

include("konfig/koneksi.php");
$s = mysqli_query($con, "select * from alternatif where id_alternatif='$_GET[id]'");
$d = mysqli_fetch_assoc($s);
?>
<div class="box-header">
	<h2>Ubah Alternatif</h2>
</div>
<h4> Data Asli </h4>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Alternatif</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Status Hukum</th>
                <th>Kesehatan</th>
                <th>Penghasilan</th>
                <th>Keorganisasian</th>
                <th>Domisili</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("konfig/koneksi.php");
            $i = 1;
            $s31 = mysqli_query($con, "select * from alternatif where id_alternatif='$_GET[id]'");
            while ($dem = mysqli_fetch_assoc($s31)) {   
                $a12 = $dem['pendidikan'];
                $b12 = $dem['pekerjaan'];
                $c12 = $dem['status_hukum'];
                $d12 = $dem['kesehatan'];
                $e12 = $dem['penghasilan'];
                $f12 = $dem['organisasi'];
                $g12 = $dem['domisili'];

            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $dem['nm_alternatif']; ?></td>
                    <td><?php if ($a12 == 1) {
                            echo "Tidak sekolah";
                        } else if ($a12 == 2) {
                            echo "SMA";
                        } else if ($a12 == 3) {
                            echo "S1";
                        } else if ($a12 == 4) {
                            echo "S2";
                        } else {
                            echo "S3";
                        }
                        ?></td>
                    <td><?php if ($b12 == 1) {
                            echo "Penganguran";
                        } else if ($b12 == 2) {
                            echo "Aktif Bekerja";
                        } else {
                            echo "Pensiunan";
                        } ?></td>

                    <td><?php if ($c12 == 1) {
                            echo "Cacat Hukum";
                        } else {
                            echo "Tidak Cacat Hukum";
                        } ?></td>

                    <td><?php if ($d12 == 1) {
                            echo "Tidak Sehat";
                        } else {
                            echo "Sehat";
                        } ?></td>

                    <td><?php if ($e12 == 1) {
                            echo "Penghasilan < 1 juta";
                        } else if ($e12 == 2) {
                            echo "2 juta > Penghasilan >=  1 Juta";
                        } else if ($e12 == 3) {
                            echo "3 juta > Penghasilan >=  2 Juta";
                        } else if ($e12 == 4) {
                            echo "4 juta > Penghasilan >=  3 Juta";
                        } else {
                            echo "Penghasilan >=  4 Juta";
                        } ?></td>

                    <td><?php if ($f12 == 1) {
                            echo "Tidak ikut keorganisasian";
                        } else if ($f12 == 2) {
                            echo "Aktif partai politik";
                        } else {
                            echo "Aktif organisasi";
                        } ?></td>

                    <td><?php if ($g12 == 1) {
                            echo "Pendatang";
                        } else {
                            echo "Penduduk Asli";
                        } ?></td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
<div class="box-body pad">
	<form action="" method="POST">

		<input type="hidden" name="id_alternatif" class="form-control" value="<?php echo $d['id_alternatif']; ?>" readonly>
		<br />
		<input type="text" name="nama_alternatif" class="form-control" placeholder="<?php $d['nm_alternatif']; ?>" value="<?php echo $d['nm_alternatif']; ?>" readonly>
		<br />
		<?php
		$i = 1;
		$alt = mysqli_query($con, "select * from kriteria order by id_kriteria ASC");
		while ($dalt = mysqli_fetch_assoc($alt)) {
			$a11 = $d['pendidikan'];
			$b11 = $d['pekerjaan'];
			$c11 = $d['status_hukum'];
			$d11 = $d['kesehatan'];
			$e11 = $d['penghasilan'];
			$f11 = $d['organisasi'];
			$g11 = $d['domisili'];
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
				<option value="<?php echo $dalt['poin1']; ?>"><?php echo $a1; ?></option>
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
	$arr_v = array($v1, $v2, $v3, $v4, $v5, $v6, $v7);
	$y=0;
	mysqli_query($con, "update alternatif set pendidikan=$v1, pekerjaan=$v2, status_hukum=$v3, 
	kesehatan=$v4, penghasilan=$v5,organisasi=$v6,domisili=$v7 where id_alternatif = '$idalter'");
	mysqli_query($con,"delete from nilai_matrik where id_alternatif='$_GET[id]'");
	$hsl = mysqli_query($con, "select * from kriteria order by id_kriteria asc");
	$jmlhhsl = mysqli_num_rows($hsl);
	while ($hslq = mysqli_fetch_assoc($hsl)) {
		mysqli_query($con, "insert into nilai_matrik (id_alternatif,id_kriteria,nilai) values('$idalter','$hslq[id_kriteria]','$arr_v[$y]')");
		$y++;
	}
	// $s = mysqli_query($con, "update alternatif set nm_alternatif='$_POST[nama_alternatif]' where id_alternatif='$_POST[id_alternatif]'");
	
	// if ($s) {
		// echo "<script>alert('Diubah'); window.open('index.php?a=alternatif&k=alternatif','_self');</script>";
	// }
}

?>