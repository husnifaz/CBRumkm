        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <strong class="card-title">Tabel Kasus</strong>
                          </div>
                          <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered table-sm">
                     <thead style="font-size: 9pt;">
                        <tr>
                          <th>No</th>
                          <th>ID Kasus</th>
                          <th>Prospek Peluang Usaha</th>
                          <th>Kesulitan Yang Dialami</th>
                          <th>Prosepek 3 Bulan Lalu</th>
                          <th>Pendidikan Pemilik</th>
                          <th>Total Aset</th>
                          <th>Provinsi</th>
                          <th>Balas Jasa</th>
                          <th>Pengguna Komputer</th>
                          <th>Tahun Mulai Operasi</th>
                          <th>Rencana Kedepan</th>
                          <th>Bentuk Badan Hukum</th>
                          <th>Keputusan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody style="font-size: 9pt;">
                       <?php 
                    $no_tbl=1;
                    $querytbl=mysql_query(
                                "SELECT * FROM t_kasus") or die(mysql_error());
                    while ($cek_querytbl=mysql_fetch_row($querytbl)) {
                      echo "<tr>
                              <td>".$no_tbl++."</td>
                              <td>#".$cek_querytbl[0]."</td>
                              <td>".$cek_querytbl[1]."</td>
                              <td>".$cek_querytbl[2]."</td>
                              <td>".$cek_querytbl[3]."</td>
                              <td>".$cek_querytbl[4]."</td>
                              <td>".$cek_querytbl[5]."</td>
                              <td>".$cek_querytbl[6]."</td>
                              <td>".$cek_querytbl[7]."</td>
                              <td>".$cek_querytbl[8]."</td>
                              <td>".$cek_querytbl[9]."</td>
                              <td>".$cek_querytbl[10]."</td>
                              <td>".$cek_querytbl[11]."</td>
                              <td>".$cek_querytbl[12]."</td>
                              <td><a onclick='return konfirmasi()' href='?admcbr=delete-kasus&id=".$cek_querytbl[0].
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