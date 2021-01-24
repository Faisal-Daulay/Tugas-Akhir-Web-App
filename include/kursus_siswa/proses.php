<?php
    require_once 'include/config.php';

    if ($_POST) {
        $id = htmlentities($_POST['id']);
        $aksi = htmlentities($_POST['aksi']);
        $nama_siswa = $_POST['nama_siswa'];
        $nama_kursus = $_POST['nama_kursus'];
        $nama_kelas = $_POST['nama_kelas'];


        if ($aksi=="edit") {
            if ($nama_siswa!="") {

                $sql = "UPDATE kursus_siswa SET id_siswa = :nama_siswa, 
                                                id_kursus = :nama_kursus, 
                                                id_kelas = :nama_kelas 
                                                WHERE id_kursus_siswa = :id_kursus_siswa ";
                $query = $db -> prepare($sql);
                $query -> bindParam(':id_siswa', $nama_siswa);
                $query -> bindParam(':id_kursus', $nama_kursus);
                $query -> bindParam(':id_kelas', $nama_kelas);
                $query -> bindParam(':id_kursus_siswa', $id);
                $query -> execute();

                echo"
                    <script>
                        alert('Update Success');
                        window.location.href='?page=kursus_siswa/tampil_kursus_siswa.php'
                    </script>
                ";
            } else {
                echo"
                    <script>
                        window.location.href='?page=kursus_siswa/kursus_siswa.php&id=$id'
                    </script>
                ";
            }
        } elseif($aksi=="tambah") {
            if ($nama_siswa!="") {

                $sql = "INSERT INTO kursus_siswa(id_siswa, id_kursus, id_kelas) VALUES(:id_siswa, :id_kursus, :id_kelas) ";
                $query = $db -> prepare($sql);
                $query -> bindParam(':id_siswa', $nama_siswa);
                $query -> bindParam(':id_kursus', $nama_kursus);
                $query -> bindParam(':id_kelas', $nama_kelas);
                $query -> execute();

                echo"
                    <script>
                        alert('Insert Success');
                        window.location.href='?page=kursus_siswa/tampil_kursus_siswa.php'
                    </script>
                ";
            } else {
                echo"
                    <script>
                        window.location.href='?page=kursus_siswa/kursus_siswa.php&err=2'
                    </script>
                ";
            }
        }

    } else {
        $del = $_REQUEST['del'];
        $hapus = "DELETE FROM kursus_siswa WHERE id_kursus_siswa=:id_kursus_siswa ";

        $dql = $db -> prepare($hapus);
        $dql -> execute(array(':id_kursus_siswa' => $del));

        echo"
            <script>
                alert('Delete Success');
                window.location.href='?page=kursus_siswa/tampil_kursus_siswa.php'
            </script>
        ";
    }

?>