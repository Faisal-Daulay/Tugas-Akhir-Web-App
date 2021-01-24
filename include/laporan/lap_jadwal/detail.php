<?php 
    $start = $_POST['start'];
    $end = $_POST['end'];
?>
<div class="row">
    <div class="col-md-12">
        <h2 align="center">DATA LAPORAN JADWAL KELAS</h2>
        <h4 align="center">Tanggal : <?=$start; ?> (sampai) Tanggal : <?=$end; ?> </h4>
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-body">
                <table border="1" width="100%" class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Instruktur</th>
                            <th>Ruangan</th>
                            <th>Nama Kursus</th>
                            <th>Nama Kelas</th>
                            <th>Tanggal Mulai</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Tanggal Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../../config.php';

                            $sql = $db -> query("SELECT * FROM jadwal INNER JOIN pengajar ON jadwal.id_guru = pengajar.id_guru INNER JOIN ruangan ON jadwal.id_ruangan = ruangan.id_ruangan INNER JOIN kelas ON jadwal.id_kelas = kelas.id_kelas INNER JOIN kursus ON jadwal.id_kursus = kursus.id_kursus WHERE jadwal.tgl_mulai >= '$start' AND jadwal.tgl_mulai <= '$end' ");
                            $no=1;
                            while ($ambil = $sql -> fetch(PDO::FETCH_ASSOC)) {
                                $id_jadwal = $ambil['id_jadwal'];
                                $id_kelas = $ambil['id_kelas'];
                                $nama = $ambil['nama'];
                                $nama_kursus = $ambil['nama_kursus'];
                                $hari = $ambil['hari'];
                                $jam = $ambil['jam_mulai'];
                                $nama_kelas = $ambil['nama_kelas'];
                                $naruangan = $ambil['naruangan'];
                                $tgl_mulai = $ambil['tgl_mulai'];
                                $tgl_selesai = $ambil['tgl_selesai'];

                                if ($tgl_selesai == "0000-00-00") {
                                    $warna = "lightgreen";
                                } else {
                                    $warna = "orange";
                                }
                        ?>
                        <tr bgcolor="<?=$warna; ?>">
                            <td><?=$no++;  ?></td>
                            <td><?= $nama; ?></td>
                            <td><?= $naruangan; ?></td>
                            <td><?= $nama_kursus; ?></td>
                            <td><?= $nama_kelas; ?></td>
                            <td><?= $tgl_mulai; ?></td>
                            <td><p class="text-capitalize"><?= $hari; ?></p></td>
                            <td><p class="text-capitalize"><?= $jam; ?></p></td>
                            <td><?= $tgl_selesai; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <p>Keterangan : </p>
                <ul>
                    <li>Orange = Kelas Sudah Selesai</li>
                    <li>Lighgreen = Kelas Masih Berjalan</li>
                </ul>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->

    </div>
</div>   