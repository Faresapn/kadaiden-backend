<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-12">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title">Data Kasir</h3>
					<ul class="panel-controls">
						<a href='?page=tambah-kasir'><div class="pull-right">
						<button class="btn btn-success"><span class="fa fa-plus-square"></span> Tambah Kasir</button>
						</a>
					</ul>                                
				</div>
				<div class="panel-body">
				
				
				
				<form class="form-horizontal" action="" method="GET">
					<div class="form-group">  

						<div class="col-md-3">
							<select name='bulan' class="form-control" required>
								<?php 
								$n_bulan = array("Pilih Bulan","Januari","Februari","Maret","April","Mey","Juni",
											   "Juli","Agustus","Sepetember","Oktober","November","Desember");
								$v_bulan = array("","01","02","03","04","05","06","07","08","09","10","11","12");

								for($i = 0; $i<13; $i++){
									if(isset($_GET['bulan'])){
										if($_GET['bulan']==$v_bulan[$i]){
											$a = "selected";
										}else{
											$a = "";
										}
									}
									echo "<option $a value='$v_bulan[$i]'>$n_bulan[$i]</option>";
								}
								?>

							</select>
						</div>


						<div class="col-md-2">
							<button type="submit" class="btn btn-success">Lihat</button>
						</div>


					</div>
					</form>
				
				
				
					<table class="table datatable table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>HP</th>
								<th>Email</th>
								<th>Alamat</th>
								<th>Toko</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$id_pemilik  = $_SESSION['alpokat']['id'];
						$sql = mysql_query("SELECT * FROM kasir WHERE id_pemilik='$id_pemilik'");
						while($r= mysql_fetch_array($sql)){
							
							$a = mysql_query("SELECT * FROM toko WHERE id_toko='$r[id_toko]'");
							$b = mysql_fetch_array($a);
							
							echo "	<tr>
										<td>$no</td>
										<td>$r[nama]</td>
										<td>$r[hp]</td>
										<td>$r[email]</td>
										<td>$r[alamat]</td>
										<td>$b[nama_toko]</td>
										<td>
											<a href='?page=edit-kasir&id=$r[id_kasir]'>
											<button class='btn btn-default btn-rounded btn-sm'><span class='fa fa-pencil'></span></button>
											</a>
											<a onclick='return konfirmasi()' href='action/hapus.php?page=kasir&id=$r[id_kasir]' >
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
