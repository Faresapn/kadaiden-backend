                    
                
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

	<!-- START WIDGETS -->                    
	<div class="row">
	
		<div class="col-md-12">

			<!-- START WIDGET SLIDER -->
			<div class="widget widget-default widget-carousel">
				<div class="owl-carousel" id="owl-example">
					<div>                                    
						<div class="widget-title">Selamat Datang Kembali</div>
						<div class="widget-subtitle"><?php echo $_SESSION['alpokat']['nama'] ?></div>
						<div class="widget-int"><?php echo $_SESSION['alpokat']['nama_toko'] ?></div>
					</div>
					<div>                                    
						<div class="widget-title">Selamat Datang Kembali</div>
						<div class="widget-subtitle"><?php echo $_SESSION['alpokat']['nama'] ?></div>
						<div class="widget-int"><?php echo $_SESSION['alpokat']['nama_toko'] ?></div>
					</div>
				</div>                            
				                          
			</div>         
			<!-- END WIDGET SLIDER -->

		</div>
		
		
<div class="col-md-3">

	<!-- START WIDGET SLIDER -->
	<div class="widget widget-default widget-carousel">
		<div class="owl-carousel" id="owl-example">
			<?php
			$bln = date("m");
			$thn = date("Y");
			$id_toko  = $_SESSION['alpokat']['id_toko'];
			$y = mysql_query("SELECT DISTINCT no_faktur,tanggal FROM transaksi WHERE 
											month(tanggal)='$bln' AND
											year(tanggal)='$thn' AND
											mk = 1 AND
											id_toko='$id_toko'");
			$y1 = mysql_num_rows($y);
			?>
			<div>                                    
				<div class="widget-title">Jumlah Transaksi</div>                                                                        
				<div class="widget-subtitle">Bulan ini</div>
				<div class="widget-int"><?php echo $y1 ?></div>
			</div>
			
			<?php
			$c = mysql_query("SELECT SUM(total) as t FROM transaksi WHERE 
									id_toko='$id_toko' AND 
									month(tanggal)='$bln' AND
									year(tanggal)='$thn' AND
									no_faktur<>'' ");
			$d = mysql_fetch_assoc($c);
			?>
			
			<div>                                    
				<div class="widget-title">Total Penjualan</div>
				<div class="widget-subtitle">Bulan ini</div>
				<div class="widget-int">Rp. <?php echo rupiah($d['t']) ?> </div>
			</div>
			
		</div>                            
	</div>         
	<!-- END WIDGET SLIDER -->

</div>
<div class="col-md-3">

	<!-- START WIDGET MESSAGES -->
	<div class="widget widget-default widget-item-icon" onclick="location.href='?page=produk';">
		<div class="widget-item-left">
			<span class="glyphicon glyphicon-shopping-cart"></span>
		</div>
		
		<?php
			$id_toko  = $_SESSION['alpokat']['id_toko'];
			$y = mysql_query("SELECT DISTINCT no_faktur,tanggal FROM transaksi WHERE 
											tanggal='$tgl' AND
											mk = 1 AND
											id_toko='$id_toko'");
			$y1 = mysql_num_rows($y);
		?>                             
		<div class="widget-data">
			<div class="widget-int num-count"><?php echo $y1 ?></div>
			<div class="widget-title">TRANSAKSI</div>
			<div class="widget-subtitle">Pada hari ini</div>
		</div>      
		
	</div>                            
	<!-- END WIDGET MESSAGES -->

</div>

<div class="col-md-3">

	<!-- START WIDGET REGISTRED -->
	<div class="widget widget-default widget-item-icon" onclick="location.href='?page=pelanggan';">
		<div class="widget-item-left">
			<span class="fa fa-user"></span>
		</div>
		
		<?php
		$y = mysql_query("SELECT * FROM pelanggan WHERE id_toko='$id_toko'");
		$y1 = mysql_num_rows($y);
		?>
		<div class="widget-data">
			<div class="widget-int num-count"><?php echo $y1 ?></div>
			<div class="widget-title">Pelanggan <br> Terdaftar</div>
		</div>                           
	</div>                            
	<!-- END WIDGET REGISTRED -->

</div>

<div class="col-md-3">
	<!-- START WIDGET REGISTRED -->
	<div class="widget widget-default widget-item-icon" onclick="location.href='?page=produk';">
		<div class="widget-item-left">
			<span class="glyphicon glyphicon-th"></span>
		</div>
		
		<?php
		$y = mysql_query("SELECT * FROM produk WHERE id_toko='$id_toko'");
		$y1 = mysql_num_rows($y);
		?>
		
		<div class="widget-data">
			<div class="widget-int num-count"><?php echo $y1 ?></div>
			<div class="widget-title">Produk <br> Terdaftar</div>
		</div>                           
	</div>                            
	<!-- END WIDGET REGISTRED -->
</div>


<?php

$j  = mysql_query("SELECT SUM(jumlah) as jumlah FROM keuangan WHERE 
						id_toko='$id_toko' AND 
						mk=0 AND
						month(tanggal)='$bln' and
						year(tanggal)='$thn'
						");
$jk = mysql_fetch_assoc($j);	

$x  = mysql_query("SELECT SUM(jumlah) as jumlah FROM keuangan WHERE 
						id_toko='$id_toko' AND 
						mk=1 AND
						month(tanggal)='$bln' and
						year(tanggal)='$thn'
						");
$xm = mysql_fetch_assoc($x);


$saldo1 = $xm['jumlah']-$jk['jumlah'];
$xsaldo = rupiah($xm['jumlah']-$jk['jumlah']);
$umasuk = rupiah($xm['jumlah']);
$ukeluar= rupiah($jk['jumlah']);

?>


<div class="col-md-3">
	<!-- START WIDGET REGISTRED -->
	<div class="widget widget-default">
		<div class="owl-carousel" id="owl-example">
			<div>                                    
				<div class="widget-title">Saldo</div>
				<div class="widget-subtitle">Bulan ini</div>
				<div class="widget-int">Rp. <?php echo $xsaldo ?></div>
			</div>
			
		</div>                                
	</div>                          
	<!-- END WIDGET REGISTRED -->
</div>

<div class="col-md-3">
	<!-- START WIDGET REGISTRED -->
	<div class="widget widget-default">
		<div class="owl-carousel" id="owl-example">
			<div>                                    
				<div class="widget-title">Total Pemasukan</div>
				<div class="widget-subtitle">Bulan ini</div>
				<div class="widget-int">Rp. <?php echo $umasuk ?></div>
			</div>
			
		</div>                             
	</div>                          
	<!-- END WIDGET REGISTRED -->
</div>

<div class="col-md-3">
	<!-- START WIDGET REGISTRED -->
	<div class="widget widget-default">
		<div class="owl-carousel" id="owl-example">
			<div>                                    
				<div class="widget-title">Total Pengeluaran</div>
				<div class="widget-subtitle">Bulan ini</div>
				<div class="widget-int">Rp. <?php echo $ukeluar ?></div>
			</div>
			
		</div>                               
	</div>                          
	<!-- END WIDGET REGISTRED -->
</div>

<?php

	$awal_bulan = strtotime($thn."-".$bln."-01");
	
	$sql = mysql_query("SELECT * FROM keuangan WHERE id_toko='$id_toko' AND mk='0'");
	$t_keluar = 0;
	while($x = mysql_fetch_array($sql)){
		$tang = strtotime($x['tanggal']);
		if($tang < $awal_bulan){
			$t_keluar = $t_keluar + $x['jumlah'];
		}
	}
	$sql = mysql_query("SELECT * FROM keuangan WHERE id_toko='$id_toko' AND mk='1'");
	$t_masuk = 0;
	while($x = mysql_fetch_array($sql)){
		$tang = strtotime($x['tanggal']);
		if($tang < $awal_bulan){
			$t_masuk = $t_masuk + $x['jumlah'];
		}
	}
	
	$tsisa = $t_masuk - $t_keluar;
?>		
<div class="col-md-3">
	<!-- START WIDGET SLIDER -->
	<div class="widget widget-default widget-carousel">
		<div class="owl-carousel" id="owl-example">
		
			<div>                                    
				<div class="widget-title">Akumulasi Margin</div>
				<div class="widget-subtitle">Saat ini</div>
				<div class="widget-int">Rp. <?php echo rupiah($saldo1 + $tsisa) ?></div>
			</div>
			<div>                                    
				<div class="widget-title">Saldo Bulan Lalu</div>    
				<div class="widget-int">Rp. <?php echo rupiah($tsisa) ?></div>
			</div>		
			
		</div>                            
	</div>         
	<!-- END WIDGET SLIDER -->
</div>	
	
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			
			<div class="panel-body">
						
				<canvas id="line-chart" width="100%" height="80"></canvas>
		
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			
			<div class="panel-body">
						
				<canvas id="bar-chart-horizontal" width="100%" height="80"></canvas>
		
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			
			<div class="panel-body">
						
				<canvas id="bar-chart-horizontal-pelanggan" width="100%" height="80"></canvas>
		
			</div>
		</div>
	</div>
</div>



	

</div>

<!-- END PAGE CONTENT WRAPPER -->   
                          
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>



<script type="text/javascript">
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'],
    datasets: [{ 
        data: [
        
        <?php
        	$pen = "";
		for ($i = 1; $i <= 12; $i++) {
			if($i < 10){
				$w = "0".$i;
			}else{
				$w = $i;
			}
			if($i == 12){
				$div = "";
			}else{
				$div = ",";
			}
			$x  = mysql_query("SELECT SUM(jumlah) as jumlah FROM keuangan WHERE 
									id_toko='$id_toko' AND 
									mk=1 AND
									month(tanggal)='$w' and
									year(tanggal)='$thn'
									");
			$xm = mysql_fetch_assoc($x);
			$umasuk = $xm['jumlah']/1000;
			$pen = $pen.$umasuk.$div;
		}
		echo $pen;
	 
	     
	?>
	
       
        
        ],
        label: "Pemasukan (x1000) ",
        borderColor: "#00e64d",
        fill: false
      }, { 
        data: [
        
        <?php
        	$peng = "";
		for ($i = 1; $i <= 12; $i++) {
			if($i < 10){
				$w = "0".$i;
			}else{
				$w = $i;
			}
			if($i == 12){
				$div = "";
			}else{
				$div = ",";
			}	
        		$j  = mysql_query("SELECT SUM(jumlah) as jumlah FROM keuangan WHERE 
									id_toko='$id_toko' AND 
									mk=0 AND
									month(tanggal)='$w' and
									year(tanggal)='$thn'
									");
			$jk = mysql_fetch_assoc($j);
			$ukeluar= $jk['jumlah']/1000;
			$peng = $peng.$ukeluar.$div;
		}
		echo $peng;
        
        ?>
        
        
        ],
        label: "Pengeluaran (x1000) ",
        borderColor: "#ff0000",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Pemasukan vs pengeluaran di tahun <?php echo date('Y') ?>'
    }
  }
});



new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: [
      
<?php
	$x = mysql_query("SELECT * FROM produk WHERE id_toko='$id_toko'");
	while($r = mysql_fetch_array($x)){
		$id = $r['id_produk'];
		$a = mysql_query("SELECT SUM(total) as j FROM transaksi WHERE id_produk='$id' AND month(tanggal)='$bln' and year(tanggal)='$thn'");
		$b = mysql_fetch_assoc($a);
		
		$np = $r['nama_produk'];
		$pro[$np] = $b['j']/1;
	}
	arsort($pro);
	$n = 0;
	foreach($pro as $fnama => $fj) {
	    $nama_pro[$n] = $fnama;
	    $pro_j[$n] = $fj;
	    $n++;
	}
	
	$xnama = "";
	for ($i = 0; $i < 10; $i++) {
	
		if($nama_pro[$i]==""){
			$z = "-";
		}else{
			$z = $nama_pro[$i];
		}
		$xnama = $xnama."'".$z."',";
	}
	
	echo $xnama;
	
	$xjumlah = "";
	for ($i = 0; $i < 10; $i++) {
		if($pro_j[$i]==""){
			$z = 0;
		}else{
			$z = $pro_j[$i]/1000;
		}
		$xjumlah = $xjumlah."'".$z."',";
	}

	
?>    
      

      ],
      datasets: [
        {
          label: "Total (x1000)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [
          <?php echo $xjumlah ?>
          
          ]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: '10 Produk terlaku per bulan'
      }
    }
});


new Chart(document.getElementById("bar-chart-horizontal-pelanggan"), {
    type: 'horizontalBar',
    data: {
      labels: [
      
<?php
	$x = mysql_query("SELECT * FROM pelanggan WHERE id_toko='$id_toko'");
	while($r = mysql_fetch_array($x)){
		$id = $r['id_pelanggan'];
		$a = mysql_query("SELECT SUM(total) as j FROM transaksi WHERE id_pelanggan='$id'");
		$b = mysql_fetch_assoc($a);
		
		$np = $r['nama'];
		$jb[$np] = $b['j']/1;
	}
	arsort($jb);
	$n = 0;
	foreach($jb as $fpelanggan => $fbelanja) {
	    $nama_pelanggan[$n] = $fpelanggan;
	    $jumlah_belanja[$n] = $fbelanja;
	    $n++;
	}
	
	$xnama = "";
	for ($i = 0; $i < 10; $i++) {
	
		if($nama_pelanggan[$i]==""){
			$z = "-";
		}else{
			$z = $nama_pelanggan[$i];
		}
		$xnama = $xnama."'".$z."',";
	}
	
	echo $xnama;
	
	$xjumlah = "";
	for ($i = 0; $i < 10; $i++) {
		if($jumlah_belanja[$i]==""){
			$z = 0;
		}else{
			$z = $jumlah_belanja[$i]/1000;
		}
		$xjumlah = $xjumlah."'".$z."',";
	}

	
?>    
      

      ],
      datasets: [
        {
          label: "Total (x1000)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [
          <?php echo $xjumlah ?>
          
          ]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: '10 Besar pelanggan'
      }
    }
});

</script>