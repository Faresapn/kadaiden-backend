 <div class="page-content-wrap">
                
	<div class="row">
		<div class="col-md-12">

			<form class="form-horizontal" action="action/simpan.php?page=kasir" method="POST">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Tambah Kasir</strong></h3>
					<ul class="panel-controls">
					</ul>
				</div>

				<div class="panel-body">                                                                        

					<div class="row">
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Nama</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user"></span></span>
									<input type="text" name="nama" class="form-control" required/>
								</div>                                            
							</div>
						</div>
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">No Handphone</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-phone"></span></span>
									<input type="text" name="hp" class="form-control" required/>
								</div>                                            
							</div>
						</div>
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Email</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-envelope-o"></span></span>
									<input type="text" name="email" class="form-control" required/>
								</div>                                            
							</div>
						</div>
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Alamat</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
									<input type="text" name="alamat" class="form-control" required/>
								</div>                                            
							</div>
						</div>
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Toko</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-shopping-cart"></span></span>
									<select name="id_toko" class="form-control">
										<option selected disabled>Pilih toko</option>
										<?php
										$id = $_SESSION['alpokat']['id'];
										$sql = mysql_query("SELECT * FROM toko where id_pemilik='$id'");
										while($r= mysql_fetch_array($sql)){
											echo "<option value='$r[id_toko]'>$r[nama_toko]</option>";
										}
										?>
									</select>
								</div>                                            
							</div>
						</div>
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Password</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
									<input type="password" name="password" class="form-control" required/>
								</div>                                            
							</div>
						</div>
						
					</div>

				</div>
				<div class="panel-footer">
					<button type="reset" class="btn btn-default">Clear Form</button>                                    
					<button type="submit" class="btn btn-primary pull-right">Submit</button>
				</div>
			</div>
			</form>

		</div>
	</div>  
                                     
                    
</div>