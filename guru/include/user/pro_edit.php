<?php

    if ($_POST) {
        include '../include/config.php';

        $id = htmlentities($_POST['id']);
        $naleng = htmlentities($_POST['naleng']);
        $user = htmlentities($_POST['user']);
        $pass = htmlentities($_POST['pass']);

        if ($naleng!="") {
            $sql = "UPDATE users SET naleng = :naleng,
                                     username = :username,
                                     password = :password
                                     WHERE id_user = :id_user ";
            $query = $db -> prepare($sql);
            
            $query -> bindParam(':naleng', $naleng);
            $query -> bindParam(':username', $user);
            $query -> bindParam(':password', $pass);
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