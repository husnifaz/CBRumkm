<div class="container con-awal">
	<div class="row">
		<h2 style="margin-bottom: 2rem; margin-top: 2rem;">Hasil Perbandingan Dengan Kasus Terdahulu</h2>
<?php
	
	$time_start=microtime(true);
	session_start();
	$subinputan=$_SESSION['subinputan'];
	$submitkrit=$_SESSION['subkrit'];
	$namauser=$_SESSION['namauser'];
	$iduser=$_SESSION['iduser'];
	
	$vprov=$submitkrit[0][0];
	$vpendidikan=$submitkrit[1][0];
	$vt_mulai=$submitkrit[2][0];
	$vp_komp=$submitkrit[3][0];
	$vtotal_aset=$submitkrit[4][0];
	$vkesulitan=$submitkrit[5][0];
	$vprospel=$submitkrit[6][0];
	$vx3bulanlalu=$submitkrit[7][0];
	$vrencana=$submitkrit[8][0];
	$vbalasjasa=$submitkrit[9][0];

	$kprov=$submitkrit[0][1];
	$kpendidikan=$submitkrit[1][1];
	$kt_mulai=$submitkrit[2][1];
	$kp_komp=$submitkrit[3][1];
	$ktotal_aset=$submitkrit[4][1];
	$kkesulitan=$submitkrit[5][1];
	$kprospel=$submitkrit[6][1];
	$kx3bulanlalu=$submitkrit[7][1];
	$krencana=$submitkrit[8][1];
	$kbalasjasa=$submitkrit[9][1];

	$arr_jml_bobot=array();
	$arr_index_bobot=array();
	$arr_index_kep=array();
	$arr_comb_bobot=array();
	$arr_krit=array();
	$hsl_arr_krit2=array();
	$arr_keputusan=array();
	$tbl_ary=array();


	$query=mysql_query("SELECT * from t_kasus");
	while ($row= mysql_fetch_row($query)) {
		$arr_krit[]=$row;
	} 

	$jml_arr=sizeof($arr_krit);
	$arr_coba=array('null',$vprospel,$vkesulitan,$vx3bulanlalu,$vpendidikan,$vtotal_aset,$vprov,$vbalasjasa,$vp_komp,$vt_mulai,$vrencana);
	// print_r($arr_coba);
	
	$db_bobot=mysql_query("SELECT bobot FROM t_bobot");
	$arr_bobot=array();
	while ($row_bobot=mysql_fetch_row($db_bobot)) {
		$arr_bobot[]=$row_bobot;
	}
	//bagi bobot
	for ($i_bobot=0; $i_bobot < sizeof($arr_bobot); $i_bobot++) { 

		$bagi_bobot[]=$arr_bobot[$i_bobot][0];
	}
	// print_r($bagi_bobot);
	echo "<br>";


	$avg_bobot=array_sum($bagi_bobot);
	// print_r($avg_bobot);
	
	//end

	for ($arr_col=0; $arr_col < $jml_arr; $arr_col++) { 

		$hsl_krit=$arr_krit[$arr_col];
		$cocokan=array_intersect_assoc($hsl_krit, $arr_coba);
		$jml_cocokan=sizeof($cocokan);
		// echo "<br>";
		// print_r($cocokan);
		// echo "<br>";
		$cocok_bobot=array_intersect_key($arr_bobot, $cocokan);
		// print_r($cocok_bobot);
		// echo "<br>";		
		$res_cocokan=array_values($cocokan);
		$res_cck_bobot=array_values($cocok_bobot);
		//$size_res_cocokan=sizeof($res_cocokan);
		$size_res_cck_bobot=sizeof($res_cck_bobot);
		// print_r($res_cocokan);
		// echo "<br>";
		// print_r($res_cck_bobot);
		
		$jml_bobot_final=0; 
		for ($col_bobot=0; $col_bobot < $size_res_cck_bobot; $col_bobot++) { 

			$kali_bobot=$res_cck_bobot[$col_bobot][0];	
			$jml_bobot_final += $kali_bobot;	
		}
		$real_bobot=($jml_bobot_final/$avg_bobot);
		$nf_real_bobot=number_format($real_bobot,3);
		

		$arr_index_bobot[]=array($arr_krit[$arr_col][0], $nf_real_bobot, $jml_cocokan);
		$take_acuan[]=array($arr_krit[$arr_col][0], $nf_real_bobot, $arr_krit[$arr_col][11]);
	}
		
	function sortBybobot($ar1,$ar2){
		$ar1=$ar1[1];
		$ar2=$ar2[1];

		if ($ar1==$ar2) return 0;
		return ($ar1>$ar2) ? -1 : 1; 
	}

	// function sortBykep($ar1,$ar2){
	// 		$ar1=$ar1[2];
	// 		$ar2=$ar2[2];
	// 		if ($ar1==1) return 0;
	// 		return ($ar1>$ar2) ? -1 : 1;
	// 		}
		
	usort($arr_index_bobot, 'sortBybobot');
	// usort($take_acuan, 'sortBykep');
		// print_r($arr_index_bobot);
		
		// print_r($arr_jml_bobot);
		// asort($arr_jml_bobot);
		// print_r($arr_jml_bobot );


		for ($i=0; $i < $jml_arr; $i++) { 

			$sql_kep=("SELECT t_kasus.id_kasus, t_keputusan.id_keputusan, t_keputusan.keputusan FROM t_kasus, t_keputusan where t_keputusan.id_keputusan=t_kasus.id_keputusan and t_kasus.id_kasus='".$arr_index_bobot[$i][0]."'");
			$query_kep=mysql_query($sql_kep);
			while ($row_kep=mysql_fetch_row($query_kep)) {
				$arr_keputusan[]=$row_kep;
			}
			
		}

		for ($no_tbl_ary=0; $no_tbl_ary < 10; $no_tbl_ary++) { 
		$tbl_ary[]=array($arr_index_bobot[$no_tbl_ary][0],
						 $arr_index_bobot[$no_tbl_ary][2],
						 $arr_keputusan[$no_tbl_ary][2],
						 ($arr_index_bobot[$no_tbl_ary][1]*100));
		}

				
			if ($jml_cocokan < 10){
				$last_ai=mysql_query("SELECT `AUTO_INCREMENT`
									FROM  INFORMATION_SCHEMA.TABLES
									WHERE TABLE_SCHEMA = 'umkmcbr'
									AND   TABLE_NAME   = 't_kasus';") or die(mysql_error());
				while ($cek_last_ai=mysql_fetch_row($last_ai)) {
					$aifinal=$cek_last_ai[0];
				}

				$querykasus = ("INSERT INTO t_kasus Values ('null',$vprospel,$vkesulitan,$vx3bulanlalu,$vpendidikan,$vtotal_aset,$vprov,$vbalasjasa,$vp_komp,$vt_mulai,$vrencana,'".$arr_keputusan[0][1]."')");

				$queryhasil = ("INSERT INTO hsl_prediksi Values ('null',$aifinal,'$iduser','$subinputan[0]','$subinputan[1]',$vprospel,$vkesulitan,$vx3bulanlalu,$vpendidikan,$vtotal_aset,$vprov,$vbalasjasa,$vp_komp,$vt_mulai,$vrencana,'".$arr_keputusan[0][1]."','".($arr_index_bobot[0][1]*100)."','".date('Y-m-d')."')");

				$savekasus=mysql_query($querykasus) or die(mysql_error());
				$savehasil=mysql_query($queryhasil) or die(mysql_error());
			}	
		
	
		$namekun=$_SESSION['nmakun'];
		if ($arr_keputusan[0][1]==1) {
			$pil_card="success";
			$acuan="hidden";
			$pil_title="Selamat Saudara ".$namauser." :)<br>Perusahaan \"".$subinputan[0]."\" Anda Menerima Bantuan Dari Pemerintah";
			$pil_detail="Kriteria Usaha Anda Memiliki Kemiripan Sebesar <b>".($arr_index_bobot[0][1]*100)."%</b> Dengan Kasus <b>Nomor ".$arr_index_bobot[0][0]."</b> Yang Sebelumnya Juga Berhak Mendapatkan Bantuan Dari Pemerintah.";
		}else{
			$pil_card="danger";
			$acuan="visible";
			$pil_title="Mohon Maaf Saudara ".$namauser." :( <br>Perusahaan \"".$subinputan[0]."\" Anda Belum Memenuhi Syarat Untuk Menerima Bantuan untuk Usaha Dari Pemerintah";
			$pil_detail="Kriteria Usaha Anda Memiliki Kemiripan Sebesar <b>".($arr_index_bobot[0][1]*100)."%</b> Dengan Kasus <b>Nomor ".$arr_index_bobot[0][0]."</b> Yang Sebelumnya Juga Belum Berhak Mendapatkan Bantuan Dari Pemerintah.";
		}
		$time_end=microtime(true);
		$execute_time=round(($time_end-$time_start), 2);
		
?>
		<div class="card text-white bg-<?php echo "$pil_card";?> mb-3" style="max-width: 70rem;">
		  <div class="card-body">
		    <h4 class="card-title"><?php echo "$pil_title";?></h4>
		    <p class="card-text"><?php echo "$pil_detail";?></p>
		    <p class="card-text"><?php echo "Waktu Eksekusi : ".$execute_time." s"; ?></p>
		  </div>
		</div>
	</div>

		    <div style="float: right;">	
			  	<a href="?cbr=riwayat"><button class="btn btn-primary btn-sm" type="button" >Lihat Riwayat</button></a>
				<a href="?cbr"><button type="button" class="btn btn-danger btn-sm">Kembali Ke Beranda</button></a>
			</div>

			<div style="float: right; margin-right: 1rem">
			  <a style="visibility: <?php echo $acuan; ?>;" class="btn btn-dark btn-sm" data-toggle="collapse" href="#collapseAcuan" role="button" aria-expanded="false" aria-controls="collapseExample">
		    Tabel Perbandingan Acuan</a>
			  <a class="btn btn-dark btn-sm" data-toggle="collapse" href="#collapseKemiripan" role="button" aria-expanded="false" aria-controls="collapseExample">
		    Tabel Perbandingan Kemiripan</a>
			  </div>
		
	
<div class="collapse" id="collapseAcuan">
<h2 style="margin-top: 2rem; margin-bottom: 2rem;">Tabel Perbandingan Kekurangan</h2>
	<div class="row justify-content-md-center">
		<div class="col-md-7">
			<table class="table table-sm" align="center" style="text-align: center;">
				<thead class="thead-dark">
					<th scope="col" width="1000px;">Nama Kriteria</th>
		      		<th scope="col" width="500px;">Kriteria Anda</th>
		      		<th scope="col" width="500px;">Kriteria Yang Mendekati</th>
		  	<?php
		  	$arr_kritnya=array('','Perkiraan Prospek Peluang Usaha',
		  						'Kesulitan',
		  						'Prospek Usaha 3 Bulan Lalu',
								'Pendidikan Pemilik',
								'Total Aset',
								'Pulau',
								'Balas Jasa',
								'Pengguna Komputer',
								'Tahun Mulai Operasi',
								'Rencana Kedepan',
								'Keputusan'
							);
		  	$arr_coba_done=array('#',$kprospel,$kkesulitan,$kx3bulanlalu,$kpendidikan,$ktotal_aset,$kprov,$kbalasjasa,$kp_komp,$kt_mulai,$krencana,$arr_keputusan[0][2]);
		  		$queryu=mysql_query(
                                "SELECT t_kasus.id_kasus,
                                t_prospel_usaha.prospel_usaha,
                                t_kesulitan.kesulitan,
                                t_x3_bulan_lalu.X3_bulan_lalu,
                                t_pendidikan_pemilik.pendidikan_pemilik,
                                t_total_aset.total_aset,
								t_pulau.pulau, 
								t_balas_jasa.balas_jasa,
								t_p_komputer.p_komputer,
								t_tahun_mulai.tahun_mulai,
								t_rencana.rencana,
								t_keputusan.keputusan 
							FROM t_kasus,
								t_pulau, 
								t_pendidikan_pemilik,
								t_tahun_mulai,
								t_p_komputer,
								t_total_aset,
								t_kesulitan,
								t_prospel_usaha,
								t_x3_bulan_lalu,
								t_rencana,
								t_balas_jasa,
								t_keputusan
							where 	
								t_pulau.id_pulau=t_kasus.id_pulau AND 
								t_pendidikan_pemilik.id_pendidikan_pemilik=t_kasus.id_pendidikan_pemilik AND
								t_tahun_mulai.id_tahun_mulai=t_kasus.id_tahun_mulai AND
								t_p_komputer.id_p_komputer=t_kasus.id_p_komputer AND
								t_total_aset.id_total_aset=t_kasus.id_total_aset AND
								t_kesulitan.id_kesulitan=t_kasus.id_kesulitan AND
								t_prospel_usaha.id_prospel_usaha=t_kasus.id_prospel_usaha AND
								t_x3_bulan_lalu.id_X3_bulan_lalu=t_kasus.id_X3_bulan_lalu AND
								t_rencana.id_rencana=t_kasus.id_rencana AND
								t_balas_jasa.id_balas_jasa=t_kasus.id_balas_jasa AND
								t_keputusan.id_keputusan=t_kasus.id_keputusan AND t_kasus.id_kasus=".$take_acuan[0][0])or die(mysql_error());
				$sowu= mysql_fetch_row($queryu);
		  		for ($tbl_sowu=1; $tbl_sowu < sizeof($sowu); $tbl_sowu++) { 
		  			if ($arr_coba_done[$tbl_sowu]==$sowu[$tbl_sowu]) {
		  				$colorse="#8EFF81";
		  			}else{
		  				$colorse="#FF6D6A";
		  			}
		  		 	echo "<tr>
		  		 			<td>".$arr_kritnya[$tbl_sowu]."</td>
		  		 			<td style='background: $colorse;'>".$arr_coba_done[$tbl_sowu]."</td>
		  					<td>".$sowu[$tbl_sowu]."</td>
		  				  <tr>";	
		  		 } 
		  	 ?>
		  	 </thead>
		</table>
		</div>
	</div>
</div>
	<div class="collapse" id="collapseKemiripan">
		<h2 style="margin-top: 2rem; margin-bottom: 2rem;">Tabel Perbandingan Kemiripan Kasus</h2>
		<div class="row justify-content-md-center">
		<div class="col-md-10">
			<table class="table table-sm table-bordered" align="center" style="text-align: center;">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Ranking</th>
		      <th scope="col">Kasus</th>
		      <th scope="col">Keputusan</th>
		      <th>Jumlah Kasus yang Cocok</th>
		      <th scope="col">Persentase Kemiripan(%)</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$no_rank=1;
		  		for ($tbl_rank=0; $tbl_rank < 5; $tbl_rank++) { 
		  		 	echo "<tr>
		  					<th scope='row'>".$no_rank++."</th>
		  					<td># ".$tbl_ary[$tbl_rank][0]."</td>
		  					<td>".$tbl_ary[$tbl_rank][2]."</td>
		  					<td>".$tbl_ary[$tbl_rank][1]."</td>
		  					<td>".$tbl_ary[$tbl_rank][3]."</td>";	
		  		 } 
		  	 ?>
		  </tbody>
		</table>
		</div>	
	</div>
</div>
			
</div>
