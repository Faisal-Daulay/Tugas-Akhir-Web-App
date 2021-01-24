           
                
<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">DATA USER</h3>
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
                <!-- <div class="form-group">
                    <a href="?page=user/user.php" class="btn btn-danger">Tambah Data</a>
                </div> -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Status User</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../include/config.php';

                            $sql = $db -> query("SELECT * FROM users WHERE id_user = '$id_user' ");
                            $no=1;
                            while ($ambil = $sql -> fetch(PDO::FETCH_ASSOC)) {
                                $id_user = $ambil['id_user'];
                                $username = $ambil['username'];
                                $naleng = $ambil['naleng'];
                                $status_user = $ambil['status_user'];
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $naleng ?></td>
                            <td><?= $username ?></td>
                            <td><?= $status_user ?></td>
                            <td>
                                <div class="btn-group">
                                <button class="btn btn-primary">Action</button>
                                <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="?page=user/edit.php&id=<?= $id_user ?>">Edit</a>
                                        </li>
                                        <!-- <li>
                                            <a href="?page=user/hapus.php&id=<?= $id_user ?>">Hapus</a>
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