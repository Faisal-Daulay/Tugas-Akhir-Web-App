
<div class="row">
    <div class="col-md-12">
        <?php
            require_once 'include/config.php';
            $id = $_GET['id'];
            if (isset($id)) {
                $aksi = 'edit';
                $sql = "SELECT * FROM jadwal WHERE id_jadwal=:id_jadwal ";
                $result = $db -> prepare($sql);
                $result -> execute(array(':id_jadwal' => $id));

                $data = $result -> fetch(PDO::FETCH_ASSOC);

                $id_jadwal = $data['id_jadwal'];
                $tgl_mulai = $data['tgl_mulai'];
                $hari = $data['hari'];
                $jam_mulai = $data['jam_mulai'];
                $tgl_selesai = $data['tgl_selesai'];
            } else {
                $aksi = 'tambah';
            }
        ?>
        <form action="?page=jadwal/proses.php" method="post" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">FORM <?php echo $aksi; ?> JADWAL</h3>
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
                            <h2 class="text-uppercase"><?php echo $aksi; ?> Jadwal</h2>
                        </label>
                    </div>  
                    
                    <input type="hidden" name="aksi" value="<?php echo $aksi; ?>" class="form-control"/>
                    <input type="hidden" name="id" value="<?php echo $id_jadwal; ?>" class="form-control"/>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Pengajar</label>
                        <div class="col-md-3">
                            <select class="form-control select" data-live-search="true" name="nama_guru">
                                <option value="-">PILIH PENGAJAR</option>
                                <?php
                                    require 'include/config.php';
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
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Kursus</label>
                        <div class="col-md-3">
                            <select class="form-control select" data-live-search="true" name="nasus">
                                <option value="-">PILIH KURSUS</option>
                                <?php
                                    require 'include/config.php';
                                    $dml3 = "SELECT * FROM kursus";
                                    $dfl3 = $db -> query($dml3);
                                    while ($ambil1 = $dfl3 -> fetch(PDO::FETCH_ASSOC) ) {
                                        $id_kursus = $ambil1['id_kursus'];
                                        $nama_kursus = $ambil1['nama_kursus'];
                                ?>
                                <option value="<?= $id_kursus; ?>">
                                    <?= $nama_kursus; ?>
                                </option>
                                <?php }  ?>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Kelas</label>
                        <div class="col-md-3">
                            <select class="form-control select" data-live-search="true" name="nakel">
                                <option value="-">PILIH KELAS</option>
                                <?php
                                    require 'include/config.php';
                                    $dml3 = "SELECT * FROM kelas";
                                    $dfl3 = $db -> query($dml3);
                                    while ($ambil1 = $dfl3 -> fetch(PDO::FETCH_ASSOC) ) {
                                        $id_kelas = $ambil1['id_kelas'];
                                        $nama_kelas = $ambil1['nama_kelas'];
                                ?>
                                <option value="<?= $id_kelas; ?>">
                                    <?= $nama_kelas; ?>
                                </option>
                                <?php }  ?>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Tanggal Mulai</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <input type="date" name="tgl_mulai" value="<?= $tgl_mulai;?>" class="form-control"/>
                            </div>                                            
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Hari</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <textarea name="hari" class="form-control"><?= $hari;?></textarea>
                            </div>                                            
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Jam Mulai</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <input type="time" name="jam_mulai" value="<?= $jam_mulai;?>" class="form-control"/>
                            </div>                                            
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Tanggal Selesai</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="fa fa-pencil"></span></span>
                                <input type="date" name="tgl_selesai" value="<?= $tgl_selesai;?>" class="form-control"/>
                            </div>                                            
                            <span class="help-block"></span>
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