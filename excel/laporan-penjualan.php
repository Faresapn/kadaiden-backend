<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">


			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                

				</div>
				<div class="panel-body">
				<div class="table-responsive">
					<table class="table datatable table-bordered" border='1'>
						<thead>
							<tr>
								<th>No</th>
								<th>TANGGAL</th>
								<th>NO FAKTUR</th>
								<th>JUMLAH ITEM</th>
								<th>TOTAL BELANJA</th>
								<th>KASIR</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$id_toko  = $_SESSION['alpokat']['id_toko'];
						$gtotal = 0;
						$kasir = "";
						if(isset($_GET['kasir'])){
							if($_GET['kasir']=="all"){
								$kasir = "";
							}else{
								$kasir ="id_kasir='$_GET[kasir]' AND";
							}
						}
						$y = mysql_query("SELECT DISTINCT no_faktur,tanggal,id_kasir FROM transaksi WHERE 
										(tanggal BETWEEN '$_GET[dari]' AND '$_GET[hingga]') AND
										mk = 1 AND
										$kasir
										id_toko='$id_toko'");
						while($x= mysql_fetch_array($y)){
							
							$a = mysql_query("SELECT SUM(jumlah) as j FROM transaksi WHERE no_faktur='$x[no_faktur]' ");
							$b = mysql_fetch_assoc($a);
							
							$c = mysql_query("SELECT SUM(total) as t FROM transaksi WHERE no_faktur='$x[no_faktur]' ");
							$d = mysql_fetch_assoc($c);
							
							$e = mysql_query("SELECT * FROM kasir WHERE id_kasir='$x[id_kasir]'");
							$f = mysql_fetch_array($e);
							
							
							
							echo "	<tr>
									<td align='center'>$no</td>
									<td align='center'>".tgl_indo($x['tanggal'])."</td>
									<td>$x[no_faktur]</td>
									<td align='center'>$b[j]</td>
									<td align='right'>".rupiah($d['t'])."</td>
									<td>$f[nama]</td>
									
									
								</tr>";
							$no++;
							$gtotal = $gtotal + $d['t'];
							
						}
										   
						
						?>	
						</tbody>
						<tfoot>
							<tr>
								<th colspan='4'>Grand Total</th>
								<th><?php echo rupiah($gtotal) ?></th>
								<th colspan='1'></th>
							</tr>
						</tfoot>
						
					</table>
					</div>
				</div>
			</div>

		</div>
	</div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->      
