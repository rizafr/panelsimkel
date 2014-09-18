<?php include "jam.php"?>
<?php include "koneksi.php"?>
<html>
<head>
	<title>Sistem Informasi Manajemen Kelurahan Leuwi Gajah</title>
	  <meta charset="utf-8">
	<!-- For ease i'm just using a JQuery version hosted by JQuery- you can download any version and link to it locally -->
		<meta name="description" content="Sistem Informasi Manajemen Kelurahan" />
		<meta name="keywords" content="sim, simkel, sistem informasi, Sistem Informasi Kelurahan" />
		<meta name="author" content="Ratih & Riza" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="images/cimahi.png"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/easySlider1.7.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<link href="../assets/css/bootstrapTheme.css" rel="stylesheet">
		<link href="../assets/css/custom.css" rel="stylesheet">	
		 
	
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="../assets/css/bootstrapTheme.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">	
	
		
		
<style type="text/css">
		#loading{
			display:none;
			position:fixed;
			top:50%;
			left:50%;
			margin:-35px 0px 0px -35px;
			background:#fff url(loader.gif) no-repeat center center;
			width:70px;
			height:70px;
			z-index:999;
			opacity:0.7;
			-moz-border-radius:10px;
			-webkit-border-radius:10px;
			border-radius:10px;
			
			opacity:0;  /* make things invisible upon start */
			animation:fadeIn ease-in 1; /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */

			animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/

			animation-duration:1s;
			animation-delay: 1.5s
			}
			
			/* make keyframes that tell the start state and the end state of our object */
			@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
			@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
			@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
			 
			.fade-in {
				opacity:0;  /* make things invisible upon start */
				-webkit-animation:fadeIn ease-in 1;  /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
				-moz-animation:fadeIn ease-in 1;
				animation:fadeIn ease-in 1;
			 
				-webkit-animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
				-moz-animation-fill-mode:forwards;
				animation-fill-mode:forwards;
			 
				-webkit-animation-duration:1s;
				-moz-animation-duration:1s;
				animation-duration:1s;
			}
			 
			.fade-in.one {
			-webkit-animation-delay: 0.7s;
			-moz-animation-delay: 0.7s;
			animation-delay: 0.7s;
			}
			 
			.fade-in.two {
			-webkit-animation-delay: 1.2s;
			-moz-animation-delay:1.2s;
			animation-delay: 1.2s;
			}
			 
			.fade-in.three {
			-webkit-animation-delay: 1.6s;
			-moz-animation-delay: 1.6s;
			animation-delay: 1.6s;
			}
			
			
</style>
<script src="js/loader.js"></script>
<script>
(function($)
{
    $(document).ready(function()
    {
        $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#content').hide();
                $('#loading').show();
            },
            complete: function() {
                $('#loading').hide();
                $('#content').show();
            },
            success: function() {
                $('#loading').hide();
                $('#content').show();
            }
        });
        var $container = $("#content");
        $container.load("full.php");
        var refreshId = setInterval(function()
        {
            $container.load('full.php');
        }, 39000); //5menit
    });
})(jQuery);
</script>
</head>
<!--Header !-->
<body onload="setInterval('displayServerTime()', 1000);">
    <div id="top-nav" class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <?php echo $hari . "," ." ". $tanggal ." ". $bulan ." ". $tahun; ?> | <span id="clock"> <?php print date('H:i:s'); ?></span> 
            </ul>
            <ul class="nav pull-left">
            <img id="logo" src="images/cimahi.png" height="30px" width="30px"/> Sistem Informasi Manajemen <span>Kelurahan Leuwigajah</span> 
            </ul>
            </div>
          </div>
        </div>
      </div>
    <div id="title">
      <div class="container">
        <div class="row">
          <div class="span12">
            <h1 class="hero-unit"> Selamat Datang di Kelurahan Leuwigajah</h1>
			Keterangan:
			<table>
			<tr>
				<td width="30px;"><div class="biru">&nbsp;</td>
				<td>&nbsp;:&nbsp;</td>
				<td>Antrian</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td width="30px;"><div class="kuning">&nbsp;</td>
				<td>&nbsp;:&nbsp;</td>
				<td>Dalam Proses</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td width="30px;"><div class="hijau">&nbsp;</td>
				<td>&nbsp;:&nbsp;</td>
				<td>Selesai</td>
			</tr>
		  </table>
		  
          </div>
        </div>
      </div>
    </div>
	
 <!--isi konten !-->
 <div class="container-fluid">
	<div class="row">
		
		<!--<div class="span12"> -->
			<div id="content"></div>
			<img src="loader.gif" id="loading fade-in.three" alt="loading" style="display:none;" />
	<!--<	</div>  -->
		<!--<div class="span3">
			<p> .: DAFTAR NAMA WARGA:.</p> 		
			<?php $handonnikah = mysql_query("select dp.nik,dp.nama,dp.alamat,an.no_registrasi, an.status, an.waktu_antrian, an.antrian_oleh,an.proses_oleh, an.waktu_proses,an.waktu_selesai, DATE_FORMAT(an.tanggal_surat,'%d') as tanggal_surat 
										from data_penduduk dp, permintaan_andonnikah an
										where an.nik=dp.nik   
										order by an.waktu_antrian desc, an.status desc limit 3") or die (mysql_error());
			$no = 1;
				while ($row = mysql_fetch_array($handonnikah) or die (mysql_error())) {
			
			?> 
		
						<br />Nomor Registrasi : <b><?php echo $row['no_registrasi']?></b>
						<br /><b><?php echo $row['nama']?></b>
						<br /><?php echo $row['alamat']?>
						<br />Surat Permintaan Andon Nikah<br />
		<?php }?>			
			
		</div>-->
	</div>
</div>
	
	
	
	<!--isi footer !-->
	<div id="footer">
      <div class="container">
        <div class="row">
          <div class="span12">
          <p><marquee align="center" direction="left" scrollmount="3" > .:Sistem Informasi Manajemen Kelurahan Pemerintah Kota Cimahi 2014:. </marquee> 
            </p>
          </div>
        </div>
      </div>
    </div>

 
</body>
</html>