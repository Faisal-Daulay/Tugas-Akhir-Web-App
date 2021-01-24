
<div class="main_btm"><!-- start main_btm -->
    <div class="container">
        <div class="main row">            
            <div class="row">
                <div class="col-md-12">
                    <form action="?page=siswa/pro_daftar.php" method="post" class="form-horizontal" enctype="multipart/form-data" onsubmit="validasi()">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">FORMULIR PENDAFTARAN</h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">
                                        <h2 class="text-capitalize">Data Pribadi</h2>
                                    </label>
                                </div>  
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="naleng" placeholder="Nama Lengkap" id="valid1" required="" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Tempat Lahir</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="tempat" placeholder="Tempat Lahir" required="" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>
                                
                                <div class="form-group">                                        
                                    <label class="col-md-3 col-xs-12 control-label">Tanggal Lahir</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="date" name="tgl_lahir" required="" class="form-control">       
                                        </div>
                                    </div>
                                </div>         
                                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Agama</label>
                                    <div class="col-md-3"> 
                                        <select class="form-control select" data-live-search="true" name="agama">
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen</option>
                                            <option value="katolik">Katolik</option>
                                            <option value="budha">Budha</option>
                                        </select>
                                        <span class="help-block">Click on input field to get option</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Jenis Kelamin</label>
                                    <div class="col-md-6 col-xs-12">                 
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jk" id="optionsRadios1" value="pria" checked/>
                                                Pria
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jk" id="optionsRadios2" value="wanita"/>
                                                Wanita
                                            </label>
                                        </div>   
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Golongan Darah</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="goldar" placeholder="Golongan Darah" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Kewarnegaraan</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="warga" placeholder="Kewarnegaraan" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama Ibu</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="ibu" placeholder="Nama Ibu" required="" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama Ayah</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="ayah" placeholder="Nama Ayah" required="" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="alamat" placeholder="Alamat" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nomor Telepon</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="notel" placeholder="Nomor Telepon" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nomor Pribadi</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="nopri" placeholder="Nomor Pribadi" required="" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Email</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="teemail" name="email" placeholder="Email" required="" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">
                                        <h2>Pendidikan</h2>
                                    </label>
                                </div>  

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama Sekolah </label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="pendidikan" placeholder="Nama Sekolah" required="" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Jurusan</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="fakultas" placeholder="Jurusan" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Masa Belajar</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="masa_belajar" placeholder="Masa Belajar" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">
                                        <h2>Data Lainnya</h2>
                                    </label>
                                </div>  

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Cita-Cita</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="perusahaan" placeholder="cita-cita" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Hobi</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="jabatan" placeholder="Hobi" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Komitmen</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="bekerja" placeholder="Komitmen/janji siswa" class="form-control"/>
                                        </div>                                            
                                    </div>
                                </div>
                                <div class="form-group">                                        
                                    <label class="col-md-3 col-xs-12 control-label">Tanggal Daftar</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="date" name="tgl_daftar" class="form-control">       
                                        </div>
                                    </div>
                                </div>    
                    
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kursus</label>
                                    <div class="col-md-3"> 
                                        <select class="form-control select" data-live-search="true" name="kelas">
                                            <?php
                                                include '../include/config.php';
                                                $ui = "SELECT * FROM kursus";
                                                $mysql = $db -> prepare($ui);
                                                $mysql -> execute();
                                                while ($kec = $mysql -> fetch(PDO::FETCH_ASSOC)) {
                                                    $id_kursus = $kec['id_kursus'];
                                                    $kursus = $kec['nama_kursus'];
                                            ?>
                                            <option value="<?php echo $id_kursus; ?>"><?php echo $kursus; ?></option>
                                            <?php } ?>
                                        </select>
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
                                <button type="submit" class="btn btn-primary pull-right">Simpan Data</button>
                            </div>                        
                        </div>
                    </form>                   
                </div>
            </div>  
        </div>      
        <div class="clearfix"></div>        
    </div> 
</div>
