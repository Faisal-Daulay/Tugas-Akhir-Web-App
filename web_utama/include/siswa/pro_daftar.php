<?php
    require_once '../include/config.php';

    if ($_POST) {
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
        $kelas = htmlentities($_POST['kelas']);

        $lokasi_file = $_FILES['upload']['tmp_name'];
        $tipe_file   = $_FILES['upload']['type'];
        $nama_file   = $_FILES['upload']['name'];
        $size        = $_FILES['upload']['size'];
        $direktori   = "../img_siswa/$nama_file";

        if ($naleng!="") {
            $upload = move_uploaded_file($lokasi_file, $direktori);
            $sql = "insert into siswa(nama_lengkap, tempat_lahir, tgl_lahir, agama, jenis_kelamin, goldar, warganegara, nama_ibu, nama_ayah, alamat, notel, nopri, email, pendidikan, fakultas, masa_belajar, cita, hobi, komitmen, id_kelas,images) values(:nama_lengkap, :tempat_lahir, :tgl_lahir, :agama, :jenis_kelamin, :goldar, :warganegara, :nama_ibu, :nama_ayah, :alamat, :notel, :nopri, :email, :pendidikan, :fakultas, :masa_belajar, :cita, :hobi, :komitmen, :id_kelas, :images)";

            $kuery = $db -> prepare($sql);
            $kuery -> bindParam(':nama_lengkap', $naleng);
            $kuery -> bindParam(':tempat_lahir', $tempat);
            $kuery -> bindParam(':tgl_lahir', $tgl_lahir);
            $kuery -> bindParam(':agama', $agama);
            $kuery -> bindParam(':jenis_kelamin', $jk);
            $kuery -> bindParam(':goldar', $goldar);
            $kuery -> bindParam(':warganegara', $warga);
            $kuery -> bindParam(':nama_ibu', $ibu);
            $kuery -> bindParam(':nama_ayah', $ayah);
            $kuery -> bindParam(':alamat', $alamat);
            $kuery -> bindParam(':notel', $notel);
            $kuery -> bindParam(':nopri', $nopri);
            $kuery -> bindParam(':email', $email);
            $kuery -> bindParam(':pendidikan', $pendidikan);
            $kuery -> bindParam(':fakultas', $fakultas);
            $kuery -> bindParam(':masa_belajar', $masa_belajar);
            $kuery -> bindParam(':cita', $perusahaan);
            $kuery -> bindParam(':hobi', $jabatan);
            $kuery -> bindParam(':komitmen', $bekerja);
            $kuery -> bindParam(':id_kelas', $kelas);
            $kuery -> bindParam(':images', $nama_file);
            $kuery -> execute();

            $_SESSION['nama_lengkap'] = $naleng;
            $_SESSION['nama_file'] = $nama_file;

            echo"
                <script>
                    window.location.href='?page=siswa/confirm.php'
                </script>
            ";
        } else {
            echo"
                <script>
                    alert('Isi data dengan benar!!');
                    window.location.href='?page=siswa/daftar_siswa.php'
                </script>
            ";
        }
    }
?>