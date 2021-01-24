<?php
    require_once '../include/config.php';

    if ($_POST) {
        $id = htmlentities($_POST['id']);
        $aksi = htmlentities($_POST['aksi']);

        $nama_guru = $_POST['nama_guru'];
        $pesan = $_POST['pesan'];

        if ($aksi=="edit") {
            if ($nama_guru!="") {

                $sql = "UPDATE saran_siswa SET id_guru =:id_guru, pesan:pesan WHERE id_saran=:id_saran ";
                $query = $db -> prepare($sql);
                $query -> bindParam(':id_guru', $nama_guru);
                $query -> bindParam(':pesan', $pesan);
                $query -> bindParam(':id_saran', $id);
                $query -> execute();

                echo"
                    <script>
                        alert('Update Success');
                        window.location.href='?page=saran/tampil_saran.php'
                    </script>
                ";
            } else {
                echo"
                    <script>
                        window.location.href='?page=saran/saran.php&id=$id'
                    </script>
                ";
            }
        } elseif($aksi=="tambah") {
            if ($nama_guru!="") {

                $sql = "INSERT INTO saran_siswa(id_guru, id_siswa, pesan) VALUES(:id_guru,:id_siswa, :pesan) ";
                $query = $db -> prepare($sql);
                $query -> bindParam(':id_guru', $nama_guru);
                $query -> bindParam(':id_siswa', $id_siswa);
                $query -> bindParam(':pesan', $pesan);
                $query -> execute();

                echo"
                    <script>
                        alert('Terim kasih sudah memberikan saran kepada kami');
                        window.location.href='?page=saran/tampil_saran.php'
                    </script>
                ";
            } else {
                echo"
                    <script>
                        window.location.href='?page=saran/saran.php&err=2'
                    </script>
                ";
            }
        }

    } else {
        $del = $_REQUEST['del'];
        $hapus = "DELETE FROM saran_siswa WHERE id_saran=:id_saran ";

        $dql = $db -> prepare($hapus);
        $dql -> execute(array(':id_saran' => $del));

        echo"
            <script>
                alert('Delete Success');
                window.location.href='?page=saran/tampil_saran.php'
            </script>
        ";
    }

?>