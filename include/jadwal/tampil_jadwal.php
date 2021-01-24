

<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">DATA JADWAL</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                            
                        <ul class="dropdown-menu">
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span> Refresh</a></li>
                        </ul>                                        
                    </li>
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>                         
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <a href="?page=jadwal/jadwal.php" class="btn btn-danger">Tambah Data</a>
                    <a href="include/laporan/lap_jadwal.php" class="btn btn-primary">CETAK PDF</a>
                </div>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Nama Kursus</th>
                            <th>Nama Kelas</th>
                            <th>Tanggal Mulai</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "include/config.php";
                            $dml = "SELECT * FROM jadwal INNER JOIN pengajar ON jadwal.id_guru = pengajar.id_guru INNER JOIN kelas ON jadwal.id_kelas = kelas.id_kelas INNER JOIN kursus ON jadwal.id_kursus = kursus.id_kursus ";
                            $result = $db -> query($dml);

                            $no=1;
                            while ($ambil = $result -> fetch(PDO::FETCH_ASSOC) ) {
                                $id_jadwal = $ambil['id_jadwal'];
                                $id_kelas = $ambil['id_kelas'];
                                $nama = $ambil['nama'];
                                $nama_kursus = $ambil['nama_kursus'];
                                $hari = $ambil['hari'];
                                $jam = $ambil['jam_mulai'];
                                $nama_kelas = $ambil['nama_kelas'];
                                $tgl_mulai = $ambil['tgl_mulai'];
                                $tgl_selesai = $ambil['tgl_selesai'];

                                if ($tgl_selesai == "0000-00-00") {
                                    $warna = "lightgreen";
                                    $status_kelas = "Belum Selasai";
                                    $attr = "enebled";
                                } else {
                                    $warna = "orange";
                                    $status_kelas = "Sudah Selasai";
                                    $attr = "disabled";
                                }
                        ?>
                        <tr bgcolor="<?=$warna; ?>">
                            <td><?= $no++; ?></td>
                            <td><?= $nama; ?></td>
                            <td><?= $nama_kursus; ?></td>
                            <td>
                                <a href="?page=jadwal/detail.php&id=<?= $id_kelas ?>"><?= $nama_kelas; ?></a>
                            </td>
                            <td><?= $tgl_mulai; ?></td>
                            <td><p class="text-capitalize"><?= $hari; ?></p></td>
                            <td><p class="text-capitalize"><?= $jam; ?></p></td>
                            <td><?= $tgl_selesai; ?></td>
                            <td><?= $status_kelas; ?></td>
                            <td>
                                <div class="btn-group">
                                <button class="btn btn-primary">Action</button>
                                <button data-toggle="dropdown" class="btn dropdown-toggle" <?= $attr?>><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="?page=jadwal/jadwal.php&id=<?= $id_jadwal ?>">Edit</a>
                                        </li>
                                        <li>
                                            <a href="?page=jadwal/proses.php&del=<?= $id_jadwal ?>">Hapus</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->

    </div>
</div>   