
<?php
$sql = mysql_query("SELECT * FROM kemasan WHERE id_kemasan='$_GET[id]'");
$r   = mysql_fetch_array($sql);
?> 
<div class="page-content-wrap">
                
	<div class="row">
		<div class="col-md-12">

			<form class="form-horizontal" action="action/update.php?page=kemasan" method="POST">
			<input type="hidden" name="id_kemasan" value="<?php echo $r['id_kemasan'] ?>">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Edit Kemasan</strong></h3>
					<ul class="panel-controls">
					</ul>
				</div>

				<div class="panel-body">                                                                        

					<div class="row">
                                            
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Kemasan</label>
							<div class="col-md-7">                                            
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-tags"></span></span>
									<input type="text" name="nama_kemasan" value="<?php echo $r['nama_kemasan'] ?>" class="form-control" required/>
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