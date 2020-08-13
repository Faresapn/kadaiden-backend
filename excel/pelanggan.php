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
					<table class="table datatable table-bordered" border='1'>
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>HP</th>
								<th>Alamat</th>
								<th>Poin</th>
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
