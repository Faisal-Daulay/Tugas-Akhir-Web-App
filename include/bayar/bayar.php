<div class="row">
    <div class="col-md-12">         
    </div>
               
            
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">DATA SISWA YANG SUDAH LUNAS</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                            
                        <ul class="dropdown-menu">
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span> Refresh</a></li>
                        </ul>                                        
                    </li>
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>                         
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <a href="include/laporan/lap_bayar.php" class="btn btn-primary">CETAK PDF</a>
                </div>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Bayar</th>
                            <th>Bayar Lunas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "include/config.php";
                            $dml1 = "SELECT * FROM siswa INNER JOIN bayar ON siswa.id_siswa = bayar.id_siswa";
                            $dsl = $db -> prepare($dml1);
                            $dsl -> execute();

                            $no=1;
                            while ($result = $dsl -> fetch(PDO::FETCH_ASSOC) ) {
                            $id_bayar = $result['id_bayar'];
                            $nama_lengkap = $result['nama_lengkap'];
                            $jenis_pembayaran = $result['status_bayar'];
                            $tgl_bayar = $result['tgl_bayar'];
                            $nominal = $result['nominal'];
                            $biaya_belajar = $result['biaya_belajar'];

                            if ($cicil>$biaya_belajar) {
                                $cicilhasil;
                            } else {
                                $cicilhasil = $biaya_belajar - $cicil;
                            }
                            
                            $cicilan = $uang_muka + $cicil;
                            
                            $angka1 = "Rp " . number_format($nominal,2,',','.');
                            $angka2 = "Rp " . number_format($uang_muka,2,',','.');
                                
                            if ($jenis_pembayaran=="lunas") {
                                $jenis_pembayaran ="<label class='btn btn-success text-capitalize'>$jenis_pembayaran</label>";
                                $tombol = "
                                    <div class='btn-group'>
                                    <button class='btn btn-primary'>Action</button>
                                    <button data-toggle='' class='btn dropdown-toggle'><span class='caret'></span></button>
                                        <ul class='dropdown-menu'>
                                            <li>
                                                <a href='?page=bayar/detail.php&id=$id_bayar'>Edit</a>
                                            </li>
                                            <li>
                                                <a href='?page=bayar/proses.php&del= $id_bayar>'>Hapus</a>
                                            </li>
                                        </ul>
                                    </div>
                                ";
                            } else {
                                $jenis_pembayaran = "Belum Lunas";
                                $jenis_pembayaran ="<label class='btn btn-danger text-capitalize'>$jenis_pembayaran</label>";
                                // $tombol = "
                                //     <div class='btn-group'>
                                //     <button class='btn btn-primary'>Action</button>
                                //     <button data-toggle='dropdown' class='btn dropdown-toggle'><span class='caret'></span></button>
                                //         <ul class='dropdown-menu'>
                                //             <li>
                                //                 <a href='?page=bayar/detail.php&id=$id_bayar'>Edit</a>
                                //             </li>
                                //             <li>
                                //                 <a href='?page=bayar/proses.php&del=$id_bayar'>Hapus</a>
                                //             </li>
                                //         </ul>
                                //     </div>
                                // ";
                            }
                        
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $nama_lengkap ?></td>
                            <td><?= $tgl_bayar ?></td>
                            <td><?= $angka1 ?></td>
                            <td>
                                <?= $jenis_pembayaran ?>
                                <a href="include/laporan/lap_kwitansi.php?id=<?= $id_bayar; ?>" class="btn btn-primary">CETAK DATA</a>    
                            </td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->

    </div>
</div>    