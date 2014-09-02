<?php include "koneksi.php" ?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Sistem Informasi Manajemen Kelurahan Leuwi Gajah</title>
		<meta name="description" content="Loading Effects for Grid Items with CSS Animations" />
		<meta name="keywords" content="css animation, loading effect, google plus, grid items, masonry" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="images/cimahi.png"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/easySlider1.7.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<style>
			.biru {				
				background: #3498db;
			}
			
			.kuning {				
				background: #D2FF4C;
			}
			
			.hijau {				
				background: #3fbf79;
			}
		</style>
		
		
   
	</head>
	<body>
		
			<ul class="grid effect-8" id="grid">
			<?php
				$result = mysql_query("SELECT * FROM data_penduduk");
				$no = 1;
				while ($row = mysql_fetch_array($result)) {
			?> 
			<div id="owl-demo" class="owl-carousel">
			<li class="animate">
				<div class="card biru">					
					<div class="isi ">
					<?php echo $no; ?>
					<br /><?php echo $row['no_kk']?>
					<br /><?php echo $row['nama']?>
					<br /><?php echo $row['alamat']?>
					</div>
					<br /><div class="status clearfix">
							Status
						</div>
				</div>
			</li>	
				
			<?php
			$no++;
		}
		?>	</div>
			</ul>
		</div>
		  <script src="../assets/js/jquery-1.9.1.min.js"></script> 
			<script src="../owl-carousel/owl.carousel.js"></script>
			
			
		<script src="js/masonry.pkgd.min.js"></script>
		<script src="js/imagesloaded.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/AnimOnScroll.js"></script>
		<script>
			new AnimOnScroll( document.getElementById( 'grid' ), {
				minDuration : 0.4,
				maxDuration : 0.7,
				viewportFactor : 0.2
			} );
		</script>
		 <script>
			$(document).ready(function() {
			  $("#owl-demo").owlCarousel({
				navigation : true,
				autoPlay: true
			  });
			});

    </script>
	 <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>

    <script src="../assets/js/google-code-prettify/prettify.js"></script>
	  <script src="../assets/js/application.js"></script>
	</body>
</html>