<?php include("Connections.php")?>
<!-- Coba -->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOME</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/jquery_3_2_0.min.js"></script>
	<style>
		/* Remove the navbar's default rounded borders and increase the bottom margin */ 
		.navbar {
		  margin-bottom: 50px;
		  border-radius: 0;
		}
		
		/* Remove the jumbotron's default bottom margin */ 
		 .jumbotron {
		  margin-bottom: 0;
		}
	   
		/* Add a gray background color and some padding to the footer */
		footer {
		  background-color: #f2f2f2;
		  padding: 25px;
		}
		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
			width: 70%;
			margin: auto;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="#">Logo</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="Home.php" data-toggle="pill">Home</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">Perumahan
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="List-Permata-Buah-Batu.php">Permata Buah Batu</a></li>
							<li><a href="List-Permata-Buah-Batu_2.php">Permata Buah Batu 2</a></li>
							<li><a href="List-Palem_1.php">Palem 1</a></li> 
							<li><a href="List-Palem_2.php">Palem 2</a></li> 
							<li><a href="List-Pesona-Bali.php">Pesona Bali</a></li> 
						</ul>
					</li>
					<li><a href="AboutUs.php">About Us</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php session_start();
						if(isset($_SESSION['login']) == true){ ?>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown"><a data-toggle="dropdown" href=""><span class="glyphicon glyphicon-user"></span> Hello <?php echo $_SESSION['login'] ?></a>
									<ul class="dropdown-menu">
										<li><a href="">Profile</a></li>
										<li><a href="Logout.php">Logout</a></li>
									</ul>
								</li>
							</ul> <?php
						} else { ?>
							<li><a href="FormLogin.php"><span class="glyphicon glyphicon-user"></span> Login</a></li> <?php
						}
						?>
				</ul>
				
			</div>
		</div>
	</nav>
	<?php
		$sql = mysqli_query($conn, "SELECT * FROM rumah_kontrakan, perumahan where rumah_kontrakan.id_perum = perumahan.id_perum");
		$cek = mysqli_num_rows($sql);
		if($sql){ ?>
			<div class="container">
				<div class="row"> <?php
			if($cek){
				while($view = mysqli_fetch_array($sql)){
					$namaPerum = $view['nama_perum'];
					$alamat = $view['alamat_rumah'];
					$harga = $view['harga'];
					$kmr_tidur = $view['kmr_tidur'];
					$kmr_mandi = $view['kmr_mandi'];
					$air = $view['air'];
					$fasilitas = $view['fasilitas'];
					$gambar = $view['gambar'];
					
					?>
					<div class="col-sm-4">
						<div class="panel panel-primary">
							<div class="panel-heading"><?php echo $namaPerum ?></div>
							<div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
							<div class="panel-footer">Rp. <?php echo $harga ?>,-/tahun
								<div class="navbar-right" style="margin-right:1px">
									<a href="Detail_Rumah.php?id=<?php echo $view['id_rumah'] ?>"> view details <span class="glyphicon glyphicon-chevron-right"></span></a>
									</div>
							</div>
						</div>
					</div> <?php
				} ?>
					</div><br><br>
				</div> <?php
			}
		}
	?>
	<footer class="container-fluid text-center">
		<p>3Hats Team Copyright</p>
		<p>Term And Privacy</p>
	</footer>
</body>
</html>
