
        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation">
                <li class="xn-logo">
                    <a href="index.php">Private Les Millenium</a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <a href="#" class="profile-mini">
                        <img src="assets/images/users/avatar.jpg" alt="John Doe" />
                    </a>
                    <div class="profile">
                        <?php 
                            require_once "../include/config.php";
                            $dml = "SELECT * FROM pengajar WHERE id_guru = '$id_guru' ";
                            $result = $db -> query($dml);
                            $ambil = $result -> fetch(PDO::FETCH_ASSOC)
                        ?>
                        <div class="profile-image">
                            <img src="../img_siswa/<?= $ambil['images'] ?>" alt="<?= $ambil['nama'] ?>" />
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name text-capitalize"><?php echo $naleng; ?></div>
                            <div class="profile-data-title text-capitalize"><?php echo $status_user; ?></div>
                        </div>
                    </div>
                </li>
                
                <li class="active">
                    <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                </li>
                <!-- <li>
                    <a href="?page=kelas/tampil_kelas.php"><span class="fa fa-book"></span> Kelas</a>
                </li> -->

                <li>
                    <a href="?page=guru/guru.php&id=<?= $id_guru; ?>"><span class="fa fa-book"></span> My Profil</a>
                </li>

                <li>
                    <a href="?page=jadwal/tampil_jadwal.php"><span class="fa fa-book"></span> Jadwal Kelas</a>
                </li>
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