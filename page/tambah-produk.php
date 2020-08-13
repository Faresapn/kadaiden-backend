 <div class="page-content-wrap">
                
	<div class="row">
		<div class="col-md-12">

			<form class="form-horizontal" action="action/simpan.php?page=produk" method="POST" enctype="multipart/form-data">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Tambah Produk</strong></h3>
					<ul class="panel-controls">
					</ul>
				</div>

				<div class="panel-body">                                                                        

					<div class="row">
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Produk</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></span>
									<input type="text" name="nama_produk" class="form-control" required/>
								</div>                                            
							</div>
						</div>           
           
						<div class="form-group">
							<label class="col-md-2 control-label">SKU</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-qrcode"></span></span>
									<input type="text" name="sku" class="form-control"/>
								</div>                                            
							</div>
						</div>           
						<div class="form-group">
							<label class="col-md-2 control-label">Barcode</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
									<input type="text" name="barcode" class="form-control"/>
								</div>                                            
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Kategori</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-tags"></span></span>
									<select name="id_kategori" class="form-control">
										<option selected value="" disabled>Pilih Kategori</option>
										<?php
										$id_toko = $_SESSION['alpokat']['id_toko'];
										$sql = mysql_query("SELECT * FROM kategori where id_toko='$id_toko'");
										while($r= mysql_fetch_array($sql)){
											echo "<option value='$r[id_kategori]'>$r[nama_kategori]</option>";
										}
										?>
									</select>
								</div>                                            
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Kemasan</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-folder-close"></span></span>
									<select name="id_kemasan" class="form-control">
										<option selected value="" disabled>Pilih Kemasan</option>
										<?php
										$id_toko = $_SESSION['alpokat']['id_toko'];
										$sql = mysql_query("SELECT * FROM kemasan where id_toko='$id_toko'");
										while($r= mysql_fetch_array($sql)){
											echo "<option value='$r[id_kemasan]'>$r[nama_kemasan]</option>";
										}
										?>
									</select>
								</div>                                            
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-2 control-label">Harga Modal</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon">Rp</span>
									<input type="text" name="harga_modal" class="form-control"/>
								</div>                                            
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Harga Jual</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon">Rp</span>
									<input type="text" name="harga_jual" class="form-control" required/>
								</div>                                            
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">File Photo</label>
							<div class="col-md-7">                                                                    
								<input type="file" class="btn-primary" name="foto" id="filename" title="Browse file"/>
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