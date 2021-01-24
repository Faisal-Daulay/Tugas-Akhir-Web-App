

<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">DATA SARAN</h3>
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
                    <a href="?page=saran/saran.php" class="btn btn-danger">Tambah Data</a>
                </div>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nama Guru</th>
                            <th>Isi Saran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "../include/config.php";
                            $dml = "SELECT * FROM saran_siswa INNER JOIN siswa ON saran_siswa.id_siswa=siswa.id_siswa INNER JOIN pengajar ON saran_siswa.id_guru=pengajar.id_guru WHERE saran_siswa.id_siswa = '$id_siswa' ";
                            $result = $db -> query($dml);

                            $no=1;
                            while ($ambil = $result -> fetch(PDO::FETCH_ASSOC) ) {
                                $id_saran = $ambil['id_saran'];
                                $kelas = $ambil['nama_lengkap'];
                                $guru = $ambil['nama'];
                                $pesan = $ambil['pesan'];
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $kelas; ?></td>
                            <td><?php echo $guru; ?></td>
                            <td><?php echo $pesan; ?></td>
                            <td>
                                <div class="btn-group">
                                <button class="btn btn-primary">Action</button>
                                <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="?page=saran/saran.php&id=<?= $id_saran ?>">Edit</a>
                                        </li>
                                        <li>
                                            <a href="?page=saran/proses.php&del=<?= $id_saran ?>">Hapus</a>
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