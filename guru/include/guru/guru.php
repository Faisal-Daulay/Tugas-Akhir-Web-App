
<div class="row">
    <div class="col-md-12">
        <?php
            require_once '../include/config.php';
            $id = $_GET['id'];
            if (isset($id)) {
                $aksi = 'edit';
                $sql = "SELECT * FROM pengajar WHERE id_guru=:id_guru ";
                $result = $db -> prepare($sql);
                $result -> execute(array(':id_guru' => $id));

                $data = $result -> fetch(PDO::FETCH_ASSOC);

                $id_guru = $data['id_guru'];
                $nama = $data['nama'];
                $alamat = $data['alamat'];
                $jk = $data['jk'];
                $notel = $data['notel'];
                $email = $data['email'];
                $agama = $data['agama'];

                if (isset($_SESSION['success'])) {
                    echo "
                        <div class='alert ". $_SESSION['alert'] ."' role='alert'>
                            <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                            <strong>". $_SESSION['success'] ."</strong>.
                        </div>
                    ";
                }
                unset($_SESSION['success']);
                
            } else {
                $aksi = 'tambah';

                if (isset($_SESSION['success'])) {
                    echo "
                        <div class='alert ". $_SESSION['alert'] ."' role='alert'>
                            <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                            <strong>". $_SESSION['success'] ."</strong>.
                        </div>
                    ";
                }
                    unset($_SESSION['success']);
                }
        ?>
        <form action="?page=guru/proses.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">Profil Guru</h3>
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
                        <label class="col-md-3 col-xs-12 control-label">
                            <h2 class="text-uppercase">Profil Guru</h2>
                        </label>
                    </div>  
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control"/>
                                <input type="hidden" name="id" value="<?php echo $id_guru; ?>" class="form-control"/>
                                <input type="hidden" name="aksi" value="<?php echo $aksi; ?>" class="form-control"/>
                            </div>    
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <input type="text" name="alamat" value="<?php echo $alamat; ?>" class="form-control"/>
                            </div>    
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Jenis Kelamin</label>
                        <div class="col-md-3"> 
                            <select class="form-control select" data-live-search="true" name="jk">
                                <option value="pria">Laki - Laki</option>
                                <option value="wanita">Perempuan</option>
                            </select>
                            <span class="help-block">Click on input field to get option</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Agama</label>
                        <div class="col-md-3"> 
                            <select class="form-control select" data-live-search="true" name="agama">
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="budha">Budha</option>
                                <option value="Protestan">Protestan</option>
                            </select>
                            <span class="help-block">Click on input field to get option</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">No Telepon / Hp</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <input type="text" name="notel" value="<?php echo $notel; ?>" class="form-control"/>
                            </div>    
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Email</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <input type="text" name="email" value="<?php echo $email; ?>" class="form-control"/>
                            </div>    
                        </div>
                    </div>

                    <div class="form-group">                                        
                        <label class="col-md-3 col-xs-12 control-label">Upload Foto</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                <input type="file" name="upload" id="file" onchange="return validasiFile()" class="form-control">       
                            </div>
                        </div>
                        <!-- Pratinjau gambar -->
                        <div id="pratinjauGambar"></div>
                    </div>  

                </div>  
                <div class="panel-footer">
                    <!-- <button type="reset" class="btn btn-primary pull-left" onclick=self.history.back()>Kembali</button> -->
                    <button type="submit" class="btn btn-primary pull-right">Simpan Data</button>
                </div>                            
            </div>
        </form>            
    </div>
</div>    