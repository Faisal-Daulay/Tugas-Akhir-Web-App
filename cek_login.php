<?php
    session_start();
    if ($_POST) {    
        include 'include/config.php';

        $user = $_POST['user'];
        $pass = $_POST['pass'];

        try {
            $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
            $stmt = $db -> prepare($sql);
            $stmt -> bindParam(':username', $user);
            $stmt -> bindParam(':password', $pass);
            $stmt -> execute();

            $db = $stmt->rowCount();
            $ambil = $stmt -> fetch(PDO::FETCH_ASSOC);
            if ($db == 1) {
                $id_user = $ambil['id_user'];
                $status_user = $ambil['status_user'];
                $naleng = $ambil['naleng'];
                $id_guru = $ambil['id_guru'];
                $id_siswa = $ambil['id_siswa'];

                $_SESSION['id_user'] = $id_user;
                $_SESSION['status_user'] = $status_user;
                $_SESSION['naleng'] = $naleng;
                $_SESSION['id_guru'] = $id_guru;
                $_SESSION['id_siswa'] = $id_siswa;


                if ($status_user == "admin") {
                    header("Location: index.php");
                } elseif ($status_user == "guru") {
                    header("Location: guru/index.php");
                } elseif ($status_user == "siswa") {
                    header("Location: siswa/index.php");
                } else {
                    $_SESSION['success'] = "Status tidak sesuai !!";
                    $_SESSION['alert'] = "alert-danger";
                    header("Location: login.php");
                }
            } else {
                $_SESSION['success'] = "Cek Username dan Password anda!!";
                $_SESSION['alert'] = "alert-danger";
                header("Location: login.php");                
            }
        } catch (PDOException $e) {
            echo $e -> getMassage();
        }
    }
