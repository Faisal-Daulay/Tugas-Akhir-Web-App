<?php
	error_reporting(0);
	session_start();
	$naleng = $_SESSION['nama_lengkap'];
	$nama_file = $_SESSION['nama_file'];
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>PLM</title>
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<!-- start plugins -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- start slider -->
		<link href="css/slider.css" rel="stylesheet" type="text/css" media="all" />
		<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
		<script type="text/javascript" src="js/jquery.cslider.js"></script>
			<script type="text/javascript">
					$(function() {

						$('#da-slider').cslider({
							autoplay : true,
							bgincrement : 450
						});

					});
				</script>
		<!-- Owl Carousel Assets -->
		<link href="css/owl.carousel.css" rel="stylesheet">
		<script src="js/owl.carousel.js"></script>
			<script>
				$(document).ready(function() {

					$("#owl-demo").owlCarousel({
						items : 4,
						lazyLoad : true,
						autoPlay : true,
						navigation : true,
						navigationText : ["", ""],
						rewindNav : false,
						scrollPerPage : false,
						pagination : false,
						paginationNumbers : false,
					});

				});
			</script>
			<!-- //Owl Carousel Assets -->
		<!----font-Awesome----->
		   	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
		<!----font-Awesome----->
	</head>
	<body>
		<div class="header_bg">
			<div class="container">
				<div class="row header">
					<div class="logo navbar-left">
						<h1><a href="index.php">Private Les Millenium </a></h1>
					</div>
					<div class="h_search navbar-right">
						<!-- <form>
							<input type="text" class="text" value="Enter text here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter text here';}">
							<input type="submit" value="search">
						</form> -->
						<div class="jam-digital-malasngoding">
							<?php
								date_default_timezone_set('Asia/Jakarta');
								echo $date = date('F j, Y');
							?>
							<div class="kotak">
								<p id="jam"></p>
							</div>
							<div class="kotak">
								<p id="menit"></p>
							</div>
							<div class="kotak">
								<p id="detik"></p>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row h_menu">
				<nav class="navbar navbar-default navbar-left" role="navigation">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				    </div>
				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li><a href="index.php">Home</a></li>
				        <li><a href="">Data Siswa</a>
		                    <ul class="drop">
		                        <li><a class="sub" href="?page=siswa/test_siswa.php">Testimoni Siswa</a></li>
		                        <li><a class="sub" href="?page=siswa/gall_siswa.php">Gallery Siswa</a></li>
		                    </ul>
		                </li>
				        <li><a href="#">Staff</a>
		                    <ul class="drop">
		                        <li><a class="sub" href="?page=pengajar/pengajar.php">Pengajar</a></li>
		                        <li><a class="sub" href="?page=pengajar/gall_peng.php">Gallery</a></li>
		                    </ul>
		                </li>
				        <li><a href="#">Profile</a>
		                    <ul class="drop">
		                        <li><a class="sub" href="?page=profil/about.php">Sejarah Singkat</a></li>
		                        <li><a class="sub" href="?page=profil/visimisi.php">Visi dan Misi</a></li>
		                        <li><a class="sub" href="?page=profil/gal_prof.php">Gallery</a></li>
		                    </ul>
		                </li>
				        <li><a href="?page=biaya/belajar.php">Biaya Belajar</a>
		                    
		                </li> 
				        <!--<li><a href="#">Organisasi</a>
		                    <ul class="drop">
		                        <li><a class="sub" href="?page=struktur.php">Struktur Organisasi</a></li>
		                    </ul>
		                </li> -->
				        <li class="active"><a href="?page=contact.php">Contact</a></li>
				        <li class="active"><a href="?page=siswa/daftar_siswa.php">Pendaftaran</a></li>
				        <li><a href="../login.php">Login</a></li>
				      </ul>
				    </div><!-- /.navbar-collapse -->
				    <!-- start soc_icons -->
				</nav>
			</div>
		</div>

		<?php
			if ($_GET) {
				$page = $_GET['page'];
				include 'include/'.$page;
			} else {
				include 'include/content.php';
			}
		?>
				
		<div class="footer_bg"><!-- start footer -->
			<div class="container">
				<div class="row  footer">
					<div class="copy text-center">
						<p class="link"><span>&#169; Private Les Millenium | 2019
					</div>
				</div>
			</div>
		</div>

	    <script src="js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
		<script src="js/main.js"></script>
	    <script type="text/javascript">jssor_1_slider_init();</script>
	    <script>
			window.setTimeout("waktu()", 1000);
		 
			function waktu() {
				var waktu = new Date();
				setTimeout("waktu()", 1000);
				document.getElementById("jam").innerHTML = waktu.getHours();
				document.getElementById("menit").innerHTML = waktu.getMinutes();
				document.getElementById("detik").innerHTML = waktu.getSeconds();
			}
			function validasiFile(){
		        var inputFile = document.getElementById('file');
		        var pathFile = inputFile.value;
		        var ekstensiOk = /(.jpg|.jpeg|.png|.gif)$/i;
		        if(!ekstensiOk.exec(pathFile)){
		            alert('Silakan upload file yang memiliki ekstensi .jpeg/.jpg/.png/.gif');
		            inputFile.value = '';
		            return false;
		        }else{
		            //Pratinjau gambar
		            if (inputFile.files && inputFile.files[0]) {
		                var reader = new FileReader();
		                reader.onload = function(e) {
		                    document.getElementById('pratinjauGambar').innerHTML = '<img width="200" src="'+e.target.result+'"/>';
		                };
		                reader.readAsDataURL(inputFile.files[0]);
		            }
		        }
		    }
		</script>
	</body>
</html>