<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title">Data Produk</h3>
					<ul class="panel-controls">
						<a href='?page=tambah-produk'><div class="pull-right">
						<button class="btn btn-success"><span class="fa fa-plus-square"></span> Tambah Produk</button>
						</a>
					</ul>                                
				</div>
				<div class="panel-body">
				<div class="table-responsive">
					<table class="table datatable table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Foto</th>
								<th>NAMA PRODUK</th>
								<th>KEMASAN</th>
								<th>KATEGORI</th>
								<th>SKU</th>
								<th>BARCODE</th>
								<th>HARGA MODAL</th>
								<th>HARGA JUAL</th>
								<th>Aksi</th>
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
										<td><img src='$hosting/foto_produk/$r[foto]' height='100'></td>
										<td>$r[nama_produk]</td>
										<td>$d[nama_kemasan]</td>
										<td>$b[nama_kategori]</td>
										<td>$r[sku]</td>
										<td>$r[barcode]</td>
										<td>".rupiah($r['harga_modal'])."</td>
										<td>".rupiah($r['harga_jual'])."</td>
										<td>
											<a href='?page=edit-produk&id=$r[id_produk]'>
											<button class='btn btn-default btn-rounded btn-sm'><span class='fa fa-pencil'></span></button>
											</a>
											<a onclick='return konfirmasi()' href='action/hapus.php?page=produk&id=$r[id_produk]' >
											<button class='btn btn-danger btn-rounded btn-sm'><span class='fa fa-times'></span></button>
											</a>
										</td>
									</tr>";
							$no++;
						}
						?>	
						</tbody>
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

		</div>
	</div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->      
