<?php include "koneksi.php" ?>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="../assets/css/bootstrapTheme.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">	
    <link href="../assets/css/table.css" rel="stylesheet">	
	

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
<style>
			.biru {				
				background: #3498db !important;
				border: 3px solid #0086B3;
				color: #DDDDDD;
			}
			
			.kuning {				
				background: #FF9326 !important;
				border: 3px solid #FF8000;
				color: #DDDDDD;
			}
			
			.hijau {				
				background: #3fbf79 !important;
				border: 3px solid #00B32D;
				color: #DDDDDD;
				
			}
</style>

<?php
			//andonikah
			
			$handonnikah = mysql_query("select dp.nik,dp.nama,dp.alamat,an.no_registrasi, an.status, an.waktu_antrian, an.antrian_oleh,an.proses_oleh, di.nama_pengguna as nama_pegawai, an.waktu_proses,an.waktu_selesai, DATE_FORMAT(an.tanggal_surat,'%d') as tanggal_surat 
				from data_penduduk dp, permintaan_andonnikah an,pengguna p, data_pegawai di
				where an.nik=dp.nik 
                        and p.id_data_pegawai = di.id_data_pegawai
				and (an.antrian_oleh = p.id_pengguna
					or an.proses_oleh = p.id_pengguna)
					
					order by an.no_registrasi desc") or die (mysql_error());
			$no = 1;
				
			
			?> 
	<h2>Surat Permintaan Andon Nikah</h2>
	<table border=1>
	<thead>
		<th>No</th>
		<th>No Registrasi</th>
		<th>Nik</th>
		<th>Nama</th>	
		<th>Petugas</th>
		<th>Status</th>
		<th>Lama Menunggu</th>
	</thead>
	<?php while ($row = mysql_fetch_array($handonnikah) or die (mysql_error())) {?>
			
			<?php if($row['status']=='1'){ ?>
					
					<?php
						$kelas='biru';
						$row['status']='Masuk Antrian';
						$waktu ="Waktu Antri: ". $row['waktu_antrian'];
						$oleh ="Petugas : ". $row['nama_pegawai'];
					?>  
					<?php }else if($row['status']=='2'){
						$kelas='kuning';
						$row['status']='Masih dalam proses';
						$waktu = "Waktu Proses: ". $row['waktu_proses'];
						$oleh ="Petugas : ". $row['nama_pegawai'];
					
					?>
						
				<?php }else if($row['status']=='3'){ 
							$kelas='hijau';
							$row['status']='Surat telah selesai';	
								$waktu = "Waktu  selesai: ". $row['waktu_selesai'];					
					 }?>
	<tbody>
	<tr class="<?php echo $kelas;?>">
		<td><?php echo $no?></td>
		<td><?php echo $row['no_registrasi']?></td>
		<td><?php echo $row['nik']?></td>
		<td><?php echo $row['nama']?></td>		
		<td><?php echo $row['nama_pegawai']?></td>
		<td><?php echo $row['status']?></td>
		<td>Lama Menunggu</td>
	</tr>
	</tbody>
	
	<?php
			$no++;
		}
		?>	

</table>					 
		
  <script src="../assets/js/jquery-1.9.1.min.js"></script> 
    <script src="../owl-carousel/owl.carousel.js"></script>				  <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
		items : 5,
		autoPlay: true
      });
    });

    </script>
					
					
					
					
					
					
					