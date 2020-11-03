<div class="box-header">
    <h3 class="box-title">Data Alternatif</h3>
</div>
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
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("konfig/koneksi.php");
            $i = 1;
            $s31 = mysqli_query($con, "select * from alternatif order by id_alternatif ASC");
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
                    <td>
                        <a href="?a=alternatif&k=ubaha&id=<?php echo $dem['id_alternatif']; ?>" class="btn btn-warning">Ubah</a>
                        <a href="hapusalternatif.php?id=<?php echo $dem['id_alternatif']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>