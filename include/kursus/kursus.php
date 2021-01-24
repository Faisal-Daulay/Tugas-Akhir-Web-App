
<div class="row">
    <div class="col-md-12">
        <?php
            require_once 'include/config.php';
            $id = $_GET['id'];
            if (isset($id)) {
                $aksi = 'edit';
                $sql = "SELECT * FROM kursus WHERE id_kursus=:id_kursus ";
                $result = $db -> prepare($sql);
                $result -> execute(array(':id_kursus' => $id));

                $data = $result -> fetch(PDO::FETCH_ASSOC);

                $id_kursus = $data['id_kursus'];
                $kursus = $data['nama_kursus'];
            } else {
                $aksi = 'tambah';
            }
        ?>
        <form action="?page=kursus/proses.php" method="post" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">FORM <?php echo $aksi; ?> KURSUS</h3>
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
                            <h2 class="text-uppercase"><?php echo $aksi; ?> kursus</h2>
                        </label>
                    </div>  
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Kursus</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <input type="text" name="nakel" value="<?php echo $kelas; ?>" class="form-control"/>
                                <input type="hidden" name="id" value="<?php echo $id_kursus; ?>" class="form-control"/>
                                <input type="hidden" name="aksi" value="<?php echo $aksi; ?>" class="form-control"/>
                            </div>                                            
                            <span class="help-block">Isi nama kursus</span>
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