<div class="container con-awal">
<?php 
	error_reporting(0);
		if (isset($_SESSION['user']) && isset($_SESSION['login'])) {

			$cekuser="SELECT * FROM user WHERE email='".$_SESSION['user']."'";
			$q_cekuser=mysql_query($cekuser)or die(mysql_error());

			$listuser=mysql_fetch_row($q_cekuser);
			$namauser=$listuser[1];
			$_SESSION['namauser']=$namauser;


		if (mysql_num_rows($q_cekuser)>0) {
 ?>
<div class="container con-awal">
    <div class="row">
    	<div class="col">
    		<h2>FORM PENGISIAN KRITERIA USAHA</h2>
    		<div id="col-fs"></div>
 
     		<form method="post" name="cbrform" action="?cbr=valid">
    			<div id="col"></div>
    			<div class="form-group row">
    				<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Nama Perusahaan</label>
    					<div class="col-sm">
					     <input type="text" class="form-control" name="namausaha" placeholder="Silakan Masukan Nama Perusahaan/Nama Usaha Anda" required>
						</div>
    			</div>
    			<div class="form-group row">
    				 <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
    				<div class="col-sm">
					    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamatusaha" placeholder="Silahkan Masukan Alamat Lengkap Perusaan Anda" required></textarea>
					</div>
				</div>
    			<div class="form-group row">
    				<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Pulau</label>
    					<div class="col-sm-7">
					    <select class="form-control" id="select1" name="cb_pulau" onchange="turunForm(this);" required>
					      <?php 
					      	$cb_prov=mysql_query("SELECT * FROM t_pulau ORDER BY pulau");
		
							 	echo "<option value='' hidden>- Silahkan Pilih Daerah Tempat Tinggal -</option>";
								while ($cb_p=mysql_fetch_array($cb_prov)) {
									echo "<option value='$cb_p[id_pulau]:$cb_p[pulau]'>$cb_p[pulau]</option>";
								}	
					       ?>
							<!-- <option value="saya">Tambahkan Pilihan</option>				        -->
					    </select>
					</div>
    			</div>
    			<div class="form-group row">
    				<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Pendidikan Pemilik</label>
    					<div class="col-sm-7">
					    <select class="form-control" id="exampleFormControlSelect1" name="cb_pendidikan_pemilik" required>
					      <?php 
					      	$cb_pend=mysql_query("SELECT * FROM t_pendidikan_pemilik order by pendidikan_pemilik");
							echo "<option value='' hidden>- Silahkan Pilih Pendidikan Terakhir Anda -</option>";
							while ($cb_p=mysql_fetch_array($cb_pend)) {
							echo "<option value='$cb_p[id_pendidikan_pemilik]:$cb_p[pendidikan_pemilik]'>$cb_p[pendidikan_pemilik]</option>";
						}
					       ?>
					       <!-- <option value="999">Tambahkan Pilihan</option> -->
					    </select>
					</div>
    			</div>
    			
    			<div class="form-group">
				  <label class="form-check-label">Tahun Mulai Operasi &emsp;&emsp;&emsp; </label>
				  <?php 
						$cb_pend=mysql_query("SELECT * FROM t_tahun_mulai order by tahun_mulai");
						
						while ($cb_p=mysql_fetch_array($cb_pend)) {
							echo "<div class='form-check form-check-inline'>
  									<label class='form-check-label'>
  										<input class='form-check-input' type='radio' name='cb_tahun_mulai' value='$cb_p[id_tahun_mulai]:$cb_p[tahun_mulai]' required>$cb_p[tahun_mulai] 
  										</label><p>&emsp;&emsp;</p>
  									</div>";
						}
					 ?>
				</div>
				<div class="form-group">
				  <label class="form-check-label">Pengguna Komputer &emsp;&emsp;&emsp; </label>
				  <?php 
						$cb_pend=mysql_query("SELECT * FROM t_p_komputer");
						
						while ($cb_p=mysql_fetch_array($cb_pend)) {
							echo "<div class='form-check form-check-inline'>
  									<label class='form-check-label'>
  										<input class='form-check-input' type='radio' name='cb_p_komputer' id='inlineRadio1' value='$cb_p[id_p_komputer]:$cb_p[p_komputer]' required>$cb_p[p_komputer] 
  										</label><p>&emsp;&emsp;</p>
  									</div>";
						}
					 ?>
				</div>
				<div class="form-group row">
    				<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Total Aset</label>
    					<div class="col-sm-7">
					    <select class="form-control" id="exampleFormControlSelect1" name="cb_total_aset" required>
					     <?php 
						$cb_pend=mysql_query("SELECT * FROM t_total_aset order by total_aset");
						echo "<option value='' hidden>- Berapakah Total Aset Usaha Anda ? -</option>";
						while ($cb_p=mysql_fetch_array($cb_pend)) {
							echo "<option value='$cb_p[id_total_aset]:$cb_p[total_aset]'>$cb_p[total_aset]</option>";
						}
					 ?>
					    </select>
					</div>
    			</div>
				<div class="form-group row">
    				<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Kesulitan Yang Dialami</label>
    					<div class="col-sm-7">
					    <select class="form-control" id="exampleFormControlSelect1" name="cb_kesulitan" required>
					     <?php 
						$cb_pend=mysql_query("SELECT * FROM t_kesulitan order by id_kesulitan=4,2");
						echo "<option value='' hidden>- Silahkan Pilih Kesulitan Yang Dialami -</option>";
						while ($cb_p=mysql_fetch_array($cb_pend)) {
							echo "<option value='$cb_p[id_kesulitan]:$cb_p[kesulitan]'>$cb_p[kesulitan]</option>";
						}
					 ?>
					
					    </select>
					</div>
    			</div>
    			<div class="form-group row">
    				<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Perkiraan Prospek Peluang Usaha</label>
    					<div class="col-sm-7">
					    <select class="form-control" id="exampleFormControlSelect1" name="cb_prospel" required>
					     <?php 
						$cb_pend=mysql_query("SELECT * FROM t_prospel_usaha");
						echo "<option value='' hidden>- Bagaimana Perkiraan Prospek Peluang Usaha 3 Bulan Yang Akan Datang ? -</option>";
						while ($cb_p=mysql_fetch_array($cb_pend)) {
							echo "<option value='$cb_p[id_prospel_usaha]:$cb_p[prospel_usaha]'>$cb_p[prospel_usaha]</option>";
						}
					 ?>
					 
					    </select>
					</div>
    			</div>
    			<div class="form-group row">
    				<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Prospek Usaha 3 Bulan Lalu</label>
    					<div class="col-sm-7">
					    <select class="form-control" id="exampleFormControlSelect1" name="cb_x3_lalu" required>
					     <?php 
						$cb_pend=mysql_query("SELECT * FROM t_x3_bulan_lalu");
						echo "<option value='' hidden>- Bagaimana Keadaan Prospek Usaha 3 Bulan Lalu ? -</option>";
						while ($cb_p=mysql_fetch_array($cb_pend)) {
							echo "<option value='$cb_p[id_X3_bulan_lalu]:$cb_p[X3_bulan_lalu]'>$cb_p[X3_bulan_lalu]</option>";
						}
					 ?>
					
					    </select>
					</div>
    			</div>
    			<div class="form-group row">
    				<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Rencana Kedepan</label>
    					<div class="col-sm-7">
					    <select class="form-control" id="exampleFormControlSelect1" name="cb_rencana" required>
					     <?php 
						$cb_pend=mysql_query("SELECT * FROM t_rencana");
						echo "<option value='' hidden>- Apakah Ada Rencana Untuk Kedepannya ? -</option>";
						while ($cb_p=mysql_fetch_array($cb_pend)) {
							echo "<option value='$cb_p[id_rencana]:$cb_p[rencana]'>$cb_p[rencana]</option>";
						}
					 ?>
					 
					    </select>
					</div>
    			</div>
    			<div class="form-group row">
    				<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Balas Jasa</label>
    					<div class="col-sm-7">
					    <select class="form-control" id="exampleFormControlSelect1" name="cb_balas_jasa" required>
					     <?php 
						$cb_pend=mysql_query("SELECT * FROM t_balas_jasa");
						echo "<option value='' hidden>- Bagaimana Balas Jasanya ? -</option>";
						while ($cb_p=mysql_fetch_array($cb_pend)) {
							echo "<option value='$cb_p[id_balas_jasa]:$cb_p[balas_jasa]'>$cb_p[balas_jasa]</option>";
						}
					 ?>
					 
					    </select>
					</div>
    			</div>
    			<div id="col-fs"></div>
    			<input type="submit" name="submit" class="btn btn-primary col-sm-1" value="Kirim">
    		 </form> 
    	</div>
    </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
 	<form method="post" action="?cbr=tambah-kategori">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	 <div class="form-group">
		    <label for="exampleFormControlSelect1">Kriteria</label>
		    <select class="form-control" id="exampleFormControlSelect1" name="tambahkat" onchange="turunForm(this);">
		      <option value="null">- Silahkan Pilih Kriterianya -</option>
		      <option value="t_pulau">Provinsi</option>
		      <option value="t_pendidikan_pemilik">Pendidikan Pemilik</option>
		      <option value="t_badan_hukum">Bentuk Badan Hukum</option>
		      <option value="t_total_aset">Total Aset</option>
		      <option value="t_kesulitan">Kesulitan Yang Dialami</option>
		      <option value="t_prospel_usaha">Perkiraan Prospek Peluang Usaha</option>
		      <option value="t_x3_bulan_lalu">Prospek Usaha 3 Bulan Lalu</option>
		      <option value="t_rencana">Rencana Kedepan</option>
		      <option value="t_balas_jasa">Balas Jasa</option>
		    </select>
		  </div>
		  <div class="form-group" id="ifYes" style="display: none;">
			    <label for="exampleFormControlInput1">Nama Kategori</label>
			    <input type="text" name="namakat" class="form-control" id="exampleFormControlInput1" placeholder="Masukan kategori yang akan ditambahkan" required>
		  	</div>
		    <script type="text/javascript" language="Javascript">
		    	 function turunForm(that) {
			        if (that.value == "null") {
			            document.getElementById("ifYes").style.display = "none";
			        } else {
			            document.getElementById("ifYes").style.display = "block";
			        }
			    }
		    </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="window.location.reload()" >Batal</button>
        <input type="submit" name="submitplus" type="button" class="btn btn-primary" value="Simpan">
      </div>
  	</form>
    </div>
  </div>
</div> -->


<?php 
		}
	}
	else{
	?>
	<script type="text/javascript" language="Javascript">
          alert('Silahkan untuk login terlebih dahulu !');
          document.location.href="./pages/log/login.php";
    </script>
    <?php
	}


?> 

