<div class="container con-awal">
	<div class="row">
<?php 
session_start();
if (isset($_POST['submit'])) {

	$arr_nama_usaha=$_POST['namausaha'];
	$arr_alamat_usaha=$_POST['alamatusaha'];

	$post_pulau=$_POST['cb_pulau'];
	$arr_prov=split(':', $post_pulau);

	$post_pendidikan=$_POST['cb_pendidikan_pemilik'];
	$arr_pendidikan=split(':', $post_pendidikan);
	
	$post_t_mulai=$_POST['cb_tahun_mulai'];
	$arr_t_mulai=split(':', $post_t_mulai);

	$post_p_komputer=$_POST['cb_p_komputer'];
	$arr_p_komputer=split(':', $post_p_komputer);

	$post_total_aset=$_POST['cb_total_aset'];
	$arr_total_aset=split(':', $post_total_aset);

	$post_kesulitan=$_POST['cb_kesulitan'];
	$arr_kesulitan=split(':', $post_kesulitan);

	$post_prospel=$_POST['cb_prospel'];
	$arr_prospel=split(':', $post_prospel);

	$post_x3_lalu=$_POST['cb_x3_lalu'];
	$arr_x3_lalu=split(':', $post_x3_lalu);

	$post_rencana=$_POST['cb_rencana'];
	$arr_rencana=split(':', $post_rencana);

	$post_balas_jasa=$_POST['cb_balas_jasa'];
	$arr_balas_jasa=split(':', $post_balas_jasa);

	
	$arr_inputan=array($arr_nama_usaha,$arr_alamat_usaha);
	$arr_idnya=array($arr_prov,$arr_pendidikan,$arr_t_mulai, $arr_p_komputer,$arr_total_aset,$arr_kesulitan,$arr_prospel,$arr_x3_lalu,$arr_rencana,$arr_balas_jasa);

	$_SESSION['subinputan']=$arr_inputan;
	$_SESSION['subkrit']=$arr_idnya;



	$arr_label_inputan=array('Nama Perusahaan',
							 'Alamat Perusahaan');

	$arr_kritnya=array('Pulau',
							'Pendidikan Pemilik',
							'Tahun Mulai Operasi',
							'Pengguna Komputer',
							'Total Aset',
							'Kesulitan Yang Dialami',
							'Perkiraan Prospek Peluang Usaha',
							'Prospek Usaha 3 Bulan Lalu',
							'Rencana Kedepan',
							'Balas Jasa');

	$jml_arr_labelnya=sizeof($arr_kritnya);
	
}
 ?>	

	<div class="container con-awal">
		<div class="row">
			<h2>Pengecekan Kembali Input Kriteria</h2>
		</div>
		<div class="row">
			<p>Apakah kriteria yang dimasukan telah sesuai dengan usaha yang anda jalankan ? Jika telah sesuai silahkan pilih tombol <b>lanjutkan</b> dan apabila ada kesalahan dapat diperbaiki terlebih dahulu dengan memilih tombol <b>perbaiki</b>.</p>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-6">
				<table class="table table-hover table-bordered table-sm" align="center" style="margin: 2rem 0 2rem 0;" >
				  <tbody>
				  	<?php 
				  		for ($tinpt=0; $tinpt < 2; $tinpt++) { 
				  			echo "<tr>
				  					<td >".$arr_label_inputan[$tinpt]."</td>
				  					<td>".$arr_inputan[$tinpt]."</td>
				  				";
				  		}
				  		for ($ti=0; $ti < $jml_arr_labelnya; $ti++) { 
				  			echo "<tr>
				  					<td>".$arr_kritnya[$ti]."</td>
				  					<td>".$arr_idnya[$ti][1]."</td>
				  				  </tr>";
				  		}
				  	 ?>
				  </tbody>
				</table>
				<div class="row justify-content-md-center">
				<button onclick="history.go(-1);" name="edit" class="btn btn-danger" style="margin-right: 2rem;">
					Perbaiki</button>
				<a href="?cbr=submit-krit" name="edit" class="btn btn-success" style="margin-right: 2rem;">
					Lanjutkan</a>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>