
        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation">
                <li class="xn-logo">
                    <a href="index.php">Private Les Millenium</a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <div class="profile">
                        <?php 
                            require_once "../include/config.php";
                            $dml = "SELECT * FROM siswa WHERE id_siswa = '$id_siswa' ";
                            $result = $db -> query($dml);
                            $ambil = $result -> fetch(PDO::FETCH_ASSOC)
                        ?>
                        <div class="profile-image">
                            <img src="../img_siswa/<?= $ambil['images'] ?>" alt="<?= $ambil['nama_lengkap'] ?>" />
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name text-capitalize"><?php echo $naleng; ?></div>
                            <div class="profile-data-title text-capitalize"><?php echo $status_user; ?></div>
                        </div>
                    </div>
                </li>
                <!--<li class="xn-title">Navigation</li>
                <li class="active">
                    <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                </li>-->
                <!-- <li>
                    <a href="?page=kelas/tampil_kelas.php"><span class="fa fa-book"></span> Kelas</a>
                </li> -->

                <li>
                    <a href="?page=siswa/siswa.php&id=<?= $id_siswa; ?>"><span class="fa fa-book"></span> My Profil</a>
                </li>

                <li>
                    <a href="?page=jadwal/detail.php"><span class="fa fa-book"></span> Jadwal Kelas</a>
                </li>

                <!-- <li>
                    <a href="?page=saran/tampil_saran.php"><span class="fa fa-book"></span> Beri Saran</a>
                </li> -->
                <!-- <li>
                    <a href="#"><span class="fa fa-info"></span> <span class="xn-text">Laporan Absen</span></a>
                </li> -->
                <!-- <li>
                    <a href="?page=user/tampil.php"><span class="fa fa-user"></span> <span class="xn-text">User Setting</span></a>
                </li> -->
            </ul>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->