<div class="container con-awal">
	<div class="row">
    	<div class="col">
    		<div id="col-fs"></div>
    		<h4 style="margin-bottom: 1rem;">RIWAYAT PENGUJIAN</h4>
    		<table class="table table-sm table-bordered table-hover">
			  <thead class="thead-dark">
			    <tr>
			      <th>No</th>
			      <th>Nama Usaha</th>
			      <th>Keputusan</th>
			      <th>Persentase</th>
			      <th>Tanggal</th>
			    </tr>
			  </thead>
			  <?php 
			  	$query=mysql_query("SELECT hsl_prediksi.nama_usaha, t_keputusan.keputusan, hsl_prediksi.persentase, DATE_FORMAT(tgl, '%d-%m-%Y') from hsl_prediksi, t_keputusan where t_keputusan.id_keputusan=hsl_prediksi.id_keputusan and hsl_prediksi.id_user=".$_SESSION['iduser'])or die(mysql_error());
			  	
			   ?>
			  <tbody>
			    <tr>
			      <?php 
			      $nourut=1;
			      while ($listquery=mysql_fetch_row($query)) {
			      	echo "<tr>
			      	<td>".$nourut++."</td>
			      	<td>".$listquery[0]."</td>
			      	<td>".$listquery[1]."</td>
			      	<td>".$listquery[2]."</td>
			      	<td>".$listquery[3]."</td>
			      	</tr>";
			      }
			       ?>
			    </tr>
			  </tbody>
			</table>
    	</div>
    </div>
</div>