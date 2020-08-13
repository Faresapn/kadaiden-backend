<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title">Data Toko Anda</h3>
					<ul class="panel-controls">
						<a href='?page=tambah-toko'><div class="pull-right">
						<button class="btn btn-success"><span class="fa fa-plus-square"></span> Tambah Toko</button>
						</a>
					</ul>                                
				</div>
				<div class="panel-body">
					<div class="table-responsive">
					<table class="table datatable table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Toko</th>
								<th>No HP</th>
								<th>Alamat</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$id  = $_SESSION['alpokat']['id'];
						$sql = mysql_query("SELECT * FROM toko WHERE id_pemilik='$id'");
						while($r= mysql_fetch_array($sql)){
							echo "	<tr>
										<td>$no</td>
										<td>$r[nama_toko]</td>
										<td>$r[hp]</td>
										<td>$r[alamat]</td>
										<td>
											<a href='?page=edit-toko&id=$r[id_toko]'>
											<button class='btn btn-default btn-rounded btn-sm'><span class='fa fa-pencil'></span></button>
											</a>
											<a onclick='return konfirmasi()' href='action/hapus.php?page=toko&id=$r[id_toko]' >
											<button class='btn btn-danger btn-rounded btn-sm'><span class='fa fa-times'></span></button>
											</a>
											<a href='action/update.php?page=kelola&id=$r[id_toko]'>
											<button class='btn btn-success btn-rounded btn-sm'>Kelola Toko</button>
											</a>
											
											<a href='?page=setting-struk&id=$r[id_toko]'>
											<button class='btn btn-info btn-rounded btn-sm'>Setting Struk</button>
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
