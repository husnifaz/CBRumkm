<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Tabel Hasil Prediksi</strong>
                          </div>
                          <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered table-sm">
                     <thead style="font-size: 9pt;">
                        <tr>
                          <th>No</th>
                          <th>ID Hasil</th>
                          <th>ID Kasus</th>
                          <th>Nama Usaha</th>
                          <th>Nama Pemilik</th>
                          <th>Alamat</th>
                          <th>Keputusan</th>
                          <th>Persentase</th>
                          <th>Tanggal</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody style="font-size: 9pt;"> 
                       <?php 
                    $no_tbl=1;
                    $querytbl=mysql_query(
                                "SELECT hsl_prediksi.id_hp,
                                hsl_prediksi.id_kasus,
                                user.nama,
                                hsl_prediksi.nama_usaha,
                                hsl_prediksi.alamat,
                								t_keputusan.keputusan,
                								hsl_prediksi.persentase, 
                                DATE_FORMAT(tgl, '%d-%m-%Y') 
							FROM 	hsl_prediksi,
								    t_keputusan,
                    user
							where 	
                user.id_user=hsl_prediksi.id_user AND
								t_keputusan.id_keputusan=hsl_prediksi.id_keputusan") 
                    or die(mysql_error());
                    while ($cek_querytbl=mysql_fetch_row($querytbl)) {
                      echo "<tr>
                              <td>".$no_tbl++."</td>
                              <td>".$cek_querytbl[0]."</td>
                              <td>".$cek_querytbl[1]."</td>
                              <td>".$cek_querytbl[2]."</td>
                              <td>".$cek_querytbl[3]."</td>
                              <td>".$cek_querytbl[4]."</td>
                              <td>".$cek_querytbl[5]."</td>
                              <td>".$cek_querytbl[6]."</td>
                              <td>".$cek_querytbl[7]."</td>
                             
                              <td><a onclick='return konfirmasi()' href='?admcbr=hapushasil&id=".$cek_querytbl[0].
                                  "' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></a></td>
                            </tr>";
                        }
                    ?>
                        </tbody>
                    </table>
                          </div>
                      </div>
                  </div>

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

<style type="text/css">
	td{
		text-align: center;
	}
</style>


<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/datatables-init.js"></script>