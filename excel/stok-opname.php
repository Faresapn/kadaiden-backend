<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">


			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title"><strong>Data Stok Opname</strong></h3>                               
				</div>
				<div class="panel-body">
				<div class="table-responsive">
					<table class="table datatable table-bordered" border='1'>
						<thead>
							<tr>
								<th>No</th>
								<th>NAMA PRODUK</th>
								<th>KATEGORI</th>
								<th>STOK</th>
								<th>KEMASAN</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$id_toko  = $_SESSION['alpokat']['id_toko'];
						$sql = mysql_query("SELECT * FROM produk WHERE id_toko='$id_toko' ORDER BY nama_produk DESC");
						while($r= mysql_fetch_array($sql)){
							
							$c = mysql_query("SELECT * FROM kategori WHERE id_kategori='$r[id_kategori]'");
							$d = mysql_fetch_array($c);
							$e = mysql_query("SELECT * FROM kemasan WHERE id_kemasan='$r[id_kemasan]'");
							$f = mysql_fetch_array($e);
							
							$x = mysql_query("SELECT sum(jumlah) as j FROM transaksi WHERE 
																		   id_toko='$id_toko' and
																		   id_produk='$r[id_produk]' and
																		   mk=0
																		   ");
							$y = mysql_fetch_assoc($x);
							$m = $y['j'];
							$x = mysql_query("SELECT sum(jumlah) as j FROM transaksi WHERE 
																		   id_toko='$id_toko' and
																		   id_produk='$r[id_produk]' and
																		   mk=1
																		   ");
							$y = mysql_fetch_assoc($x);
							$k = $y['j'];
							
							$stok = $m - $k;
							
							echo "	<tr>
										<td>$no</td>
										<td>$r[nama_produk]</td>
										<td>$d[nama_kategori]</td>
										<td align='right'>$stok</td>
										<td>$f[nama_kemasan]</td>
									</tr>";
							$no++;
						}
						?>	
						</tbody>
					</table>
					</div>
				</div>
			</div>
			<!-- END DEFAULT DATATABLE -->

		</div>
	</div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->      
