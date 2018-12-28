        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Tabel Masukan dan Laporan</strong>
                          </div>
                          <div class="card-body">
                          	<table id="bootstrap-data-table" class="table table-striped table-bordered table-sm">
		                    <thead style="font-size: 9pt;">
		                        <tr>
		                          <th>No</th>
		                          <th>ID Pengguna</th>
		                          <th>Jenis Masukan</th>
		                          <th>Isi</th>
		                          <th>tanggal</th>
		                          <th>Aksi</th>
		                        </tr>
		                    </thead>
		                    <tbody style="font-size: 9pt;">
		                       <?php 

		                    function wordlimit($text,$limit=40){
		                    	if (strlen($text)>$limit) 
		                    		$word=mb_substr($text,0, $limit-3)."...";
		                    	else
		                    		$word=$text;
		                    	return $word;
		                    }

		                    $no_tbl=1;
		                    $querytbl=mysql_query(
		                                "SELECT * FROM feedback") or die(mysql_error());
		                    while ($cek_querytbl=mysql_fetch_row($querytbl)) {
		                    	$isisplit=wordlimit($cek_querytbl[3]);
		                        echo "<tr>
		                              <td>".$no_tbl++."</td>
		                              <td>".$cek_querytbl[1]."</td>
		                              <td>".$cek_querytbl[2]."</td>
		                              <td>".$isisplit."</td>
		                              <td>".$cek_querytbl[4]."</td>
		                              <td align='center'><a onclick='return konfirmasi()' href='?admcbr=masukandelete&id=".$cek_querytbl[0].
		                                  "' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></a>
		                                  <a href='?admcbr=detail-masukan&id=".$cek_querytbl[0].
		                                  "' class='btn btn-primary btn-sm'><span class='fa fa-share-square-o'></span></a>
		                                  </td>
		                            </tr>";
		                        }
		                    ?>
		                    </tbody>
                    </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
