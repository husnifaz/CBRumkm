<?php 
  $id =$_GET['id'];
  $query=("SELECT feedback.id_masukan, user.nama, feedback.jenis, feedback.masukan, feedback.tanggal FROM feedback, user where user.id_user=feedback.id_user and feedback.id_masukan=".$id);
  $cekque=mysql_query($query);

  $listrow=mysql_fetch_array($cekque) or die(mysql_error());
    
 ?>  	


    <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Detail Masukan</strong>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-4 offset-md-10"><label class="form-control-label"><?php echo $listrow['tanggal']; ?></label></div>
                            </div>
                          	<div class="row form-group">
                              <div class="col col-md-2"><label class="form-control-label">Pengguna</label></div>
                              <div class=""><label class="form-control-label">:</label></div>
                              <div class="col col-md-9"><label class="form-control-label"><?php echo $listrow['nama']; ?></label></div>
                            </div>
                            <div class="row form-group">
                              <div class="col col-md-2"><label class="form-control-label">Jenis Masukan</label></div>
                              <div class=""><label class="form-control-label">:</label></div>
                              <div class="col col-md-9"><label class="form-control-label"><?php echo $listrow['jenis']; ?></label></div>
                            </div>
                            <div class="row form-group">
                              <div class="col col-md-2"><label class="form-control-label">Isi</label></div>
                              <div class=""><label class="form-control-label">:</label></div>
                              <div class="col col-md-5"><label class="form-control-label"><?php echo $listrow['masukan']; ?></label></div>
                            </div>
                            <div class="row" style="float: right; margin-right: 2rem;">
                              <a class="btn btn-danger" href="?admcbr=list-masukan">kembali</a>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
    </div>
