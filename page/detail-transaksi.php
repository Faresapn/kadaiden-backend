<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">


			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                

	 
	
		
    <div class="col-md-5 col-xs-12">
    	<h3 class="panel-title"><strong>Detail Transaksi : <?php echo $_GET['faktur'] ?></strong></h3><br>
    </div>
    
    
    


				</div>
				<div class="panel-body">
				<div class="table-responsive">
					<table class="table datatable table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>NAMA PRODUK</th>
								<th>HARGA JUAL</th>
								<th>JUMLAH</th>
								<th>TOTAL</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$id_toko  = $_SESSION['alpokat']['id_toko'];
						$gtotal = 0;
							
						$y = mysql_query("SELECT * FROM transaksi,produk,kemasan WHERE
										transaksi.id_produk=produk.id_produk AND
										produk.id_kemasan=kemasan.id_kemasan AND
										transaksi.no_faktur='$_GET[faktur]'");
						while($x= mysql_fetch_array($y)){
							
							
							echo "	<tr>
									<td align='center'>$no</td>
									<td>$x[nama_produk]</td>
									<td>".rupiah($x['harga_jual'])."</td>
									<td>$x[jumlah] $x[nama_kemasan]</td>
									<td>".rupiah($x['total'])."</td>
									<td align='center'>
									
									<a onclick='return konfirmasi()' href='action/hapus.php?page=detail-transaksi&id=$x[id_transaksi]' >
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
			</div>

		</div>
	</div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->      
