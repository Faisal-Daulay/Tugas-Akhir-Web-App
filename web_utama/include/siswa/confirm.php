<div class="main_btm"><!-- start main_btm -->
	<div class="container">
		<div class="main row">
			<div class="col-md-8">
				<?php 
					include '../include/config.php';
					$sql = "SELECT * FROM siswa WHERE nama_lengkap = '$naleng' ";
                    $result = $db -> query($sql);
                    $ambil = $result -> fetch(PDO::FETCH_ASSOC);
					$id_siswa = $ambil['id_siswa'];
				?>
				<img src="../img_siswa/<?= $nama_file; ?>" width="200">
				<h3>Pendaftaran atas nama : <?= $naleng; ?></h3>
				<h3>Dengan ID : <?= $id_siswa; ?></h3>
				<p>Silahkan mendaftar ulang di kantor kami dan tunjukan id pendaftaran anda untuk melakukan pembayaran secara langsung.<br/>terima kasih sudah mendaftar</p>
  			</div>		
  			<div class="clearfix"></div>		
	</div> 
</div>
