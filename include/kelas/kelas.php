
<div class="row">
    <div class="col-md-12">
        <?php
            require_once 'include/config.php';
            $id = $_GET['id'];
            if (isset($id)) {
                $aksi = 'edit';
                $sql = "SELECT * FROM kelas WHERE id_kelas=:id_kelas ";
                $result = $db -> prepare($sql);
                $result -> execute(array(':id_kelas' => $id));

                $data = $result -> fetch(PDO::FETCH_ASSOC);

                $id_kelas = $data['id_kelas'];
                $nama_kelas = $data['nama_kelas'];
            } else {
                $aksi = 'tambah';
            }
        ?>
        <form action="?page=kelas/proses.php" method="post" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">FORM <?php echo $aksi; ?> KELAS</h3>
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
                            <h2 class="text-uppercase"><?php echo $aksi; ?> Kelas</h2>
                        </label>
                    </div>  
                    
                    <input type="hidden" name="aksi" value="<?php echo $aksi; ?>" class="form-control"/>
                    <input type="hidden" name="id" value="<?php echo $id_kelas; ?>" class="form-control"/>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Kelas</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <input type="text" name="nakel" value="<?= $kelas_nama;?>" class="form-control"/>
                            </div>                                            
                            <span class="help-block">This is sample of text field</span>
                        </div>
                    </div>

                </div>  
                <div class="panel-footer">
                    <button type="reset" class="btn btn-primary pull-left" onclick=self.history.back()>Kembali</button>
                    <button type="submit" class="btn btn-primary pull-right">Simpan Data</button>
                </div>                            
            </div>
        </form>            
    </div>
</div>    