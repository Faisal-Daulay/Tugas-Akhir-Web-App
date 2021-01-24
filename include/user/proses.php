<?php

    if ($_POST) {
        include 'include/config.php';

        $naleng = htmlentities($_POST['naleng']);
        $user = htmlentities($_POST['user']);
        $pass = htmlentities($_POST['pass']);
        $nama_siswa = htmlentities($_POST['nama_siswa']);
        $status = htmlentities($_POST['status']);

        if ($naleng!="") {
            $sql = "INSERT INTO users(id_siswa, naleng, username , password, status_user) VALUES(:id_siswa, :naleng, :username, :password, :status_user)";
            $query = $db -> prepare($sql);
            
            $query -> bindParam(':id_siswa', $nama_siswa);
            $query -> bindParam(':naleng', $naleng);
            $query -> bindParam(':username', $user);
            $query -> bindParam(':password', $pass);
            $query -> bindParam(':status_user', $status);
            $query -> execute();

            echo "
                <script>
                    alert('Insert Success');
                    window.location.href='?page=user/tampil.php'
                </script>
            ";
        } else {
            echo "
                <script>
                    window.location.href='?page=user/user.php'
                </script>
            ";
        }
    } else {
        echo "
            <script>
                window.location.href='?page=user/user.php'
            </script>
        ";
    }