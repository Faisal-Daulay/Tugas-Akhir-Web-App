<?php

    if ($_POST) {
        include '../include/config.php';

        $naleng = htmlentities($_POST['naleng']);
        $user = htmlentities($_POST['user']);
        $pass = htmlentities($_POST['pass']);

        if ($naleng!="") {
            $sql = "INSERT INTO users(naleng, username , password) VALUES(:naleng, :username, :password )";
            $query = $db -> prepare($sql);
            
            $query -> bindParam(':naleng', $naleng);
            $query -> bindParam(':username', $user);
            $query -> bindParam(':password', $pass);
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