<?php 

$tblname=$_SESSION['newtb'];
$colname=$_SESSION['colserver'];
$nameserver=$_SESSION['nmsever'];

 ?>				

				<div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Tambah Kategori</strong>
                      </div>
                     <form method="post" enctype="multipart/form-data" class="form-horizontal" action="?admcbr=insert-kat">
                      <div class="card-body card-block">
                      	<div class="row form-group">
                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Kriteria</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="disabled-input" placeholder="Disabled" disabled="" class="form-control" value="<?php echo $colname ?>";"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Kategori</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="inskat" placeholder="Kategori kriteria" class="form-control"></div>
                          </div>  
                  		</div>
                  		  <div class="card-footer">
                        <input type="submit" name="submit_kat" class="btn btn-primary btn-sm" value="Submit">
                        <input type="reset" class="btn btn-danger btn-sm" value="Reset">
                        <a class="btn btn-success btn-sm" href="" style="float: right;">Kembali</a>
                      </div>
                  	</form>
                    </div>
                  </div>
