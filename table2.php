<?php include "koneksi.php";
	include "selisih.php" ;
?>
 <?php date_default_timezone_set('Asia/Jakarta'); ?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript">
	$.fn.infiniteScrollUp=function(){
		var self=this,kids=self.children()
		kids.slice(20).hide()
		setInterval(function(){
			kids.filter(':hidden').eq(0).slideDown()
			kids.eq(0).slideUp(function(){
				$(this).appendTo(self)
				kids=self.children()
			})
		},5000)
		return this
	}
	function cvt(s){
		return function(){
			return $(s).html( $(this).html())
		}
	}
	$(function(){
		$('tbody').replaceWith(cvt('<section/>'))
		$('tr').replaceWith(cvt('<div />'))
		$('td').replaceWith(cvt('<span/>'))
		$('th').replaceWith(cvt('<b/>'))
		$('section').infiniteScrollUp()
	})
	</script>
	<title>infiniteScrollUp2</title>
	<style type="text/css">
	span,b
	{
		width: 12.05em;
		display: inline-block;
		background-color: #FDFDFF;
		text-align: center;
		line-height:40px;
		color : #020202;
		border-bottom: 1px solid #C9B8AD;
		border-top: 1px solid #C9B8AD;
	}
	
	b
	{
		margin-top: 60px;
		width: 12.05em;
		display: inline-block;
		background-color: #020202;
		color : #ECECFB;
		text-align: center;
	}

	
	.biru {				
				background: #3498db !important;
				color: #FDFDFF;
				font-style: bold;
			}
			
	 .kuning {				
				background: #FF9326 !important;
				font-style: bold;
				color: #FDFDFF;
			}
			
	 .hijau {				
				background: #6E9E4B !important;
				font-style: bold;
				color: #FDFDFF;
				
			}
</style>

</head>
<body>

<?php
			//andonikah
			$waktu_sekarang = date("H:i:s");
			$handonnikah = mysql_query("select an.waktu_antrian,dp.nik,dp.nama,dp.alamat,an.no_registrasi, an.status, an.waktu_antrian, an.antrian_oleh,an.proses_oleh, di.nama_pengguna as nama_pegawai, an.waktu_proses,an.waktu_selesai, DATE_FORMAT(an.tanggal_surat,'%d') as tanggal_surat 
											from data_penduduk dp, permintaan_andonnikah an,pengguna p, data_pegawai di
											where an.nik=dp.nik 
											and p.id_data_pegawai = di.id_data_pegawai
											and (an.antrian_oleh = p.id_pengguna or an.proses_oleh = p.id_pengguna) 
											 				
											order by an.no_registrasi desc ") or die (mysql_error());
											
			//sekolah
			$sekolah = mysql_query("select an.waktu_antrian,dp.nik,dp.nama,dp.alamat,an.no_registrasi, an.status, an.waktu_antrian, an.antrian_oleh,an.proses_oleh, di.nama_pengguna as nama_pegawai, an.waktu_proses,an.waktu_selesai, DATE_FORMAT(an.tanggal_surat,'%d') as tanggal_surat 
											from data_penduduk dp, permintaan_sekolah an,pengguna p, data_pegawai di
											where an.nik=dp.nik 
											and p.id_data_pegawai = di.id_data_pegawai
											and (an.antrian_oleh = p.id_pengguna or an.proses_oleh = p.id_pengguna) 
											 				
											order by an.no_registrasi desc") or die (mysql_error());
			$no = 1;
				
			
?> 


<table border="0" width="100%">
<colgroup><col /><col /><col /><col /><col /><col /></colgroup>
<thead>
<tr><th>No Registrasi</th><th>Nama</th><th>Keperluan</th><th>Petugas</th><th>Status</th><th>Sudah Menunggu</th></tr>
</thead>
<tbody>
<?php while ($row = mysql_fetch_array($handonnikah) or die (mysql_error())) {
	if($row['status']=='1'){ 
				$row['status']="<p class='biru'>Masuk Antrian</p>";
				$waktu ="Waktu Antri: ". $row['waktu_antrian'];
				$oleh ="Petugas : ". $row['nama_pegawai'];
				$lama = "" .selisih($row['waktu_antrian'],$waktu_sekarang)."";	
				$kelas="biru";
				?>  				
				<div class="biru">			
			<?php }else if($row['status']=='2'){ ?>			
				<div class="kuning">
				<?php $row['status']="<p class='kuning'>Masih dalam proses</p>";
						$waktu = "Waktu Proses: ". $row['waktu_proses'];
						$oleh ="Petugas : ". $row['nama_pegawai'];
						$lama = "" .selisih($row['waktu_antrian'],$waktu_sekarang)."";	
						$kelas="kuning";
			?>
			<?php }else if($row['status']=='3'){ ?>	
					<div class="hijau">						
					<?php		$row['status']=" <p class='hijau'>Surat telah selesai </p>";	
								$waktu = "Waktu  selesai: ". $row['waktu_selesai']."";	
								$lama = $waktu;	
								$kelas="hijau";
					 }?>
	
	
<tr class="kuning"><td><?php echo $row['no_registrasi']?></td><td><?php echo $row['nama']?></td><td>Surat Andonnikah</td><td><?php echo $row['nama_pegawai']?></td><td><?php echo $row['status']?></td><td><?php echo $lama?></td></tr>
<?php
			$no++;
		}
		?>	
		
<?php //sekolah
	while ($rsekolah = mysql_fetch_array($sekolah) or die (mysql_error())) {
	if($rsekolah['status']=='1'){ 
				$rsekolah['status']="<p class='biru'>Masuk Antrian</p>";
				$waktu ="Waktu Antri: ". $rsekolah['waktu_antrian'];
				$oleh ="Petugas : ". $rsekolah['nama_pegawai'];
				$lama = "" .selisih($rsekolah['waktu_antrian'],$waktu_sekarang)."";	
				$kelas="biru";
				?>  				
				<div class="biru">			
			<?php }else if($rsekolah['status']=='2'){ ?>			
				<div class="kuning">
				<?php $rsekolah['status']="<p class='kuning'>Masih dalam proses</p>";
						$waktu = "Waktu Proses: ". $rsekolah['waktu_proses'];
						$oleh ="Petugas : ". $rsekolah['nama_pegawai'];
						$lama = "" .selisih($rsekolah['waktu_antrian'],$waktu_sekarang)."";	
						$kelas="kuning";
			?>
			<?php }else if($rsekolah['status']=='3'){ ?>	
					<div class="hijau">						
					<?php		$rsekolah['status']=" <p class='hijau'>Surat telah selesai </p>";	
								$waktu = "Waktu  selesai: ". $rsekolah['waktu_selesai']."";	
								$lama = $waktu;	
								$kelas="hijau";
					 }?>
	
	
<tr class="kuning"><td><?php echo $rsekolah['no_registrasi']?></td><td><?php echo $rsekolah['nama']?></td><td>Surat Sekolah</td><td><?php echo $rsekolah['nama_pegawai']?></td><td><?php echo $rsekolah['status']?></td><td><?php echo $lama?></td></tr>
<?php
			$no++;
		}
		?>	

		
		
		
</tbody>
</table>
</body>
</html>
