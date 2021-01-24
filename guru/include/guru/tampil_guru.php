

<div class="row">
    <div class="col-md-12">
        <?php 
            if (isset($_SESSION['success'])) {
                echo "
                    <div class='alert ". $_SESSION['alert'] ."' role='alert'>
                        <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                        <strong>". $_SESSION['success'] ."</strong>.
                    </div>
                ";
            }
            unset($_SESSION['success']);
        ?>
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">DATA Guru</h3>
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
                    <a href="?page=guru/guru.php" class="btn btn-danger">Tambah Data</a>
                </div> -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon / Hp</th>
                            <th>Email</th>
                            <th>Agama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "../include/config.php";
                            $dml = "SELECT * FROM pengajar WHERE id_guru = '$id_guru' ";
                            $result = $db -> query($dml);

                            $no=1;
                            while ($ambil = $result -> fetch(PDO::FETCH_ASSOC) ) {
                                $id_guru = $ambil['id_guru'];
                                $nama = $ambil['nama'];
                                $alamat = $ambil['alamat'];
                                $jk = $ambil['jk'];
                                $notel = $ambil['notel'];
                                $email = $ambil['email'];
                                $agama = $ambil['agama'];
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $nama; ?></td>
                            <td><?php echo $alamat; ?></td>
                            <td><?php echo $jk; ?></td>
                            <td><?php echo $notel; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $agama; ?></td>
                            <td>
                                <div class="btn-group">
                                <button class="btn btn-primary">Action</button>
                                <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="?page=guru/guru.php&id=<?= $id_guru ?>">Edit</a>
                                        </li>
                                        <!-- <li>
                                            <a href="?page=guru/proses.php&del=<?= $id_guru ?>">Hapus</a>
                                        </li> -->
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