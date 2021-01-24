<?php
    require_once 'include/config.php';

    if ($_POST) {
        $id = htmlentities($_POST['id']);
        $nakel = htmlentities($_POST['nakel']);
        $aksi = htmlentities($_POST['aksi']);

        if ($aksi=="edit") {
            if ($nakel!="") {

                $sql = "UPDATE kelass SET nama_kelas =:nama_kelas WHERE id_kelas=:id_kelas ";
                $query = $db -> prepare($sql);
                $query -> bindParam(':nama_kelas', $nakel);
                $query -> bindParam(':id_kelas', $id);
                $query -> execute();

                echo"
                    <script>
                        alert('Update Success');
                        window.location.href='?page=kelas/tampil_kelas.php'
                    </script>
                ";
            } else {
                echo"
                    <script>
                        window.location.href='?page=kelas/kelas.php&id=$id'
                    </script>
                ";
            }
        } elseif($aksi=="tambah") {
            if ($nakel!="") {

                $sql = "INSERT INTO kelass(nama_kelas) VALUES(:nama_kelas) ";
                $query = $db -> prepare($sql);
                $query -> bindParam(':nama_kelas', $nakel);
                $query -> execute();

                echo"
                    <script>
                        alert('Insert Success');
                        window.location.href='?page=kelas/tampil_kelas.php'
                    </script>
                ";
            } else {
                echo"
                    <script>
                        window.location.href='?page=kelas/kelas.php&err=2'
                    </script>
                ";
            }
        }

    } else {
        $del = $_REQUEST['del'];
        $hapus = "DELETE FROM kelass WHERE id_kelas=:id_kelas ";

        $dql = $db -> prepare($hapus);
        $dql -> execute(array(':id_kelas' => $del));

        echo"
            <script>
                alert('Delete Success');
                window.location.href='?page=kelas/tampil_kelas.php'
            </script>
        ";
    }

?>