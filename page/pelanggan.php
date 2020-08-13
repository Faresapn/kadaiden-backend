<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title">Data Pelanggan</h3>
					                               
				</div>
				<div class="panel-body">
				<div class="table-responsive">
					<table class="table datatable table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>HP</th>
								<th>Alamat</th>
								<th>Poin</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$id_toko  = $_SESSION['alpokat']['id_toko'];
						$sql = mysql_query("SELECT * FROM pelanggan WHERE id_toko='$id_toko' order by nama");
						while($r= mysql_fetch_array($sql)){
							
							$a = mysql_query("SELECT SUM(total) as j FROM transaksi WHERE id_pelanggan='$r[id_pelanggan]' ");
							$b = mysql_fetch_assoc($a);
							
							$poin = floor($b[j]/1000);
							
							echo "	<tr>
									<td>$no</td>
									<td>$r[nama]</td>
									<td>$r[hp]</td>
									<td>$r[alamat]</td>
									<td align='right'>$poin pts</td>
									<td>
										<a onclick='return konfirmasi()' href='action/hapus.php?page=pelanggan&id=$r[id_pelanggan]' >
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
