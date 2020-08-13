<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">


			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
<form class="form-horizontal" action="" method="GET">
	<input type="hidden" name='page' value='laporan-penjualan'>
	 
	
<div class="row">
		
    <div class="col-md-4 col-xs-12">
    	<h3 class="panel-title"><strong>Laporan Penjualan </strong></h3><br>
    </div>
    
    <div class="col-md-8">
    	<div class="col-md-5">
		
		<div class="form-group">
			<label class="col-md-2 control-label">Kasir</label>
			<div class="col-md-10">                                            
				<div class="input-group">
					<span class="input-group-addon"><span class="fa fa-tags"></span></span>
					<select name="kasir" class="form-control">
						<?php
						
					
						$id_toko = $_SESSION['alpokat']['id_toko'];
						$sqlx = mysql_query("SELECT * FROM kasir where id_toko='$id_toko'");
						if(!isset($_GET['kasir'])){
							echo "<option selected value='all'>Semua Kasir</option>";	
						}else{
							echo "<option value='all'>Semua Kasir</option>";
						}
						while($rx= mysql_fetch_array($sqlx)){
							$a = "";
							if(isset($_GET['kasir'])){
								if($_GET['kasir']==$rx['id_kasir']){
									$a = "selected";
								}else{
									$a = "";
								}
							}
							echo "<option $a value='$rx[id_kasir]'>$rx[nama]</option>";
						}
						?>
					</select>       
				</div>                                           
			</div>
		</div>
	</div>
		
    	<div class="col-md-3">
		
		<div class="form-group">
			<label class="col-md-3 control-label">Dari</label>
			<div class="col-md-9">                                            
				<div class="input-group">
					<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
					<input type="text" class="form-control datepicker" value="<?php echo $_GET['dari'] ?>" name="dari" required/>       
				</div>                                           
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
	
		<div class="form-group">
			<label class="col-md-3 control-label">Hingga</label>
			<div class="col-md-9">                                            
			    <div class="input-group">
				<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
				<input type="text" class="form-control datepicker" value="<?php echo $_GET['hingga'] ?>" name="hingga" required/>       
			    </div>                                           
			</div>
		</div>
		
		
	</div>
	
	<div class="col-md-1">
	    	
		<button type="submit" class="btn btn-success ">Lihat</button>
	
	    	
	</div>
    </div>
    
    
</div>	
</form> 
				</div>
				<div class="panel-body">
				<div class="table-responsive">
					<table class="table datatable table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>TANGGAL</th>
								<th>NO FAKTUR</th>
								<th>JUMLAH ITEM</th>
								<th>TOTAL BELANJA</th>
								<th>KASIR</th>
								<th>AKSI</th>
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
									<td align='center'>
									<a onclick='return konfirmasi()' href='action/hapus.php?page=faktur&id=$x[no_faktur]' >
									<button class='btn btn-danger btn-rounded btn-sm'><span class='fa fa-times'></span></button>
									</a>
									
									<a href='?page=detail-transaksi&faktur=$x[no_faktur]' >
									<button class='btn btn-success btn-rounded btn-sm'>Detail Transaksi</button>
									</a>
									
									</td>
									
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
								<th colspan='2'></th>
							</tr>
						</tfoot>
						
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

		</div>
	</div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->      
