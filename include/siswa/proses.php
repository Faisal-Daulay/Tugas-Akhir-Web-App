<?php
    require_once 'include/config.php';

    if ($_POST) {
        $aksi = htmlentities($_POST['aksi']);
        $id = htmlentities($_POST['id']);
        $naleng = htmlentities($_POST['naleng']);
        $tempat = htmlentities($_POST['tempat']);
        $tgl = htmlentities($_POST['tgl_lahir']);
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
        $kelas = htmlentities($_POST['kelas']);
        $pertemuan = htmlentities($_POST['pertemuan']);
        $jenis = htmlentities($_POST['jenis']);
        $tgl_daftar = htmlentities($_POST['tgl_daftar']);

        $nominal = htmlentities($_POST['nominal']);
        $biaya_belajar = htmlentities($_POST['biaya_belajar']);
        $jenis = htmlentities($_POST['jenis']);
        $tipe_kursus = htmlentities($_POST['tipe_kursus']);

        $lokasi_file = $_FILES['upload']['tmp_name'];
        $tipe_file   = $_FILES['upload']['type'];
        $nama_file   = $_FILES['upload']['name'];
        $size        = $_FILES['upload']['size'];
        $direktori   = "img_siswa/$nama_file";
        // $id_siswa = $_SESSION['id_siswa'];
        if ($aksi=="tambah") {
            if ($naleng!="") {
                move_uploaded_file($lokasi_file, $direktori);
                $sql = "INSERT INTO siswa (nama_lengkap, tempat_lahir, tgl_lahir, agama, jenis_kelamin, goldar, warganegara, nama_ibu, nama_ayah, alamat, notel, nopri, email, pendidikan, fakultas, masa_belajar, cita, hobi, komitmen, id_kelas, jumlah_pertemuan, jenis_pembayaran, tgl_daftar, tipe_kursus, images) VALUES (:nama_lengkap, :tempat_lahir, :tgl_lahir, :agama, :jenis_kelamin, :goldar, :warganegara, :nama_ibu, :nama_ayah, :alamat, :notel, :nopri, :email, :pendidikan, :fakultas, :masa_belajar, :cita, :hobi, :komitmen, :id_kelas, :jumlah_pertemuan, :jenis_pembayaran, :tgl_daftar, :tipe_kursus, :images)";

                $kuery = $db -> prepare($sql);
                $kuery -> execute(array(
                    ':nama_lengkap' => $naleng,
                    ':tempat_lahir' => $tempat,
                    ':tgl_lahir' => $tgl,
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
                    ':id_kelas' => $kelas,
                    ':jumlah_pertemuan' => $pertemuan,
                    ':jenis_pembayaran' => $jenis,
                    ':tgl_daftar' => $tgl_daftar,
                    ':tipe_kursus' => $tipe_kursus,
                    ':images' => $nama_file
                ));

                if ($nominal!="") {

                    $tgl_bayar = date('Y-m-d');

                    $sqli = "INSERT INTO bayar (id_siswa, nominal, biaya_belajar, tgl_bayar, status_bayar) VALUES (:id_siswa, :nominal, :biaya_belajar, :tgl_bayar, :status_bayar)";
                    
                    $query = $db -> prepare($sqli);
                    $lastid = $db -> lastInsertId();
                    $query -> bindParam(':id_siswa', $lastid);
                    $query -> bindParam(':nominal', $nominal);
                    $query -> bindParam(':biaya_belajar', $biaya_belajar);
                    $query -> bindParam(':tgl_bayar', $tgl_bayar);
                    $query -> bindParam(':status_bayar', $jenis);
                    $query -> execute();

                    echo"
                        <script>
                            alert('Insert Success');
                            window.location.href='?page=bayar/bayar.php'
                        </script>
                    ";
                } else {
                    echo"
                        <script>
                            alert('Insert Success');
                            window.location.href='?page=bayar/bayar.php'
                        </script>
                    ";
                }

            } else {
                echo"
                    <script>
                        alert('Insert Failed!');
                        window.location.href='?page=siswa/siswa.php'
                    </script>
                ";
            }

         } elseif ($aksi=="edit") {
            move_uploaded_file($lokasi_file, $direktori);
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
                                    id_kelas = :id_kelas,
                                    jumlah_pertemuan = :jumlah_pertemuan, 
                                    jenis_pembayaran = :jenis_pembayaran, 
                                    tgl_daftar = :tgl_daftar,
                                    tipe_kursus =:tipe_kursus,
                                    images = :images WHERE id_siswa = :id_siswa ";

            $kuery1 = $db -> prepare($sql1);
            $kuery1 -> execute(array(
                ':nama_lengkap' => $naleng,
                ':tempat_lahir' => $tempat,
                ':tgl_lahir' => $tgl,
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
                ':id_kelas' => $kelas,
                ':jumlah_pertemuan' => $pertemuan,
                ':jenis_pembayaran' => $jenis,
                ':tgl_daftar' => $tgl_daftar,
                ':tipe_kursus' => $tipe_kursus,
                ':images' => $nama_file,
                ':id_siswa' => $id
            ));

            echo"
                <script>
                    alert('Update Success');
                    window.location.href='?page=siswa/tampil_siswa.php'
                </script>
            ";
        }
    } else {
        $del = $_REQUEST['del'];
        $hapus = "DELETE FROM siswa WHERE id_siswa='$del' ";
        if ($db -> query($hapus)) {
            echo"
                <script>
                    window.location.href='?page=siswa/tampil_siswa.php&succ=3'
                </script>
            ";
        } else {
            $db -> error();
            echo"
                <script>
                    window.location.href='?page=siswa/tampil_siswa.php&err=4'
                </script>
            ";
        }
    }


?>