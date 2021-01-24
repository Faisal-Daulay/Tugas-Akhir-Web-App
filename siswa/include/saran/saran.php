
<div class="row">
    <div class="col-md-12">
        <?php
            require_once '../include/config.php';
            $id = $_GET['id'];
            if (isset($id)) {
                $aksi = 'edit';
                $sql = "SELECT * FROM saran_siswa WHERE id_saran=:id_saran ";
                $result = $db -> prepare($sql);
                $result -> execute(array(':id_saran' => $id));

                $data = $result -> fetch(PDO::FETCH_ASSOC);

                $id_saran = $data['id_saran'];
                $saran = $data['pesan'];
            } else {
                $aksi = 'tambah';
            }
        ?>
        <form action="?page=saran/proses.php" method="post" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">FORM <?php echo $aksi; ?> SARAN</h3>
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
                            <h2 class="text-uppercase"><?php echo $aksi; ?> SARAN</h2>
                        </label>
                    </div> 
                    <input type="hidden" name="id" value="<?php echo $id_saran; ?>" class="form-control"/>
                    <input type="hidden" name="aksi" value="<?php echo $aksi; ?>" class="form-control"/>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Pengajar</label>
                        <div class="col-md-3">
                            <select class="form-control select" data-live-search="true" name="nama_guru">
                                <option value="-">PILIH PENGAJAR</option>
                                <?php
                                    require '../include/config.php';
                                    $dml = "SELECT * FROM pengajar";
                                    $dfl = $db -> query($dml);
                                    while ($ambil = $dfl -> fetch(PDO::FETCH_ASSOC) ) {
                                        $id_guru = $ambil['id_guru'];
                                        $nama = $ambil['nama'];
                                ?>
                                <option value="<?= $id_guru; ?>">
                                    <?= $nama; ?>
                                </option>
                                <?php }  ?>
                            </select>
                            <span class="help-block">Click on input field to get option</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Isi Saran</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <textarea name="pesan" class="form-control"><?= $pesan;?></textarea>
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