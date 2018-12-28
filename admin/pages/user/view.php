        <div class="content mt-3">

            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Tabel User</strong>
                              <a class="btn btn-primary" href="?admcbr=input-user" style="float: right; font-size: 9pt;"><i class="fa fa-plus"></i>&emsp;Tambahkan</a>
                          </div>
                          <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered table-sm">
                     <thead style="font-size: 9pt;">
                        <tr>
                          <th>No</th>
                          <th>ID USER</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Nomor Handphone</th>
                          <th>Hak Akses</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody style="font-size: 9pt;">
                       <?php 
                    $no_tbl=1;
                    $querytbl=mysql_query(
                                "SELECT * FROM user") or die(mysql_error());
                    while ($cek_querytbl=mysql_fetch_row($querytbl)) {
                    	if ($cek_querytbl[5]==1) {
                    		$hak_aces="Super Admin";
                    	}else{
                    		$hak_aces="User";
                    	}
                        echo "<tr>
                              <td>".$no_tbl++."</td>
                              <td>#".$cek_querytbl[0]."</td>
                              <td>".$cek_querytbl[1]."</td>
                              <td>".$cek_querytbl[2]."</td>
                              <td>".$cek_querytbl[3]."</td>
                              <td>".$cek_querytbl[4]."</td>
                              <td>".$hak_aces."</td>
                              <td align='center'>
                              <a href='?admcbr=edit-user&id=".$cek_querytbl[0].
                                  "' class='btn btn-primary btn-sm'><span class='fa fa-edit'></span></a>
                              <a onclick='return konfirmasi()' href='?admcbr=delete-user&id=".$cek_querytbl[0].
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

