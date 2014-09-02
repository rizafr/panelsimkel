<?php include "koneksi.php" ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="../assets/css/bootstrapTheme.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">	
	

    <!-- Owl Carousel Assets -->
    <link href="../owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="../owl-carousel/owl.theme.css" rel="stylesheet">

    <link href="../assets/js/google-code-prettify/prettify.css" rel="stylesheet">

	
    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
					


  </head>
  <body>

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
            <img id="logo" src="images/cimahi.png" height="30px" width="30px"/> Sistem Informasi Manajemen <span>Kelurahan Leuwi Gajah</span> 
            </ul>
            </div>
          </div>
        </div>
      </div>
    <div id="title">
      <div class="container">
        <div class="row">
          <div class="span12">
            <h1 class="hero-unit"> Selamat Datang di Kelurahan Leuwi Gajah</h1>
          </div>
        </div>
      </div>
    </div>
   

      <div id="demo">

        <div id="owl-demo" class="owl-carousel owl-theme">
		<?php
			//andonikah
			$handonnikah = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_andonnikah an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = 1;
			while ($row = mysql_fetch_array($handonnikah)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Andon Nikah</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai andonnikah
		?>	  


		<?php
			//permintaan bersih diri
			$handonnikah = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_bd an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($handonnikah)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Bersih Diri</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai bersih diri
		?>
		
		<?php
			//permintaan belummenikah
			$handonnikah = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_belummenikah an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($handonnikah)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Bersih Diri</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai belummenikah
		?>	
		
		<?php
			//permintaan bpr
			$handonnikah = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_bpr an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($handonnikah)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Belum Punya Rumah</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai bpr
		?>	

		<?php
			//permintaan domisiliparpol
			$domisiliparpol = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_domisili_parpol an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($domisiliparpol)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Domisili Parpol</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai domisiliparpol
		?>	
		
		<?php
			//permintaan domisiliperusahaan
			$domisiliperusahaan = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_domisili_perusahaan an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($domisiliperusahaan)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Domisili Parpol</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai domisiliperusahaan
		?>	  
		
		<?php
			//permintaan domisiliyayasan
			$domisiliyayasan = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_domisili_yayasan an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($domisiliyayasan)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Domisili Yayasan</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai domisiliyayasan
		?>	
		
		<?php
			//permintaan ibadahhaji
			$ibadahhaji = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_ibadahhaji an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($ibadahhaji)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Ibadah Haji</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai ibadahhaji
		?>	
		
		<?php
			//permintaan ibadahhaji
			$ibadahhaji = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_ibadahhaji an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($ibadahhaji)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Ibadah Haji</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai ibadahhaji
		?>	
		
		<?php
			//permintaan ijin keramaian
			$ik = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_ik an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($ik)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Ijin Keramaian</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai ijin keramaian
		?>	
		
		<?php
			//permintaan janda
			$janda = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_janda an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($janda)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Keterangan Janda</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai janda
		?>	 
		
		<?php
			//permintaan keterangan tempat usaha
			$ktu = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_keterangan_tempat_usaha an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($ktu)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Keterangan Tempat Usaha</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai keterangan tempat usaha
		?>	
		
		<?php
			//permintaan lahir
			$lahir = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_lahir an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($lahir)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Keterangan Lahir</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai lahir
		?>	  
		
		<?php
			//permintaan mati
			$mati = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_mati an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($mati)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Keterangan Mati</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai mati
		?>	   
		
		<?php
			//permintaan ps
			$ps = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_ps an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($ps)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Pengantar SKCK</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai ps
		?>	  
		
		<?php
			//permintaan rumahsakit
			$rumahsakit = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_rumahsakit an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($rumahsakit)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Rumah Sakit</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai rumahsakit
		?>	 
		
		<?php
			//permintaan sekolah
			$sekolah = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_sekolah an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($sekolah)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Sekolah</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai sekolah
		?>	 
		
		<?php
			//permintaan serbaguna
			$serbaguna = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_serbaguna an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($serbaguna)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Serbaguna</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai serbaguna
		?>	
		
		<?php
			//permintaan waris
			$waris = mysql_query("select dp.nik,dp.nama,dp.alamat,an.status,an.dibuat_oleh, DATE_FORMAT(an.tgl_dibuat,'%d') as tgl_dibuat 
										from data_penduduk dp, permintaan_waris an
										where an.nik=dp.nik and DATE_FORMAT(an.tgl_dibuat,'%d') = DAY(NOW())    
										order by an.tgl_dibuat desc");
			$no = $no;
			while ($row = mysql_fetch_array($waris)) {
			if($row['status']=='0'){
				$row['status']='Masih Dalam Proses';?>  				
				<div class="proses">			
			<?php }else{ ?>			
				<div class="selesai">
				<?php $row['status']='Sudah Diproses'; }
			
			echo $no; ?>
				<p><?php echo $row['nik']?></p>
				<p><h3><?php echo $row['nama']?></h3></p>
				<address><?php echo $row['alamat']?></address>
				<p>Surat Permintaan Waris</p>	
				<p>"<?php echo $row['status']?>"</p>
				<p>Petugas : <?php echo $row['dibuat_oleh']?></p>		
			</div>
		<?php
			
			$no++;
			}
			//selesai waris
		?>	       

        </div>

    </div>  
`	
	
	
	
	<div id="footer" class="navbar navbar-fixed-bottom">
      <div class="container">
        <div class="row">
          <div class="span12">
		  <table>
			<tr>
				<td><div id="biru">&nbsp;</td>
				<td>&nbsp;:&nbsp;</td>
				<td>Antrian</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><div id="kuning">&nbsp;</td>
				<td>&nbsp;:&nbsp;</td>
				<td>Dalam Proses</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td><div id="hijau">&nbsp;</td>
				<td>&nbsp;:&nbsp;</td>
				<td>Sudah disetujui</td>
			</tr>
		  </table>
						
            <h5>Sistem Informasi Manajemen Kelurahan Pemerintah Kota Cimahi 2014
            </h5>
          </div>
        </div>
      </div>
    </div>
	

    <script src="../assets/js/jquery-1.9.1.min.js"></script> 
    <script src="../owl-carousel/owl.carousel.js"></script>

    <!-- Demo -->

    <style>
	#biru {
		width: 30px;
		height: 20px;
		background: #3498db;
	}
	
	#kuning {
		width: 30px;
		height: 20px;
		background: #D2FF4C;
	}
	
	#hijau {
		width: 30px;
		height: 20px;
		background: #3fbf79;
	}
    #owl-demo .proses{
        background: #3498db;
        padding: 25px 0px;
        margin: 5px;
        color: #FFF;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        text-align: center;
		-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }
	#owl-demo .selesai{
        background: #3fbf79;
        padding: 25px 0px;
        margin: 5px;
        color: #FFF;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        text-align: center;
		-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }
	 {
	background: #3fbf79;
	}
    </style>

    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
		items : 3,
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
