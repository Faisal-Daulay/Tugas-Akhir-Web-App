
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
                        <img src="assets/images/users/millenium.jpg" alt="John Doe" />
                    </a>
                    <div class="profile">
                        <div class="profile-image">
                            <img src="assets/images/users/millenium.jpg" alt="John Doe" />
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
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-gear"></span> <span class="xn-text">Data Master</span></a>
                    <ul>
                        <li>
                            <a href="?page=siswa/tampil_siswa.php"><span class="fa fa-users"></span> Siswa</a>
                        </li>
                        <li>
                            <a href="?page=bayar/bayar.php"><span class="fa fa-money"></span> Pembayaran</a>
                        </li>
                        <li>
                            <a href="?page=kursus/tampil_kursus.php"><span class="fa fa-book"></span> Kursus</a>
                        </li>
                        <li>
                            <a href="?page=kelas/tampil_kelas.php"><span class="fa fa-book"></span> Kelas</a>
                        </li>
                        <li>
                            <a href="?page=guru/tampil_guru.php"><span class="fa fa-users"></span> Guru</a>
                        </li>
                        <li>
                            <a href="?page=kursus_siswa/tampil_kursus_siswa.php"><span class="fa fa-book"></span> Kursus Siswa</a>
                        </li>
                        <li>
                            <a href="?page=jadwal/tampil_jadwal.php"><span class="fa fa-book"></span> Jadwal Kelas</a>
                        </li>
                        <!-- <li>
                            <a href="?page=absen/tampil_absen.php"><span class="fa fa-book"></span> Absensi Siswa</a>
                        </li> -->
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-gear"></span> <span class="xn-text">Data Laporan</span></a>
                    <ul>
                        <li>
                            <a href="?page=laporan/lap_siswa/laporan.php"><span class="fa fa-info"></span> <span class="xn-text">Laporan Data Siswa</span></a>
                        </li>
                        <li>
                            <a href="?page=laporan/lap_jadwal/laporan.php"><span class="fa fa-info"></span> <span class="xn-text">Laporan Jadwal Kelas</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="?page=saran/tampil_saran.php"><span class="fa fa-users"></span> <span class="xn-text">Saran Dari Pengunjung</span></a>
                </li>
                <li>
                    <a href="?page=user/tampil.php"><span class="fa fa-user"></span> <span class="xn-text">Users</span></a>
                </li>
            </ul>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->