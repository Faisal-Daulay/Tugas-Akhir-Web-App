<div class="row">
    <div class="col-md-12">
        <?php
            require_once 'include/config.php';
            $id = $_REQUEST['id'];
            if (isset($id)) {
                $aksi = 'edit';
                $sql = "SELECT * FROM siswa INNER JOIN bayar ON siswa.id_siswa = bayar.id_siswa WHERE siswa.id_siswa = :id_siswa ";
                $result = $db -> prepare($sql);
                $result -> execute(array(':id_siswa' => $id));

                $data = $result -> fetch(PDO::FETCH_ASSOC);

                $id_bayar = $data['id_bayar'];
                $id_siswa = $data['id_siswa'];
                $nama_lengkap = $data['nama_lengkap'];
                $jenis_pembayaran = $data['status_bayar'];
                $tgl_daftar = $data['tgl_daftar'];
                $nominal = $data['nominal'];
                $uang_muka = $data['uang_muka'];
                $cicil = $data['cicil'];
                $biaya_belajar = $data['biaya_belajar'];

                $hasil = $uang_muka + $cicil;
            } else {
                $aksi = 'tambah';
            }

            if ($jenis_pembayaran == "lunas") {
        ?>
        <form action="?page=bayar/proses.php" method="post" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">Form Pembayaran</h3>
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
                            <h2 class="text-uppercase">Pembayaran</h2>
                        </label>
                    </div>  
                    <input type="hidden" name="aksi" value="<?php echo $aksi; ?>" class="form-control"/>
                    <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>" class="form-control"/>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="hidden" name="id"  value="<?php echo $aksi ; ?>" class="form-control"/>
                                <input type="text" name="naleng" readonly=""  value="<?php echo $nama_lengkap ; ?>" placeholder="Nama Lengkap" class="form-control"/>
                            </div>                                            
                            <span class="help-block">This is sample of text field</span>
                        </div>
                    </div>
                    
                    <div class="form-group">                                        
                        <label class="col-md-3 col-xs-12 control-label">Tanggal Bayar</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                <input type="text" readonly="" class="form-control datepicker" value=<?php echo $tgl_daftar; ?> name="tgl_bayar">       
                            </div>
                            <span class="help-block">Click on input field to get datepicker</span>
                        </div>
                    </div>         
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Jumlah Bayar</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" readonly="" name="jumlah"  value="<?php echo $nominal; ?>" placeholder="Jumlah Bayar" class="form-control"/>
                            </div>                                            
                            <span class="help-block">This is sample of text field</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Status Bayar</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="status_bayar" readonly=""  value="<?php echo $jenis_pembayaran ; ?>" class="form-control"/>
                            </div>                                            
                            <span class="help-block">This is sample of text field</span>
                        </div>
                    </div>

                </div>  
                <div class="panel-footer">
                    <button type="reset" class="btn btn-primary pull-left" onclick=self.history.back()>Kembali</button>
                    <!-- <button type="submit" class="btn btn-primary pull-right">Simpan Data</button> -->
                </div>                            
            </div>
        </form>            
        <?php } else { ?>

        <form action="?page=bayar/proses.php" method="post" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">Form Ubah Pembayaran</h3>
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
                            <h2 class="text-uppercase">Ubah Pembayaran</h2>
                        </label>
                    </div>  
                    <input type="hidden" name="aksi" value="<?php echo $aksi; ?>" class="form-control"/>
                    <input type="hidden" name="id_bayar" value="<?php echo $id_bayar; ?>" class="form-control"/>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="hidden" name="id"  value="<?php echo $aksi ; ?>" class="form-control"/>
                                <input type="text" name="naleng" readonly=""  value="<?php echo $nama_lengkap ; ?>" placeholder="Nama Lengkap" class="form-control"/>
                            </div>                                            
                            <span class="help-block">This is sample of text field</span>
                        </div>
                    </div>
                    
                    <div class="form-group">                                        
                        <label class="col-md-3 col-xs-12 control-label">Tanggal Bayar</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                <input type="text" class="form-control datepicker" value="<?php echo $tgl_daftar ?>" name="tgl_bayar">       
                            </div>
                            <span class="help-block">Click on input field to get datepicker</span>
                        </div>
                    </div>         

                    <div class="form-group">                                        
                        <label class="col-md-3 col-xs-12 control-label">Biaya Belajar</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                <input type="text" readonly class="form-control" name="biaya_belajar" value="<?php echo $biaya_belajar ?>">
                            </div>
                            <span class="help-block">Click on input field to get datepicker</span>
                        </div>
                    </div>  
                    
                    <div class="form-group">                                        
                        <label class="col-md-3 col-xs-12 control-label">Uang Muka</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                <input type="text" readonly name="uang_muka" class="form-control" value="<?php echo $uang_muka ?>">
                            </div>
                            <span class="help-block">Click on input field to get datepicker</span>
                        </div>
                    </div>  
                    
                    <div class="form-group">                                        
                        <label class="col-md-3 col-xs-12 control-label">Cicilan ke 1</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                <input type="text" readonly name="cicil1" class="form-control" value="<?php echo $cicil ?>">
                            </div>
                            <span class="help-block">Click on input field to get datepicker</span>
                        </div>
                    </div>  
                    
                    <input type="hidden" readonly class="form-control" value="<?php echo $hasil ?>" name="totalcicil">
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Bayar Cicilan</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="jumlah" value="" placeholder="Bayar Cicilan" class="form-control"/>
                            </div>                                            
                            <span class="help-block">This is sample of text field</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-3">
                             <select class="form-control select" data-live-search="true" name="status">
                                <option value="lunas">Lunas</option>
                                <option value="cicil">Cicil</option>
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
        <?php } ?>
    </div>
</div>    