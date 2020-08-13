<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title">Data Kemasan</h3>
					<ul class="panel-controls">
						<a href='?page=tambah-kemasan'><div class="pull-right">
						<button class="btn btn-success"><span class="fa fa-plus-square"></span> Tambah Kemasan</button>
						</a>
					</ul>                                
				</div>
				<div class="panel-body">
					<table class="table datatable table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Jenis Kemasan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$id_toko  = $_SESSION['alpokat']['id_toko'];
						$sql = mysql_query("SELECT * FROM kemasan WHERE id_toko='$id_toko'");
						while($r= mysql_fetch_array($sql)){
							echo "	<tr>
										<td>$no</td>
										<td>$r[nama_kemasan]</td>
										<td>
											<a href='?page=edit-kemasan&id=$r[id_kemasan]'>
											<button class='btn btn-default btn-rounded btn-sm'><span class='fa fa-pencil'></span></button>
											</a>
											<a onclick='return konfirmasi()' href='action/hapus.php?page=kemasan&id=$r[id_kemasan]' >
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
