           
                
<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">DATA SISWA</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-cog"></span></a>                                            
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
                    <a href="?page=siswa/siswa.php" class="btn btn-danger">Tambah Data</a>
                </div>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "include/config.php";
                            $dml = "SELECT * FROM siswa";
                            $result = $db -> prepare($dml);
                            $result -> execute();

                            $no=1;
                            while ($ambil = $result -> fetch(PDO::FETCH_ASSOC) ) {
                                $id_siswa = $ambil['id_siswa'];
                                $nama_lengkap = $ambil['nama_lengkap'];
                                $agama = $ambil['agama'];
                                $jenis_kelamin = $ambil['jenis_kelamin'];
                                $alamat = $ambil['alamat'];
                                $notel = $ambil['notel'];
                                $nopri = $ambil['nopri'];
                                $email = $ambil['email'];
                                $tgl_daftar = $ambil['tgl_daftar'];
                                $tipe_kursus = $ambil['tipe_kursus'];
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <th><?php echo $nama_lengkap;  ?> </th>
                            <th> <?php echo $jenis_kelamin;?></th>
                            <th><?php echo $alamat;  ?></th>
                            <th><?php echo $notel;  ?> </th>
                            <th><?php echo $tgl_daftar;  ?> </th>
                            <td>
                                <div class="btn-group">
                                <button class="btn btn-primary">Action</button>
                                <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="?page=siswa/siswa.php&id=<?php echo $id_siswa; ?>">Edit</a>
                                        </li>
                                        <li>
                                            <a href="?page=siswa/proses.php&del=<?php echo $id_siswa; ?>">Hapus</a>
                                        </li>
                                        <li>
                                            <a href="#">Detail</a>
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