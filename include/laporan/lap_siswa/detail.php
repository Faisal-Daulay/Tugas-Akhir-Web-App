<?php 
    $start = $_POST['start'];
    $end = $_POST['end'];
?>
<div class="row">
    <div class="col-md-12">
        <h2 align="center">DATA LAPORAN SISWA</h2>
        <h4 align="center">Tanggal : <?=$start; ?> (sampai) Tanggal : <?=$end; ?> </h4>
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-body">
                <table border="1" width="100%" class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Daftar</th>
                            <th>Jumlah Pertemuan</th>
                            <th>Tipe Kursus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../../config.php';

                            $sql = $db -> query("SELECT * FROM siswa WHERE tgl_daftar >='$start' AND tgl_daftar <='$end' ");
                            $no=1;
                            while ($ambil = $sql -> fetch(PDO::FETCH_ASSOC)) {
                                $id_siswa = $ambil['id_siswa'];
                                $nama_lengkap = $ambil['nama_lengkap'];
                                $tgl_lahir = $ambil['tgl_lahir'];
                                $alamat = $ambil['alamat'];
                                $notel = $ambil['notel'];
                                $email = $ambil['email'];
                                $tgl_daftar = $ambil['tgl_daftar'];
                                $jumlah_pertemuan = $ambil['jumlah_pertemuan'];
                                $tipe_kursus = $ambil['tipe_kursus'];
                                $jenis_kelamin = $ambil['jenis_kelamin'];
                                if ($tipe_kursus == "reguler") {
                                    $color = "orange";
                                } else {
                                    $color = "skyblue";
                                }
                        ?>
                        <tr bgcolor="<?=$color; ?>">
                            <td><?=$no++;  ?></td>
                            <td><?=$nama_lengkap;  ?></td>
                            <td><?=$tgl_lahir;  ?></td>
                            <td><?=$alamat;  ?></td>
                            <td><?=$notel;  ?></td>
                            <td><?=$email;  ?></td>
                            <td><?=$jenis_kelamin;  ?></td>
                            <td><?=$tgl_daftar;  ?></td>
                            <td><?=$jumlah_pertemuan;  ?></td>
                            <td><?=$tipe_kursus;  ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->

    </div>
</div>   