<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					
<form class="form-horizontal" action="" method="GET">
	<input type="hidden" name='page' value='produk-masuk'>
	 
	
<div class="row">
		
    <div class="col-md-5 col-xs-12">
    	<h3 class="panel-title"><strong>Data Pembelian </strong></h3><br>
    </div>
    
    <div class="col-md-7">	
    	<div class="col-md-5">
		
		<div class="form-group">
			<label class="col-md-4 control-label">Dari</label>
			<div class="col-md-8">                                            
				<div class="input-group">
					<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
					<input type="text" class="form-control datepicker" value="<?php echo $_GET['dari'] ?>" name="dari" required/>       
				</div>                                           
			</div>
		</div>
	</div>
	
	<div class="col-md-5">
	
		<div class="form-group">
			<label class="col-md-4 control-label">Hingga</label>
			<div class="col-md-8">                                            
			    <div class="input-group">
				<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
				<input type="text" class="form-control datepicker" value="<?php echo $_GET['hingga'] ?>" name="hingga" required/>       
			    </div>                                           
			</div>
		</div>
		
		
	</div>
	
	<div class="col-md-2">
	    	
		<button type="submit" class="btn btn-success ">Lihat</button>
	
	    	
	</div>
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
								<th>NAMA PRODUK</th>
								<th>KATEGORI</th>
								<th>JUMLAH</th>
								<th>KEMASAN</th>
								<th>@ HARGA</th>
								<th>TOTAL</th>
								<th>AKSI</th>
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
														mk = 0 AND
														id_toko='$id_toko'");
						while($x= mysql_fetch_array($y)){
							
							$a = mysql_query("SELECT SUM(jumlah) as j FROM transaksi 
													WHERE 	id_produk='$x[0]' AND
															(tanggal BETWEEN '$_GET[dari]' AND '$_GET[hingga]') AND
															mk = 0 AND
															id_toko='$id_toko' ");
							$b = mysql_fetch_assoc($a);
							
							$c = mysql_query("SELECT * FROM produk WHERE id_produk='$x[0]'");
							$d = mysql_fetch_array($c);
							
							$e = mysql_query("SELECT * FROM kategori WHERE id_kategori='$d[id_kategori]'");
							$f = mysql_fetch_array($e);
							
							$g = mysql_query("SELECT * FROM kemasan WHERE id_kemasan='$d[id_kemasan]'");
							$h = mysql_fetch_array($g);
							
							$total = $d['harga_modal'] * $b['j'];
							$gtotal = $gtotal + $total;
							
							echo "	<tr>
										<td align='center'>$no</td>
										<td align='center'>".tgl_indo($x['tanggal'])."</td>
										<td>$d[nama_produk]</td>
										<td>$f[nama_kategori]</td>
										<td align='right'>$b[j]</td>
										<td>$h[nama_kemasan]</td>
										<td align='right'>".rupiah($d['harga_modal'])."</td>
										<td align='right'>".rupiah($total)."</td>
										<td>
											<a onclick='return konfirmasi()' href='action/hapus.php?page=produk-masuk&id=$r[id_transaksi]' >
											<button class='btn btn-danger btn-rounded btn-sm'><span class='fa fa-times'></span></button>
											</a>
										</td>
									</tr>";
							$no++;
							
						}
										   
						
						?>	
						</tbody>
						<tr class="success">
							<th colspan="6">Pembalian (Produk Masuk) dari tanggal (<?php echo tgl_indo($_GET['dari']) ?> - <?php echo tgl_indo($_GET['hingga']) ?>)</th>
							<th><strong class="pull-right">Grand Total</strong></th>
							<th><strong class="pull-right"><?php echo rupiah($gtotal) ?></strong></th>
							<th></th>
						</tr>
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
		
			<form class="form-horizontal" action="action/simpan.php?page=produk-masuk" method="POST">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Tambah Produk Masuk (Pembelian) </strong></h3>
					<ul class="panel-controls">
					</ul>
				</div>

				<div class="panel-body">                                                                        

					<div class="row">
                                           
                        <div class="form-group">                                        
							<label class="col-md-2 control-label">Tanggal</label>
							<div class="col-md-2">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
									<input type="text" class="form-control datepicker" value="<?php echo $tgl ?>" name="tanggal" required/>       
								</div>
							</div>
						</div>
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Produk</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-home"></span></span>
									
									<input type="text" name="nama_produk" id="nama_produk" class="form-control" required/>
									<input type="hidden" name="id_produk" id="id_produk" />
									
									
								</div>                                            
							</div>
						</div>
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Jumlah</label>
							<div class="col-md-2">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-sort-numeric-asc"></span></span>
									<input type="text" name="jumlah" class="form-control jumlah" required/>
								</div>                                            
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Kemasan</label>
							<div class="col-md-2">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-briefcase"></span></span>
									<input type="text" id="nama_kemasan" name="kemasan" class="form-control" required/>
								</div>                                            
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Harga Modal</label>
							<div class="col-md-2">                                            
								<div class="input-group">
									<span class="input-group-addon">Rp</span></span>
									<input type="text" id="modal" name="modal" class="form-control" required/>
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
		
			<!-- END DEFAULT DATATABLE -->

		</div>
	</div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->      
