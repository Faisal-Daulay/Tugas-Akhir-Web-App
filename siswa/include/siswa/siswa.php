
<div class="row">
    <div class="col-md-12">
        <?php
            require_once '../include/config.php';
            $id = $_REQUEST['id'];
            if (isset($id)) {
                $aksi = "edit";
                $kml = "SELECT * FROM siswa WHERE id_siswa= '$id' ";
                $result = $db -> prepare($kml);
                $result -> execute();
                
                $ambil = $result -> fetch(PDO::FETCH_ASSOC);
                $id_siswa = $ambil['id_siswa'];
                $nama_lengkap = $ambil['nama_lengkap'];
                $tempat_lahir = $ambil['tempat_lahir'];
                $tgl_lahir = $ambil['tgl_lahir'];
                $goldar = $ambil['goldar'];
                $warganegara = $ambil['warganegara'];
                $ibu = $ambil['nama_ibu'];
                $ayah = $ambil['nama_ayah'];
                $alamat = $ambil['alamat'];
                $notel = $ambil['notel'];
                $nopri = $ambil['nopri'];
                $email = $ambil['email'];
                $pendidikan = $ambil['pendidikan'];
                $fakultas = $ambil['fakultas'];
                $masa_belajar = $ambil['masa_belajar'];
                $perusahaan = $ambil['perusahaan'];
                $jabatan = $ambil['jabatan'];
                $masa_kerja = $ambil['masa_kerja'];
                $tgl_daftar = $ambil['tgl_daftar'];
                $jumlah_pertemuan = $ambil['jumlah_pertemuan'];
                $tipe_kursus = $ambil['tipe_kursus'];
                
                $_SESSION['id_siswa']=$id_siswa;
            } else {
                $aksi = "tambah";
            }
        ?>
        <form action="?page=siswa/proses.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">PROFIL SISWA</h3>
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
                            <h2 class="text-capitalize">Profil Siswa</h2>
                        </label>
                    </div>  
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="hidden" name="id"  value="<?php echo $id_siswa ; ?>" class="form-control"/>
                                <input type="hidden" name="aksi"  value="<?php echo $aksi ; ?>" class="form-control"/>
                                <input type="text" name="naleng"  value="<?php echo $nama_lengkap ; ?>" placeholder="Nama Lengkap" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Tempat Lahir</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="tempat" value="<?php echo $tempat_lahir; ?>" placeholder="Tempat Lahir" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>
                    
                    <div class="form-group">                                        
                        <label class="col-md-3 col-xs-12 control-label">Tanggal Lahir</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $tgl_lahir; ?>">       
                            </div>
                            <span class="help-block">Click on input field to get datepicker</span>
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
                                <input type="text" name="goldar"  value="<?php echo $goldar ; ?>" placeholder="Golongan Darah" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Kewarnegaraan</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="warga" value="<?php echo $warganegara ; ?>" placeholder="Kewarnegaraan" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Ibu</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="ibu" value="<?php echo $ibu; ?>" placeholder="Nama Ibu" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Ayah</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="ayah" value="<?php echo $ayah ; ?>" placeholder="Nama Ayah" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="alamat" value="<?php echo $alamat ; ?>" placeholder="Alamat" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nomor Telepon</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="notel" value="<?php echo $notel; ?>" placeholder="Nomor Telepon" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nomor Pribadi</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="nopri" value="<?php echo $nopri; ?>" placeholder="Nomor Pribadi" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Email</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="teemail" name="email" value="<?php echo $email ; ?>" placeholder="Email" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">
                            <h2>Pendidikan</h2>
                        </label>
                    </div>  

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Sekolah / Universitas</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="pendidikan" value="<?php echo $pendidikan; ?>" placeholder="Nama Sekolah / Universitas" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Fakultas / Dapatemen / Jenjang / Jurusan</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="fakultas" value="<?php echo $fakultas; ?>" placeholder="Fakultas / Dapatemen / Jenjang / Jurusan" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Masa Belajar</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="masa_belajar" value="<?php echo $masa_belajar ; ?>" placeholder="Masa Belajar" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">
                            <h2>Data Pekerjaan</h2>
                        </label>
                    </div>  

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Perusahaan</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="perusahaan" value="<?php echo$perusahaan ; ?>" placeholder="Nama Perusahaan" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Jabatan</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="jabatan" value="<?php echo $jabatan; ?>" placeholder="Jabatan" class="form-control"/>
                            </div>                                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Masa Bekerja</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" name="bekerja" value="<?php echo $masa_kerja; ?>" placeholder="Masa Bekerja" class="form-control"/>
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