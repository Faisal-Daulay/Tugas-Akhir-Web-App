

<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">DATA KURSUS SISWA</h3>
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
                    <a href="?page=kursus_siswa/kursus_siswa.php" class="btn btn-danger">Tambah Data</a>
                </div> -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Kursus</th>
                            <th>Nama Kelas</th>
                            <th>Type Kursus</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "../include/config.php";
                            $sk = $_GET['id'];
                            $dml = "SELECT * FROM kursus_siswa INNER JOIN siswa ON kursus_siswa.id_siswa = siswa.id_siswa INNER JOIN kursus ON kursus_siswa.id_kursus = kursus.id_kursus INNER JOIN kelas ON kursus_siswa.id_kelas = kelas.id_kelas WHERE kelas.id_kelas= '$sk' ";
                            $result = $db -> query($dml);

                            $no=1;
                            while ($ambil = $result -> fetch(PDO::FETCH_ASSOC) ) {
                                $id_kursus = $ambil['id_kursus'];
                                $kursus = $ambil['nama_kursus'];
                                $nama_kelas = $ambil['nama_kelas'];
                                $lengkap = $ambil['nama_lengkap'];
                                $tipe_kursus = $ambil['tipe_kursus'];
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $lengkap; ?></td>
                            <td><?php echo $kursus; ?></td>
                            <td><?php echo $nama_kelas; ?></td>
                            <td class="text-uppercase"><?php echo $tipe_kursus; ?></td>
                            <!-- <td>
                                <div class="btn-group">
                                <button class="btn btn-primary">Action</button>
                                <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="?page=kursus_siswa/kursus_siswa.php&id=<?= $id_kursus ?>">Edit</a>
                                        </li>
                                        <li>
                                            <a href="?page=kursus_siswa/proses.php&del=<?= $id_kursus ?>">Hapus</a>
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