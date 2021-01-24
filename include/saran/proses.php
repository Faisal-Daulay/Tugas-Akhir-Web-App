<?php
    require_once 'include/config.php';

    $del = $_REQUEST['id'];
    $hapus = "DELETE FROM saran_siswa WHERE id_saran=:id_saran ";

    $dql = $db -> prepare($hapus);
    $dql -> execute(array(':id_saran' => $del));

    echo"
        <script>
            alert('Delete Success');
            window.location.href='?page=saran/tampil_saran.php'
        </script>
    ";

?>