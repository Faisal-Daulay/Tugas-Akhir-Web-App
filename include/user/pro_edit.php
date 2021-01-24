<?php

    if ($_POST) {
        include 'include/config.php';

        $id = htmlentities($_POST['id']);
        $naleng = htmlentities($_POST['naleng']);
        $user = htmlentities($_POST['user']);
        $pass = htmlentities($_POST['pass']);
        $nama_siswa = htmlentities($_POST['nama_siswa']);
        $status = htmlentities($_POST['status']);

        if ($naleng!="") {
            $sql = "UPDATE users SET id_siswa = :nama_siswa,
                                     naleng = :naleng,
                                     username = :username,
                                     password = :password,
                                     status_user = :status
                                     WHERE id_user = :id_user ";
            $query = $db -> prepare($sql);
            
            $query -> bindParam(':id_siswa', $nama_siswa);
            $query -> bindParam(':naleng', $naleng);
            $query -> bindParam(':username', $user);
            $query -> bindParam(':password', $pass);
            $query -> bindParam(':status_user', $status);
            $query -> bindParam(':id_user', $id);
            $query -> execute();

            echo "
                <script>
                    alert('Update Success');
                    window.location.href='?page=user/tampil.php'
                </script>
            ";
        } else {
            echo "
                <script>
                    window.location.href='?page=user/edit.php&id=$id'
                </script>
            ";
        }
    } else {
        echo "
            <script>
                window.location.href='?page=user/edit.php&id=$id'
            </script>
        ";
    }