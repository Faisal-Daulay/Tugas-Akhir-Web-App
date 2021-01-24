<?php

    include 'include/config.php';

    $id = $_REQUEST['id'];
    
    $sql = "DELETE FROM users WHERE id_user=:id_user";
    $query = $db -> prepare($sql);
    $query -> execute(array(':id_user' => $id));

    echo "
        <script>
            alert('Delete Success');
            window.location.href='?page=user/tampil.php'
        </script>
    ";