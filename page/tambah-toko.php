 <div class="page-content-wrap">
                
	<div class="row">
		<div class="col-md-12">

			<form class="form-horizontal" action="action/simpan.php?page=toko" method="POST">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Tambah Toko</strong></h3>
					<ul class="panel-controls">
					</ul>
				</div>

				<div class="panel-body">                                                                        

					<div class="row">
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Toko</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-home"></span></span>
									<input type="text" name="nama_toko" class="form-control" required/>
								</div>                                            
							</div>
						</div>
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Telpon Toko</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-phone"></span></span>
									<input type="text" name="hp" class="form-control" required/>
								</div>                                            
							</div>
						</div>
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Alamat Toko</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
									<input type="text" name="alamat" class="form-control" required/>
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