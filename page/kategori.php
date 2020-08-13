<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title">Data Kategori</h3>
					<ul class="panel-controls">
						<a href='?page=tambah-kategori'><div class="pull-right">
						<button class="btn btn-success"><span class="fa fa-plus-square"></span> Tambah Kategori</button>
						</a>
					</ul>                                
				</div>
				<div class="panel-body">
					<table class="table datatable table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Kategori Produk</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$id_toko  = $_SESSION['alpokat']['id_toko'];
						$sql = mysql_query("SELECT * FROM kategori WHERE id_toko='$id_toko'");
						while($r= mysql_fetch_array($sql)){
							echo "	<tr>
										<td>$no</td>
										<td>$r[nama_kategori]</td>
										<td>
											<a href='?page=edit-kategori&id=$r[id_kategori]'>
											<button class='btn btn-default btn-rounded btn-sm'><span class='fa fa-pencil'></span></button>
											</a>
											<a onclick='return konfirmasi()' href='action/hapus.php?page=kategori&id=$r[id_kategori]' >
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

		</div>
	</div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->      
