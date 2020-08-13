<style> .str{ mso-number-format:\@; } </style>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title">Data Toko Anda</h3>
					<ul class="panel-controls">
						
					</ul>                                
				</div>
				<div class="panel-body">
					<div class="table-responsive">
					<table class="table datatable table-bordered" border='1'>
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Toko</th>
								<th>No HP</th>
								<th>Alamat</th>
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
										<td class='str'>$r[hp]</td>
										<td>$r[alamat]</td>
										
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
