
<div class="row">
    <div class="col-md-12">
        <?php
            require_once 'include/config.php';
            $id = $_GET['id'];
            if (isset($id)) {
                $aksi = 'edit';
                $sql = "SELECT * FROM kursus_siswa WHERE id_kursus_siswa=:id_kursus_siswa ";
                $result = $db -> prepare($sql);
                $result -> execute(array(':id_kursus_siswa' => $id));

                $data = $result -> fetch(PDO::FETCH_ASSOC);

                $id_kursus_siswa = $data['id_kursus_siswa'];
                $kursus_siswa = $data['nama_kursus_siswa'];
            } else {
                $aksi = 'tambah';
            }
        ?>
        <form action="?page=kursus_siswa/proses.php" method="post" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">FORM <?php echo $aksi; ?> KURSUS SISWA</h3>
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
                            <h2 class="text-uppercase"><?php echo $aksi; ?> Kursus Siswa</h2>
                        </label>
                    </div>  

                    <input type="hidden" name="id" value="<?php echo $id_kursus_siswa; ?>" class="form-control"/>
                    <input type="hidden" name="aksi" value="<?php echo $aksi; ?>" class="form-control"/>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Siswa</label>
                        <div class="col-md-3">
                            <select class="form-control select" data-live-search="true" name="nama_siswa">
                                <option value="-">PILIH SISWA</option>
                                <?php
                                    require 'include/config.php';
                                    $dml = "SELECT * FROM siswa";
                                    $dfl = $db -> query($dml);
                                    while ($ambil = $dfl -> fetch(PDO::FETCH_ASSOC) ) {
                                        $id_siswa = $ambil['id_siswa'];
                                        $nama_lengkap = $ambil['nama_lengkap'];
                                ?>
                                <option value="<?= $id_siswa; ?>">
                                    <?= $nama_lengkap; ?>
                                </option>
                                <?php }  ?>
                            </select>
                            <span class="help-block">Click on input field to get option</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Kursus</label>
                        <div class="col-md-3">
                            <select class="form-control select" data-live-search="true" name="nama_kursus">
                                <option value="-">PILIH KURSUS</option>
                                <?php
                                    require 'include/config.php';
                                    $dml = "SELECT * FROM kursus";
                                    $dfl = $db -> query($dml);
                                    while ($ambil = $dfl -> fetch(PDO::FETCH_ASSOC) ) {
                                        $id_kursus = $ambil['id_kursus'];
                                        $nama_kursus = $ambil['nama_kursus'];
                                ?>
                                <option value="<?= $id_kursus; ?>">
                                    <?= $nama_kursus; ?>
                                </option>
                                <?php }  ?>
                            </select>
                            <span class="help-block">Click on input field to get option</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Kelas</label>
                        <div class="col-md-3">
                            <select class="form-control select" data-live-search="true" name="nama_kelas">
                                <option value="-">PILIH KELAS</option>
                                <?php
                                    require 'include/config.php';
                                    $dml = "SELECT * FROM kelas";
                                    $dfl = $db -> query($dml);
                                    while ($ambil = $dfl -> fetch(PDO::FETCH_ASSOC) ) {
                                        $id_kelas = $ambil['id_kelas'];
                                        $nama_kelas = $ambil['nama_kelas'];
                                ?>
                                <option value="<?= $id_kelas; ?>">
                                    <?= $nama_kelas; ?>
                                </option>
                                <?php }  ?>
                            </select>
                            <span class="help-block">Click on input field to get option</span>
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