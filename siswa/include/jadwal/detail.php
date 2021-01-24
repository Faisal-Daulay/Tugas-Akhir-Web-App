

<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">DATA KELAS SISWA</h3>
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
                    <a href="?page=kelas_siswa/kelas_siswa.php" class="btn btn-danger">Tambah Data</a>
                </div> -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Studi</th>
                            <th>Nama Kelas</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "../include/config.php";
                            $dml = "SELECT * FROM kursus_siswa INNER JOIN siswa ON kursus_siswa.id_siswa = siswa.id_siswa INNER JOIN kursus ON kursus_siswa.id_kursus = kursus.id_kursus INNER JOIN kelas ON kursus_siswa.id_kelas = kelas.id_kelas WHERE siswa.tipe_kursus='reguler' ";
                            $result = $db -> query($dml);

                            $no=1;
                            while ($ambil = $result -> fetch(PDO::FETCH_ASSOC) ) {
                                $id_kelas = $ambil['id_kelas'];
                                $nama_kursus = $ambil['nama_kursus'];
                                $nama = $ambil['nama_lengkap'];
                                $nama_kelas = $ambil['nama_kelas'];
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <th><?= $nama; ?></th>
                            <th><?= $nama_kursus; ?></th>
                            <th>
                                <a href="?page=jadwal/tampil_jadwal.php&id=<?=$id_kelas; ?>"><?= $nama_kelas; ?></a>
                            </th>
                            <!-- <td>
                                <div class="btn-group">
                                <button class="btn btn-primary">Action</button>
                                <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="?page=jadwal/jadwal.php&id=<?= $id_kelas_siswa ?>">Edit</a>
                                        </li>
                                        <li>
                                            <a href="?page=jadwal/proses.php&del=<?= $id_kelas_siswa ?>">Hapus</a>
                                        </li>
                                    </ul>
                                </div>
                            </td> -->
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->

    </div>
</div>   