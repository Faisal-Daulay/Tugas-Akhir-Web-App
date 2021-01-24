<?php
      require_once 'include/config.php';

      if ($_POST) {
            //$naleng = $_POST['naleng'];
            echo $id = htmlentities($_POST['id_bayar']);
            $aksi = htmlentities($_POST['aksi']);
            $id_siswa = htmlentities($_POST['id_siswa']);
            $jumlah = htmlentities($_POST['jumlah']);
            $cicil1 = htmlentities($_POST['cicil1']);
            $tgl_bayar = htmlentities($_POST['tgl_bayar']);
            $status_bayar = htmlentities($_POST['status']);
            $biaya_belajar = htmlentities($_POST['biaya_belajar']);
            $uang_muka = htmlentities($_POST['uang_muka']);
            $totalcicil = htmlentities($_POST['totalcicil']);

            $sisa = $uang_muka + $jumlah;
            $sisacicil = $cicil1 + $jumlah;

            if ($aksi == "tambah") {
                  if ($jumlah!="") {
                        $sql = "INSERT INTO bayar (id_siswa, nominal, tgl_bayar, status_bayar) VALUES (:id_siswa, :nominal, :tgl_bayar, :status_bayar)";

                        $query = $db -> prepare($sql);
                        $query -> bindParam(':id_siswa', $id_siswa);
                        $query -> bindParam(':nominal', $jumlah);
                        $query -> bindParam('tgl_bayar', $tgl_bayar);
                        $query -> bindParam(':status_bayar', $status_bayar);
                        $query -> execute();

                        echo"
                              <script>
                                    alert('Insert Success');
                                    window.location.href='?page=bayar/bayar.php'
                              </script>
                        ";
                  } else {
                        echo"
                              <script>
                                    window.location.href='?page=bayar/bayar.php'
                              </script>
                        ";
                  }
            } elseif ($aksi == "edit") {
                  if ($jumlah!="") {
                        $sql1 = "UPDATE bayar SET cicil = :cicil,
                                                 biaya_belajar = :biaya_belajar,
                                                 tgl_bayar = :tgl_bayar,
                                                 status_bayar = :status_bayar
                                                 WHERE id_bayar = :id_bayar ";

                        $query1 = $db -> prepare($sql1);
                        $query1 -> bindParam(':cicil', $sisacicil);
                        $query1 -> bindParam(':biaya_belajar', $sisa);
                        $query1 -> bindParam(':tgl_bayar', $tgl_bayar);
                        $query1 -> bindParam(':status_bayar', $status_bayar);
                        $query1 -> bindParam(':id_bayar', $id);   
                        $query1 -> execute();

                        echo"
                              <script>
                                    alert('Update Success');
                                    window.location.href='?page=bayar/bayar.php'
                              </script>
                        ";
                  } else {
                        echo"
                              <script>
                                    window.location.href='?page=bayar/bayar.php&id=$id'
                              </script>
                        ";
                  }
            }
      } else {
            $del = $_REQUEST['del'];
            $hapus = "DELETE FROM bayar WHERE id_bayar = :id_bayar ";
            $dql = $db -> prepare($hapus);
            $dql -> execute(array(':id_bayar' => $del));

            echo"
                  <script>
                        alert('Delete Success');
                        window.location.href='?page=bayar/bayar.php'
                  </script>
            ";
      }

?>