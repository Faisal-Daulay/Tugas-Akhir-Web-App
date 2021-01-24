

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
                <!-- <div class="form-group">
                    <a href="?page=jadwal/jadwal.php" class="btn btn-danger">Tambah Data</a>
                </div> -->
                <table class="table datatable">
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
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "../include/config.php";
                            $terima = $_REQUEST['id'];
                            $dml = "SELECT * FROM jadwal INNER JOIN pengajar ON jadwal.id_guru = pengajar.id_guru INNER JOIN ruangan ON jadwal.id_ruangan = ruangan.id_ruangan INNER JOIN kelas ON jadwal.id_kelas = kelas.id_kelas INNER JOIN kursus ON jadwal.id_kursus = kursus.id_kursus WHERE jadwal.id_jadwal = '$terima' ";
                            $result = $db -> query($dml);

                            $no=1;
                            while ($ambil = $result -> fetch(PDO::FETCH_ASSOC) ) {
                                $id_jadwal = $ambil['id_jadwal'];
                                $id_kelas_siswa = $ambil['id_kelas_siswa'];
                                $nama = $ambil['nama'];
                                $hari = $ambil['hari'];
                                $jam = $ambil['jam_mulai'];
                                $nama_kelas = $ambil['nama_kelas'];
                                $nama_kursus = $ambil['nama_kursus'];
                                $naruangan = $ambil['naruangan'];
                                $tgl_mulai = $ambil['tgl_mulai'];
                                $tgl_selesai = $ambil['tgl_selesai'];
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <th><?= $nama; ?></th>
                            <th><?= $naruangan; ?></th>
                            <th>
                                <?= $nama_kursus; ?>
                            </th>
                            <th>
                                <?= $nama_kelas; ?>
                            </th>
                            <th><?= $tgl_mulai; ?></th>
                            <th><p class="text-capitalize"><?= $hari; ?></p></th>
                            <th><p class="text-capitalize"><?= $jam; ?></p></th>
                            <th><?= $tgl_selesai; ?></th>
                            <!-- <td>
                                <div class="btn-group">
                                <button class="btn btn-primary">Action</button>
                                <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="?page=jadwal/jadwal.php&id=<?= $id_jadwal ?>">Edit</a>
                                        </li>
                                        <li>
                                            <a href="?page=jadwal/proses.php&del=<?= $id_jadwal ?>">Hapus</a>
                                        </li>
                                    </ul>
                                </div>
                            </td> -->
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <button type="reset" class="btn btn-primary pull-left" onclick=self.history.back()>Kembali</button>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->

    </div>
</div>   