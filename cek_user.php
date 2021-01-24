<?php
    session_start();
    if ($_POST) {    
        include 'include/config.php';

        $user = $_POST['user'];

        try {
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $db -> prepare($sql);
            $stmt -> bindParam(':username', $user);
            $stmt -> execute();

            $db = $stmt->rowCount();
            $ambil = $stmt -> fetch(PDO::FETCH_ASSOC);
            if ($db == 1) {
                $id_user = $ambil['id_user'];

                $_SESSION['id_user'] = $id_user;

                // $_SESSION['success'] = " tidak sesuai !!";
                // $_SESSION['alert'] = "alert-danger";
                header("Location: lupa_pass1.php");

            } else {
                $_SESSION['success'] = "Cek username anda !!";
                $_SESSION['alert'] = "alert-danger";
                header("Location: lupa_pass.php");           
            }
        } catch (PDOException $e) {
            echo $e -> getMassage();
        }
    }
