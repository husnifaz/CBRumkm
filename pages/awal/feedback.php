<?php 
	error_reporting(0);
		if (isset($_SESSION['user']) && isset($_SESSION['login'])) {

			$cekuser="SELECT * FROM user WHERE email='".$_SESSION['user']."'";
			$q_cekuser=mysql_query($cekuser)or die(mysql_error());

			$listuser=mysql_fetch_row($q_cekuser);
			$namauser=$listuser[1];
			$iduser=$listuser[0];
			$_SESSION['namauser']=$namauser;
			$_SESSION['iduser']=$iduser;


		if (mysql_num_rows($q_cekuser)>0) {
 ?>

<div class="container con-awal">
	<div class="row">
    	<div class="col">
    		<h3 style="padding-top: 1rem;">FORM MASUKAN</h3>
    		<div id="col-fs"></div>
    		<form method="post" name="cbrform" action="?cbr=insert-masukan">
    			<div id="col"></div>
    			<div class="form-group row">
    				<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Nama Pengguna</label>
    					<div class="col-sm">
					     <input type="text" class="form-control col-sm-6" value="<?php echo $namauser;?>" disabled>
						</div>
    			</div>
    			<div class="form-group row">
    				<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Jenis Masukan</label>
    					<div class="col-sm-7">
					    <select class="form-control col-sm-10" id="select1" name="jenis1" required>
					    	<option hidden value="0">Pilih Jenis Masukan</option>
					     	<option>Tambahkan Kategori</option>
					     	<option>Kekurangan Sistem</option>
					     	<option>Laporkan Kesalahan</option>
					     	<option>Lupa Kata Sandi</option>
					     	<option>Lainnya</option>				       
					    </select>
					</div>
    			</div>
    			<div class="form-group row">
    				 <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Masukan</label>
    				<div class="col-sm">
					    <textarea class="form-control col-sm-8" id="exampleFormControlTextarea1" rows="10" name="isimasukan" placeholder="Silahkan Masukan Masukan, Kritik dan Saran Anda" required></textarea>
					</div>
				</div>
				<input type="submit" name="submitmasukan" class="btn btn-success" value="Kirim Masukan">

    		</form>
    	</div>
    </div>
</div>

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
