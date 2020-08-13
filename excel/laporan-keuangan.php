<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					
					
					
					<h3 class="panel-title"><strong>Laporan Keuangan</strong></h3>
					
					 
					
					                                              
				</div>
				<div class="panel-body">
				<div class="table-responsive">
					<table class="table datatable table-bordered" border='1'>
						<thead>
							<tr>
								<th>No</th>
								<th>TANGGAL</th>
								<th>KETERANGAN</th>
								<th>MASUK</th>
								<th>KELUAR</th>
							</tr>
						
						<?php 
							if(!isset($_GET['bulan']) || !isset($_GET['tahun'])){
								echo "<tr class='danger'>
										<td colspan='5' align='center'>Pilih Bulan dan Tahun terlebih dahulu</td>
									  </tr>";
							}else{
								$id_toko  = $_SESSION['alpokat']['id_toko'];
								$awal_bulan = strtotime($_GET['tahun']."-".$_GET['bulan']."-01");
								
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
							<tr class='success'>
								<td colspan="3" align="right"><strong>Saldo Bulan Lalu</strong></td>
								<td colspan="2" align="right"><strong><?php echo rupiah($tsisa) ?></strong></td>
								
							</tr>
						
						</thead>
						<tbody>
						
						<?php
						$no = 1;
						$id_toko  = $_SESSION['alpokat']['id_toko'];
						$sql = mysql_query("SELECT * FROM keuangan WHERE 
														  id_toko='$id_toko' AND
														  MONTH(tanggal)='$_GET[bulan]' AND
														  YEAR(tanggal)='$_GET[tahun]'
														  ORDER BY last_update DESC");
						while($r= mysql_fetch_array($sql)){
						
							if($r['mk']=="0"){
								$masuk  = "<td align='center'>-</td>";
								$keluar = "<td align='right'>".rupiah($r['jumlah'])."</td>";
							}else{
								$keluar = "<td align='center'>-</td>";
								$masuk 	= "<td align='right'>".rupiah($r['jumlah'])."</td>";
							}
							
							
							echo "	<tr>
										<td>$no</td>
										<td>".tgl_indo($r['tanggal'])."</td>
										<td>$r[keterangan]</td>
										$masuk
										$keluar
									</tr>";
							$no++;
						}
							
						$j  = mysql_query("SELECT SUM(jumlah) as jumlah FROM keuangan WHERE 
																			 id_toko='$id_toko' AND 
																			 mk=0 AND
																			 month(tanggal)='$_GET[bulan]' and
																			 year(tanggal)='$_GET[tahun]'
																			 ");
						$jk = mysql_fetch_assoc($j);	
						$x  = mysql_query("SELECT SUM(jumlah) as jumlah FROM keuangan WHERE 
																			 id_toko='$id_toko' AND 
																			 mk=1 AND
																			 month(tanggal)='$_GET[bulan]' and
																			 year(tanggal)='$_GET[tahun]'
																			 ");
						$xm = mysql_fetch_assoc($x);
						$i = $_GET['bulan'];
						$saldo = "Saldo Bulan ini Rp. ".rupiah($xm['jumlah'])." - Rp. ".rupiah($jk['jumlah'])."
						= <strong>Rp ".rupiah($xm['jumlah']-$jk['jumlah'])."</strong> + Rp. ".rupiah($tsisa). 
						" (saldo bulan lalu) = <strong>Rp. ".rupiah($xm['jumlah'] - $jk['jumlah'] + $tsisa)."</strong>";
						?>	
						</tbody>
							<tr class='success'>
								<td colspan="3"><?php echo($saldo) ?></td>
								<td align="right"><strong><?php echo rupiah($xm['jumlah']) ?></strong></td>
								<td align="right"><strong><?php echo rupiah($jk['jumlah']) ?></strong></td>
								
							</tr>
						<?php } ?>
					</table>
					</div>
				</div>
			</div>
			<!-- END DEFAULT DATATABLE -->
			