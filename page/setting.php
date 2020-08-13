<?php
$id_pemilik = $_SESSION['alpokat']['id'];
$sql = mysql_query("SELECT * FROM pemilik WHERE id_pemilik='$id_pemilik'");
$r   = mysql_fetch_array($sql);
?> 

 
 <div class="page-content-wrap">
                
	<div class="row">
		<div class="col-md-6">

			<form class="form-horizontal" action="action/update.php?page=pemilik" method="POST" enctype="multipart/form-data">
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Profil Pemilik</strong></h3>
					<ul class="panel-controls">
					</ul>
				</div>

				<div class="panel-body">                                                                        

					<div class="row">
					
					
                                            
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-7">  
							<div class="profile">                                          
							<div class="profile-image">
				                                <img src="foto_profil/<?php echo $r['foto'] ?>" width='100%' alt="<?php echo $r['nama'] ?>"/>
				                        </div>
				                        </div>                                        
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Nama</label>
						<div class="col-md-7">                                            
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-user"></span></span>
								<input type="hidden" name="id_pemilik" value="<?php echo $r['id_pemilik'] ?>" />
								<input type="text" name="nama" value="<?php echo $r['nama'] ?>" class="form-control" required/>
							</div>                                            
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">No HP</label>
						<div class="col-md-7">                                            
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-phone"></span></span>
								<input type="text" name="hp" value="<?php echo $r['hp'] ?>" class="form-control"/>
							</div>                                            
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Email</label>
						<div class="col-md-7">                                            
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-envelope"></span></span>
								<input type="email" disabled name="email" value="<?php echo $r['email'] ?>" class="form-control"/>
							</div>                                            
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Foto</label>
						<div class="col-md-7">                                            
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-image"></span></span>
								<input type="file" name='foto' class="form-control"/>
							</div>                                            
						</div>
					</div>
					
					
						
					</div>

				</div>
				<div class="panel-footer">                                   
					<button type="submit" class="btn btn-primary pull-right">Submit</button>
				</div>
			</div>
			</form>
			
			
			

		</div>
		
		<div class="col-md-6">

			<form class="form-horizontal" action="action/update.php?page=pass_retur" method="POST">
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Password Retur</strong></h3>
					<ul class="panel-controls">
					</ul>
				</div>

				<div class="panel-body">                                                                        

					<div class="row">
                                            
					<div class="form-group">
						<label class="col-md-3 control-label">Password Retur</label>
						<div class="col-md-7">                                            
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
								<input type="text" name="retur" value="<?php echo $r['pass_retur'] ?>" class="form-control" required/>
								<input type="hidden" name="id_pemilik" value="<?php echo $r['id_pemilik'] ?>" />
							</div>                                            
						</div>
					</div>
						
					</div>

				</div>
				<div class="panel-footer">                                   
					<button type="submit" class="btn btn-primary pull-right">Submit</button>
				</div>
			</div>
			</form>
			
			<form class="form-horizontal" action="action/update.php?page=ganti_password" method="POST">
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Ganti Password</strong></h3>
					<ul class="panel-controls">
					</ul>
				</div>

				<div class="panel-body">                                                                        

					<div class="row">
                                            
					<div class="form-group">
						<label class="col-md-3 control-label">Password Lama</label>
						<div class="col-md-7">                                            
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
								<input type="password" name="old_pass" class="form-control" required/>
								<input type="hidden" name="id_pemilik" value="<?php echo $r['id_pemilik'] ?>" />
							</div>                                            
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Password Baru</label>
						<div class="col-md-7">                                            
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
								<input type="password" name="new_pass" class="form-control" required/>
							</div>                                            
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Masukkan Ulang Password</label>
						<div class="col-md-7">                                            
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
								<input type="password" name="re_pass" class="form-control" required/>
							</div>                                            
						</div>
					</div>
					
						
					</div>

				</div>
				<div class="panel-footer">                                   
					<button type="submit" class="btn btn-primary pull-right">Submit</button>
				</div>
			</div>
			</form>
			

		</div>
	</div>  
	

                                     
                    
</div>