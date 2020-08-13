<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

	<div class="row">
		<div class="col-md-6">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title">Setting Header</h3>
					                              
				</div>
				<div class="panel-body">
					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width='80'>Baris Ke</th>
								<th>Isi</th>
								<th width='30'>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$sql = mysql_query("SELECT * FROM header_struk WHERE id_toko='$_GET[id]'");
						while($r= mysql_fetch_array($sql)){
							echo "	<tr>
										<td align='center'>$no</td>
										<td align='center'>$r[isi]</td>
										<td>
											<a onclick='return konfirmasi()' href='action/hapus.php?page=header&id=$r[id]' >
											<button class='btn btn-danger btn-rounded btn-sm'>
											<span class='fa fa-times'></span></button>
											</a>
										</td>
									</tr>";
							$no++;
						}
						?>	
						</tbody>
					</table>
					
					<form class="form-horizontal" action="action/simpan.php?page=header" method="POST">
					<div class="form-group">  

						<div class="col-md-8 col-md-offset-1">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-list"></span></span>
								<input type='text' name='isi' class="form-control" maxlength="32" required>
							</div> 
							
						</div>

						<div class="col-md-2">
							<button type="submit" class="btn btn-success ">Simpan</button>
						</div>


					</div>
					</form>

					
				</div>
			</div>
			<!-- END DEFAULT DATATABLE -->

		</div>
		
		<div class="col-md-6">

			<!-- START DEFAULT DATATABLE -->
			<div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title">Setting Footer</h3>
					                              
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width='80'>Baris Ke</th>
								<th>Isi</th>
								<th width='30'>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$sql = mysql_query("SELECT * FROM footer_struk WHERE id_toko='$_GET[id]'");
						while($r= mysql_fetch_array($sql)){
							echo "	<tr>
										<td align='center'>$no</td>
										<td align='center'>$r[isi]</td>
										<td>
											<a onclick='return konfirmasi()' href='action/hapus.php?page=footer&id=$r[id]' >
											<button class='btn btn-danger btn-rounded btn-sm'>
											<span class='fa fa-times'></span></button>
											</a>
										</td>
									</tr>";
							$no++;
						}
						?>	
						</tbody>
					</table>
					
					<form class="form-horizontal" action="action/simpan.php?page=footer" method="POST">
					<div class="form-group">  

						<div class="col-md-8 col-md-offset-1">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-list"></span></span>
								<input type='text' name='isi' class="form-control" maxlength="32" required>
							</div> 
							
						</div>

						<div class="col-md-2">
							<button type="submit" class="btn btn-success ">Simpan</button>
						</div>


					</div>
					</form>

					</div>
				
			</div>
			<!-- END DEFAULT DATATABLE -->

		</div>
	</div>                                

</div>
<!-- PAGE CONTENT WRAPPER -->      
