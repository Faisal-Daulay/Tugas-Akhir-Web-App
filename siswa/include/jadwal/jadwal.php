
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
                        <label class="col-md-3 control-label">Nama Insruktur</label>
                        <div class="col-md-3">
                            <select class="form-control select" data-live-search="true" name="nama_guru">
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
                            <span class="help-block">Click on input field to get option</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Studi</label>
                        <div class="col-md-3">
                            <select class="form-control select" data-live-search="true" name="nama_kelas">
                                <?php
                                    require 'include/config.php';
                                    $dml1 = "SELECT * FROM kelass";
                                    $dfl1 = $db -> query($dml1);
                                    while ($ambil1 = $dfl1 -> fetch(PDO::FETCH_ASSOC) ) {
                                        $id_kelas = $ambil1['id_kelas'];
                                        $nama_kelas = $ambil1['nama_kelas'];
                                ?>
                                <option value="<?= $id_kelas; ?>">
                                    <?= $nama_kelas; ?>
                                </option>
                                <?php }  ?>
                            </select>
                            <span class="help-block">Click on input field to get option</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Kelas</label>
                        <div class="col-md-3">
                            <select class="form-control select" data-live-search="true" name="nakel">
                                <?php
                                    require 'include/config.php';
                                    $dml3 = "SELECT * FROM kelas_siswa";
                                    $dfl3 = $db -> query($dml3);
                                    while ($ambil1 = $dfl3 -> fetch(PDO::FETCH_ASSOC) ) {
                                        $id_kelas_siswa = $ambil1['id_kelas_siswa'];
                                        $kelas_nama = $ambil1['kelas_nama'];
                                ?>
                                <option value="<?= $id_kelas_siswa; ?>">
                                    <?= $kelas_nama; ?>
                                </option>
                                <?php }  ?>
                            </select>
                            <span class="help-block">Click on input field to get option</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Ruangan</label>
                        <div class="col-md-3">
                            <select class="form-control select" data-live-search="true" name="naru">
                                <?php
                                    require 'include/config.php';
                                    $dml2 = "SELECT * FROM ruangan";
                                    $dfl2 = $db -> query($dml2);
                                    while ($ambil2 = $dfl2 -> fetch(PDO::FETCH_ASSOC) ) {
                                        $id_ruangan = $ambil2['id_ruangan'];
                                        $naruangan = $ambil2['naruangan'];
                                ?>
                                <option value="<?= $id_ruangan; ?>">
                                    <?= $naruangan; ?>
                                </option>
                                <?php }  ?>
                            </select>
                            <span class="help-block">Click on input field to get option</span>
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
                            <span class="help-block">This is sample of text field</span>
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
                            <span class="help-block">This is sample of text field</span>
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
                            <span class="help-block">This is sample of text field</span>
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