<?php
include "fungsi/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Zaman Apps</title>

	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="css/grayscale.min.css" rel="stylesheet">
	<script type="text/javascript">
		function load_data(f, t, l) {
			var req55 = [];
			var arr;
			arr++;
			var lokasi = l.split(",");
			if (window.XMLHttpRequest) {
				req55[arr] = new XMLHttpRequest();
			} else {
				req55[arr] = new ActiveXObject("Microsoft.XMLHTTP");
			}
			req55[arr].onreadystatechange = function() {
				if (req55[arr].readyState == 1) {
					document.getElementById(l).innerHTML = "<center><label>Memuat...</label></center>";
					//document.getElementById("tombol").disabled = true;}
				} else if (req55[arr].readyState == 4) {
					if (t == "v") {
						var respom = req55[arr].responseText.split("<>");
						for (var i = 0; i < lokasi.length; i++) {
							document.getElementById(lokasi[i]).value = respom[i];
						}
					} else {
						document.getElementById(l).innerHTML = req55[arr].responseText;
					}
				}
			}

			req55[arr].open("GET", f, true);
			req55[arr].send();
		}
	</script>

</head>

<body id="page-top">

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top"> <img src="img/unpad.png" width="50px" height="50px" style="margin-left:40%"></a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#maps">Maps</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#algoritma">Uji Algoritma</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#login">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Header -->
	<header class="masthead">
		<div class="container d-flex h-100 align-items-center">
			<div class="mx-auto text-center">
				<h1 class="mx-auto my-0 text-uppercase">Zaman Apps</h1>
				<h2 class="text-white-50 mx-auto mt-2 mb-5">Ini Aplikasi ....</h2>
				<a href="#maps" class="btn btn-primary js-scroll-trigger">Go</a>
			</div>
		</div>
	</header>

	<!-- Maps Section -->
	<section id="maps" class="about-section text-center ">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<h2 class="text-white mb-4">Maps Universitar Pdjadjaran</h2>
					<p class="text-white-50"></p>
					<img src="img/Graph%20Lokasi-A3.png" class="img-fluid" alt="">
				</div>
			</div>
		</div>
		<br>
		<br>
	</section>

	<!-- Algoritma Section -->
	<section id="algoritma" class="projects-section bg-light">
		<div class="container">

			<!-- Form Algoritma -->
			<?php
			include "data/algoritma/form.php";
			?>

		</div>
	</section>

	<!-- Login Section -->
	<section id="login" class="signup-section">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-lg-8 mx-auto text-center">

					<i class="far fa-user fa-2x mb-2 text-white"></i>
					<h2 class="text-white mb-5">Admin</h2>

					<form action="cek_login.php" method="POST" class="form-inline d-flex">
						<input type="text" name="username" class="form-control  flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" placeholder="Username">
						<input type="password" name="password" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" placeholder="Password">
						<button type="submit" class="btn btn-primary mx-auto">Login</button>
					</form>

				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="bg-black small text-center text-white-50">
		<div class="container">
			M. Fikri Nur Zaman &copy; 2019
		</div>
	</footer>


	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="js/grayscale.min.js"></script>

</body>

</html>