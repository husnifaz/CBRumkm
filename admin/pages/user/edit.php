<?php 

    $id =$_GET['id'];
    $query = mysql_query("SELECT * FROM user where id_user='$id'")or die(mysql_error());
    $data=mysql_fetch_row($query);
 ?>				
				        <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Tambah Kategori</strong>
                      </div>
                     <form method="post" enctype="multipart/form-data" class="form-horizontal" action="?admcbr=update-user">
                      <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">ID User</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="userid" class="input-sm form-control-sm form-control" value="<?php echo $data[0]; ?>"></div>
                        </div>
                      	<div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Nama</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="input-small" name="namauser" placeholder="Nama User" class="input-sm form-control-sm form-control" value="<?php echo $data[1]; ?>"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Email</label></div>
                            <div class="col-12 col-md-9"><input type="email" name="emailuser" placeholder="Kategori kriteria" class="input-sm form-control-sm form-control" value="<?php echo $data[2]; ?>"></div>
                        </div>  
                        <div class="row form-group">
                            <label class="col col-md-3">Password</label>
                            <div class="col col-md-9"><input type="password" class="input-sm form-control-sm form-control" id="exampleInputPassword1" placeholder="Password" name="passuser" value="<?php echo $data[3]; ?>"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Nomor Handphone</label></div>
                            <div class="col-12 col-md-9"><input type="number" name="hpuser" placeholder="Nomor Handphone" class="input-sm form-control-sm form-control" value="<?php echo $data[4]; ?>"></div>
                        </div>  
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Hak Akses</label></div>
                            <div class="col-12 col-md-9">
                              <select name="hakuser" id="SelectLm" class="form-control-sm form-control">
                                <option value="1">Admin</option>
                                <option value="2" selected>User</option>
                              </select>
                            </div>
                        </div>
                  		</div>
                  		  <div class="card-footer">
                        <input type="submit" name="updateuser" class="btn btn-primary btn-sm" value="Submit">
                        <input type="reset" class="btn btn-danger btn-sm" value="Reset">
                        <a class="btn btn-success btn-sm" href="" style="float: right;">Kembali</a>
                      </div>
                  	</form>
                    </div>
                  </div>
