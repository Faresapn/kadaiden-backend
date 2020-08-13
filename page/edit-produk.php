<?php
$sql = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$r   = mysql_fetch_array($sql);
?>
<div class="page-content-wrap">
                
	<div class="row">
		<div class="col-md-12">

			<form class="form-horizontal" action="action/update.php?page=produk" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id_produk" value="<?php echo $r['id_produk'] ?>">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Edit Produk</strong></h3>
					<ul class="panel-controls">
					</ul>
				</div>

				<div class="panel-body">                                                                        

					<div class="row">
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Foto Produk</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<img src="foto_produk/<?php echo $r['foto'] ?>" width="200">
								</div>                                            
							</div>
						</div> 
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Produk</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-th-large"></span></span>
									<input type="text" name="nama_produk" value="<?php echo $r['nama_produk'] ?>" class="form-control" required/>
								</div>                                            
							</div>
						</div>           
						         
						<div class="form-group">
							<label class="col-md-2 control-label">SKU</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-qrcode"></span></span>
									<input type="text" name="sku" value="<?php echo $r['sku'] ?>" class="form-control"/>
								</div>                                            
							</div>
						</div>           
						<div class="form-group">
							<label class="col-md-2 control-label">Barcode</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
									<input type="text" name="barcode" value="<?php echo $r['barcode'] ?>" class="form-control"/>
								</div>                                            
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Kategori</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-tags"></span></span>
									<select name="id_kategori" class="form-control">
										<?php
										$id_toko = $_SESSION['alpokat']['id_toko'];
										$sqlx = mysql_query("SELECT * FROM kategori where id_toko='$id_toko'");
										while($rx= mysql_fetch_array($sqlx)){
											$a = "";
											if($rx['id_kategori']==$r['id_kategori']){
												$a = "selected";
											}
											echo "<option $a value='$rx[id_kategori]'>$rx[nama_kategori]</option>";
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
										<?php
										$id_toko = $_SESSION['alpokat']['id_toko'];
										$sqlx = mysql_query("SELECT * FROM kemasan where id_toko='$id_toko'");
										while($rx= mysql_fetch_array($sqlx)){
											$a = "";
											if($rx['id_kemasan']==$r['id_kemasan']){
												$a = "selected";
											}
											echo "<option $a value='$rx[id_kemasan]'>$rx[nama_kemasan]</option>";
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
									<input type="text" name="harga_modal" value="<?php echo $r['harga_modal'] ?>" class="form-control"/>
								</div>                                            
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Harga Jual</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon">Rp</span>
									<input type="text" name="harga_jual" value="<?php echo $r['harga_jual'] ?>" class="form-control" required/>
								</div>                                            
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">File Photo</label>
							<div class="col-md-7">                                                                    
								<input type="file" class="btn-primary" name="foto" id="filename" title="Browse file"/>
								* kosongkan jika tidak di ganti.
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