<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">


			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title"><strong>Data Produk Masuk (Pembelian Produk)</strong></h3>                               
				</div>
				<div class="panel-body">
					<table class="table datatable table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>TANGGAL</th>
								<th>NAMA PRODUK</th>
								<th>KATEGORI</th>
								<th>JUMLAH</th>
								<th>KEMASAN</th>
								<th>@ HARGA MODAL</th>
								<th>TOTAL</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$id_toko  = $_SESSION['alpokat']['id_toko'];
						$sql = mysql_query("SELECT * FROM transaksi WHERE id_toko='$id_toko' AND mk=0 ORDER BY last_update DESC");
						while($r= mysql_fetch_array($sql)){
							
							$a = mysql_query("SELECT * FROM produk WHERE id_produk='$r[id_produk]'");
							$b = mysql_fetch_array($a);
							$c = mysql_query("SELECT * FROM kategori WHERE id_kategori='$b[id_kategori]'");
							$d = mysql_fetch_array($c);
							$e = mysql_query("SELECT * FROM kemasan WHERE id_kemasan='$b[id_kemasan]'");
							$f = mysql_fetch_array($e);
							echo "	<tr>
										<td>$no</td>
										<td>".tgl_indo($r['tanggal'])."</td>
										<td>$b[nama_produk]</td>
										<td>$d[nama_kategori]</td>
										<td align='center'>$r[jumlah]</td>
										<td>$f[nama_kemasan]</td>
										<td align='right'>".rupiah($b['harga_modal'])."</td>
										<td align='right'>".rupiah($r['total'])."</td>
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
					</table>
				</div>
			</div>
			<!-- END DEFAULT DATATABLE -->
		
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
							<div class="col-md-7">
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
							<div class="col-md-2">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-suitcase"></span></span>
									<input type="text" id="nama_kemasan" name="kemasan" class="form-control" required/>
								</div>                                            
							</div>
							<div class="col-md-3">                                            
								<div class="input-group">
									<span class="input-group-addon"><span>@</span></span>
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
