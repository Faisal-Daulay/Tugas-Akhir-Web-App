<?php
    require_once '../include/config.php';

    if ($_POST) {
        $aksi = htmlentities($_POST['aksi']);
        $id = htmlentities($_POST['id']);
        $naleng = htmlentities($_POST['naleng']);
        $tempat = htmlentities($_POST['tempat']);
        $tgl_lahir = htmlentities($_POST['tgl_lahir']);
        $agama = htmlentities($_POST['agama']);
        $jk = htmlentities($_POST['jk']);
        $goldar = htmlentities($_POST['goldar']);
        $warga = htmlentities($_POST['warga']);
        $ibu = htmlentities($_POST['ibu']);
        $ayah = htmlentities($_POST['ayah']);
        $alamat = htmlentities($_POST['alamat']);
        $notel = htmlentities($_POST['notel']);
        $nopri = htmlentities($_POST['nopri']);
        $email = htmlentities($_POST['email']);
        $pendidikan = htmlentities($_POST['pendidikan']);
        $fakultas = htmlentities($_POST['fakultas']);
        $masa_belajar = htmlentities($_POST['masa_belajar']);
        $perusahaan = htmlentities($_POST['perusahaan']);
        $jabatan = htmlentities($_POST['jabatan']);
        $bekerja = htmlentities($_POST['bekerja']);

        $lokasi_file = $_FILES['upload']['tmp_name'];
        $tipe_file   = $_FILES['upload']['type'];
        $nama_file   = $_FILES['upload']['name'];
        $size        = $_FILES['upload']['size'];
        $direktori   = "../img_siswa/$nama_file";
        
        // $id_siswa = $_SESSION['id_siswa'];
        if ($aksi=="edit") {
            $upload = move_uploaded_file($lokasi_file, $direktori);
            $sql1 = "UPDATE siswa SET nama_lengkap = :nama_lengkap, 
                                    tempat_lahir = :tempat_lahir,
                                    tgl_lahir = :tgl_lahir,
                                    agama = :agama, 
                                    jenis_kelamin = :jenis_kelamin,
                                    goldar = :goldar,
                                    warganegara = :warganegara, 
                                    nama_ibu = :nama_ibu, 
                                    nama_ayah = :nama_ayah,
                                    alamat = :alamat,
                                    notel = :notel, 
                                    nopri = :nopri, 
                                    email = :email,
                                    pendidikan = :pendidikan, 
                                    fakultas = :fakultas, 
                                    masa_belajar = :masa_belajar,
                                    cita = :cita, 
                                    hobi = :hobi, 
                                    komitmen =:komitmen,
                                    images = :images WHERE id_siswa = :id_siswa ";

            $kuery1 = $db -> prepare($sql1);
                $kuery1 -> execute(array(
                    ':nama_lengkap' => $naleng,
                    ':tempat_lahir' => $tempat,
                    ':tgl_lahir' => $tgl_lahir,
                    ':agama' => $agama,
                    ':jenis_kelamin' => $jk,
                    ':goldar' => $goldar,
                    ':warganegara' => $warga,
                    ':nama_ibu' => $ibu,
                    ':nama_ayah' => $ayah,
                    ':alamat' => $alamat,
                    ':notel' => $notel,
                    ':nopri' => $nopri,
                    ':email' => $email,
                    ':pendidikan' => $pendidikan,
                    ':fakultas' => $fakultas,
                    ':masa_belajar' => $masa_belajar,
                    ':cita' => $perusahaan,
                    ':hobi' => $jabatan,
                    ':komitmen' => $bekerja,
                    ':images' => $nama_file,
                    ':id_siswa' => $id_siswa
                ));

            echo"
                <script>
                    alert('Update Success');
                    window.location.href='?page=siswa/siswa.php&id=$id'
                </script>
            ";
        }
    }


?>