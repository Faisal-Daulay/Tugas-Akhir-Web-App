<?php
    require_once 'include/config.php';

    if ($_POST) {
        $id = htmlentities($_POST['id']);
        $nakel = htmlentities($_POST['nakel']);
        $aksi = htmlentities($_POST['aksi']);

        if ($aksi=="edit") {
            if ($nakel!="") {

                $sql = "UPDATE kursus SET nama_kursus =:nama_kursus WHERE id_kursus=:id_kursus ";
                $query = $db -> prepare($sql);
                $query -> bindParam(':nama_kursus', $nakel);
                $query -> bindParam(':id_kursus', $id);
                $query -> execute();

                echo"
                    <script>
                        alert('Update Success');
                        window.location.href='?page=kursus/tampil_kursus.php'
                    </script>
                ";
            } else {
                echo"
                    <script>
                        window.location.href='?page=kursus/kursus.php&id=$id'
                    </script>
                ";
            }
        } elseif($aksi=="tambah") {
            if ($nakel!="") {

                $sql = "INSERT INTO kursus(nama_kursus) VALUES(:nama_kursus) ";
                $query = $db -> prepare($sql);
                $query -> bindParam(':nama_kursus', $nakel);
                $query -> execute();

                echo"
                    <script>
                        alert('Insert Success');
                        window.location.href='?page=kursus/tampil_kursus.php'
                    </script>
                ";
            } else {
                echo"
                    <script>
                        window.location.href='?page=kursus/kursus.php&err=2'
                    </script>
                ";
            }
        }

    } else {
        $del = $_REQUEST['del'];
        $hapus = "DELETE FROM kursus WHERE id_kursus=:id_kursus ";

        $dql = $db -> prepare($hapus);
        $dql -> execute(array(':id_kursus' => $del));

        echo"
            <script>
                alert('Delete Success');
                window.location.href='?page=kursus/tampil_kursus.php'
            </script>
        ";
    }

?>