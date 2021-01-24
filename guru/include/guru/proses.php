<?php

    require_once '../include/config.php';

    if ($_POST) {
        $id = htmlentities($_POST['id']);
        $aksi = htmlentities($_POST['aksi']);

        $nama = htmlentities($_POST['nama']);
        $alamat = htmlentities($_POST['alamat']);
        $jk = htmlentities($_POST['jk']);
        $notel = htmlentities($_POST['notel']);
        $email = htmlentities($_POST['email']);
        $agama = htmlentities($_POST['agama']);

        $lokasi_file = $_FILES['upload']['tmp_name'];
        $tipe_file   = $_FILES['upload']['type'];
        $nama_file   = $_FILES['upload']['name'];
        $size        = $_FILES['upload']['size'];
        $direktori   = "../img_siswa/$nama_file";

        if ($aksi=="edit") {
            if ($nama!="") {
                $upload = move_uploaded_file($lokasi_file, $direktori);

                $sql = "UPDATE pengajar SET nama =:nama,
                                            alamat =:alamat,
                                            jk =:jk,
                                            notel =:notel,
                                            email =:email,
                                            agama =:agama,
                                            images =:images WHERE id_guru=:id_guru ";
                $query = $db -> prepare($sql);
                $query -> bindParam(':nama', $nama);
                $query -> bindParam(':alamat', $alamat);
                $query -> bindParam(':jk', $jk);
                $query -> bindParam(':notel', $notel);
                $query -> bindParam(':email', $email);
                $query -> bindParam(':agama', $agama);
                $query -> bindParam(':images', $nama_file);
                $query -> bindParam(':id_guru', $id);
                $query -> execute();

                $_SESSION['success'] = "Update Success";
                $_SESSION['alert'] = "alert-info";

                echo"
                    <script>
                        window.location.href='?page=guru/tampil_guru.php'
                    </script>
                ";
            } else {

                $_SESSION['success'] = "Update Failed";
                $_SESSION['alert'] = "alert-danger";

                echo"
                    <script>
                        window.location.href='?page=guru/guru.php&id=$id'
                    </script>
                ";
            }
        } elseif($aksi=="tambah") {
            if ($nama!="") {
                $upload = move_uploaded_file($lokasi_file, $direktori);

                $sql = "INSERT INTO pengajar(nama, alamat, jk, notel, email, agama) VALUES(:nama, :alamat, :jk, :notel, :email, :agama) ";
                $query = $db -> prepare($sql);
                $query -> bindParam(':nama', $nama);
                $query -> bindParam(':alamat', $alamat);
                $query -> bindParam(':jk', $jk);
                $query -> bindParam(':notel', $notel);
                $query -> bindParam(':email', $email);
                $query -> bindParam(':agama', $agama);
                $query -> execute();

                $lastId = $db -> lastInsertId();

                $qkl = "INSERT INTO users (id_guru, naleng, username, password, status_user) VALUES(:id_guru,:naleng, :username, :password, 'guru')";
                $klq = $db -> prepare($qkl);
                $klq -> bindParam(':id_guru', $lastId);
                $klq -> bindParam(':naleng', $nama);
                $klq -> bindParam(':username', $user);
                $klq -> bindParam(':password', $pass);
                $klq -> execute();

                $_SESSION['success'] = "Insert Success";
                $_SESSION['alert'] = "alert-success";

                echo"
                    <script>
                        window.location.href='?page=guru/tampil_guru.php'
                    </script>
                ";
            } else {
                
                $_SESSION['success'] = "Insert Failed";
                $_SESSION['alert'] = "alert-danger";

                echo"
                    <script>
                        window.location.href='?page=guru/guru.php&err=2'
                    </script>
                ";
            }
        }

    } else {
        $del = $_REQUEST['del'];
        $hapus = "DELETE FROM pengajar WHERE id_guru=:id_guru ";

        $dql = $db -> prepare($hapus);
        $dql -> execute(array(':id_guru' => $del));

        $_SESSION['success'] = "Delete Success";
        $_SESSION['alert'] = "alert-danger";

        echo"
            <script>
                window.location.href='?page=guru/tampil_guru.php'
            </script>
        ";
    }

?>