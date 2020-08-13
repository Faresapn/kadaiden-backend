
<style> .str{ mso-number-format:\@; } </style>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title">Data Produk</h3>                            
				</div>
				<div class="panel-body">
				<div class="table-responsive">
					<table class="table datatable table-bordered" border='1'>
						<thead>
							<tr>
								<th>No</th>
								<th>NAMA PRODUK</th>
								<th>KEMASAN</th>
								<th>KATEGORI</th>
								<th>SKU</th>
								<th>BARCODE</th>
								<th>HARGA MODAL</th>
								<th>HARGA JUAL</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$id_toko  = $_SESSION['alpokat']['id_toko'];
						$sql = mysql_query("SELECT * FROM produk WHERE id_toko='$id_toko'");
						while($r= mysql_fetch_array($sql)){
							
							$a = mysql_query("SELECT * FROM kategori WHERE id_kategori='$r[id_kategori]'");
							$b = mysql_fetch_array($a);
							$c = mysql_query("SELECT * FROM kemasan WHERE id_kemasan='$r[id_kemasan]'");
							$d = mysql_fetch_array($c);
							
							echo "	<tr>
										<td>$no</td>
										<td>$r[nama_produk]</td>
										<td>$d[nama_kemasan]</td>
										<td>$b[nama_kategori]</td>
										<td>$r[sku]</td>
										<td>$r[barcode]</td>
										<td>$r[harga_modal]</td>
										<td>$r[harga_jual]</td>
										
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
