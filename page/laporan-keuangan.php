<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					
					
					
					<h3 class="panel-title"><strong>Laporan Keuangan</strong></h3>
					<form class="form-horizontal" action="" method="GET">
					<input type="hidden" name='page' value='laporan-keuangan'>
					<div class="form-group">  

						<div class="col-md-2">
							<select name='bulan' class="form-control" required>
								<?php 
								$n_bulan = array("Pilih Bulan","Januari","Februari","Maret","April","Mei","Juni",
											   "Juli","Agustus","Sepetember","Oktober","November","Desember");
								$v_bulan = array("","01","02","03","04","05","06","07","08","09","10","11","12");

								for($i = 0; $i<13; $i++){
									if(isset($_GET['bulan'])){
										if($_GET['bulan']==$v_bulan[$i]){
											$a = "selected";
										}else{
											$a = "";
										}
									}
									echo "<option $a value='$v_bulan[$i]'>$n_bulan[$i]</option>";
								}
								?>

							</select>
						</div>

						<div class="col-md-2">
							<select name='tahun' class="form-control" required>
								<?php
								$n_tahun = array("Pilih Tahun","2018","2019","2020","2021","2022");
								$v_tahun = array("","2018","2019","2020","2021","2022");
								for($i = 0; $i<6; $i++){
									if(isset($_GET['tahun'])){
										if($_GET['tahun']==$v_tahun[$i]){
											$a = "selected";
										}else{
											$a = "";
										}
									}
									echo "<option $a value='$v_tahun[$i]'>$n_tahun[$i]</option>";
								}
								?>
							</select>
						</div>

						<div class="col-md-2">
							<button type="submit" class="btn btn-success ">Lihat</button>
						</div>


					</div>
					</form>
					 
					
					                                              
				</div>
				<div class="panel-body">
				<div class="table-responsive">
					<table class="table datatable table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>TANGGAL</th>
								<th>KETERANGAN</th>
								<th>MASUK</th>
								<th>KELUAR</th>
								<th>Aksi</th>
							</tr>
						
						<?php 
							if(!isset($_GET['bulan']) || !isset($_GET['tahun'])){
								echo "<tr class='danger'>
										<td colspan='6' align='center'>Pilih Bulan dan Tahun terlebih dahulu</td>
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
								<td colspan="3" align="right"><strong><?php echo rupiah($tsisa) ?></strong></td>
								
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
							
							$delete = "";
							if($r['input_from']=="neraca"){
								$delete = "<a onclick='return konfirmasi()' href='action/hapus.php?page=neraca-keuangan&id=$r[id_transaksi]' >
										   <button class='btn btn-danger btn-rounded btn-sm'><span class='fa fa-times'></span></button>
										   </a>";
							}
							
							echo "	<tr>
										<td>$no</td>
										<td>".tgl_indo($r['tanggal'])."</td>
										<td>$r[keterangan]</td>
										$masuk
										$keluar
										<td>$delete</td>
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
								<td></td>
							</tr>
						<?php } ?>
					</table>
					<?php
					$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					$actual      = str_replace("/?page","/export.php?page", $actual_link);
					$actual      = str_replace("/index.php?page","/export.php?page", $actual);
					
					echo "<a href='$actual'>
						<button class='btn btn-success'><span class='fa fa-file-excel-o'></span> Export ke Excel</button>
					      </a>";
					?> 
					</div>
				</div>
			</div>
			<!-- END DEFAULT DATATABLE -->
			
			<form class="form-horizontal" action="action/simpan.php?page=neraca-keuangan" method="POST">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Tambah Transaksi Keuangan</strong></h3>
					<ul class="panel-controls">
					</ul>
				</div>

				<div class="panel-body">                                                                        

					<div class="row">
                                           
                        <div class="form-group">                                        
							<label class="col-md-2 control-label">Tanggal</label>
							<div class="col-md-7">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
									<input type="text" class="form-control datepicker" value="<?php echo $tgl ?>" name="tanggal" required/>       
								</div>
							</div>
						</div>
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Keterangan</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-list"></span></span>
									
									<input type="text" name="keterangan" class="form-control" required/>
									
									
								</div>                                            
							</div>
						</div>
                                           
                        <div class="form-group">
							<label class="col-md-2 control-label">Jumlah</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon">Rp</span>
									<input type="text" name="jumlah" class="form-control" required/>
								</div>                                            
							</div>
						</div>
                                           
                        <div class="form-group">
							<label class="col-md-2 control-label">Keluar/Masuk</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<label class="radio-inline"><input type="radio" name="mk" value="1">Masuk</label>
									<label class="radio-inline"><input type="radio" name="mk" value="0">Keluar</label>
								</div>                                            
							</div>
						</div>
                                            
						
						
					</div>

				</div>
				<div class="panel-footer">
					<button type="reset" class="btn btn-default">Clear Form</button>                                    
					<button type="submit" class="btn btn-primary pull-right">Submit</button>
				</div>
			</div>
			</form>

		</div>
	</div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->      
