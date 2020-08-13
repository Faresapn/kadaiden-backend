<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">


			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
<form class="form-horizontal" action="" method="GET">
	<input type="hidden" name='page' value='produk-terjual'>
	 
	
<div class="row">
		
    <div class="col-md-5 col-xs-12">
    	<h3 class="panel-title"><strong>Data Penjualan </strong></h3><br>
    </div>
    

    
    
</div>	
</form> 
				</div>
				<div class="panel-body">
				<div class="table-responsive">
					<table class="table datatable table-bordered" border='1'>
						<thead>
							<tr>
								<th>No</th>
								<th>TANGGAL</th>
								<th>NAMA PRODUK</th>
								<th>KATEGORI</th>
								<th>JUMLAH</th>
								<th>KEMASAN</th>
								<th>@ HARGA</th>
								<th>TOTAL</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$id_toko  = $_SESSION['alpokat']['id_toko'];
						$gtotal = 0;
							
						$y = mysql_query("SELECT DISTINCT 
														id_produk, 
														id_toko, 
														tanggal
												  FROM  
												  		transaksi
												  WHERE 
														(tanggal BETWEEN '$_GET[dari]' AND '$_GET[hingga]') AND
														mk = 1 AND
														id_toko='$id_toko'");
						while($x= mysql_fetch_array($y)){
							
							$a = mysql_query("SELECT SUM(jumlah) as j FROM transaksi 
													WHERE 	id_produk='$x[0]' AND
															(tanggal BETWEEN '$_GET[dari]' AND '$_GET[hingga]') AND
															mk = 1 AND
															id_toko='$id_toko' ");
							$b = mysql_fetch_assoc($a);
							
							$c = mysql_query("SELECT * FROM produk WHERE id_produk='$x[0]'");
							$d = mysql_fetch_array($c);
							
							$e = mysql_query("SELECT * FROM kategori WHERE id_kategori='$d[id_kategori]'");
							$f = mysql_fetch_array($e);
							
							$g = mysql_query("SELECT * FROM kemasan WHERE id_kemasan='$d[id_kemasan]'");
							$h = mysql_fetch_array($g);
							
							$total = $d['harga_jual'] * $b['j'];
							$gtotal = $gtotal + $total;
							
							echo "	<tr>
										<td align='center'>$no</td>
										<td align='center'>".tgl_indo($x['tanggal'])."</td>
										<td>$d[nama_produk]</td>
										<td>$f[nama_kategori]</td>
										<td align='right'>$b[j]</td>
										<td>$h[nama_kemasan]</td>
										<td align='right'>".rupiah($d['harga_jual'])."</td>
										<td align='right'>".rupiah($total)."</td>
										
									</tr>";
							$no++;
							
						}
										   
						
						?>	
						</tbody>
						<tr class="success">
							<th colspan="7">Penjualan dari tanggal (<?php echo tgl_indo($_GET['dari']) ?> - <?php echo tgl_indo($_GET['hingga']) ?>) <strong class="pull-right">Grand Total</strong></th>
							<th><strong class="pull-right"><?php echo rupiah($gtotal) ?></strong></th>
						</tr>
					</table>
					</div>
				</div>
			</div>

		</div>
	</div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->      
