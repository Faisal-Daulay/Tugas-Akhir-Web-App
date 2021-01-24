<?php
    session_start();
    if ($_POST) {    
        include 'include/config.php';

        $id_user = $_POST['id'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        $_SESSION['id_user'] = $id_user;

        if ($pass2 == $pass1) {
            try {
                $sql = "UPDATE users SET password=:password WHERE id_user=:id_user ";
                $stmt = $db -> prepare($sql);
                $stmt -> bindParam(':password', $pass2);
                $stmt -> bindParam(':id_user', $id_user);
                $stmt -> execute();

                if ($stmt == TRUE) {

                    header("Location: login.php");

                } else {
                    $_SESSION['success'] = "Cek username anda !!";
                    $_SESSION['alert'] = "alert-danger";
                    header("Location: lupa_pass1.php");
                }
            } catch (PDOException $e) {
                echo $e -> getMassage();
            }
        } else {
            $_SESSION['success'] = "Password anda tidak sama !!";
            $_SESSION['alert'] = "alert-danger";
            header("Location: lupa_pass1.php");
        }
    }
