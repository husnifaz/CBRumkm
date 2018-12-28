 <?php

   $nameser=($_REQUEST['admcbr']);

   switch ($nameser) {
      case 'tkrit1':
        $colname="Pulau";
        $tblname="t_pulau";
       break;
      case 'tkrit2':
       $colname="Pendidikan Pemilik";
        $tblname="t_pendidikan_pemilik";
       break;
      case 'tkrit3':
        $colname="Badan Hukum";
        $tblname="t_badan_hukum";
       break;
      case 'tkrit4':
        $colname="Tahun Mulai Operasi";
        $tblname="t_tahun_mulai";
       break;
      case 'tkrit5':
        $colname="Pengguna Komputer";
        $tblname="t_p_komputer";
       break;
      case 'tkrit6':
        $colname="Total Aset";
        $tblname="t_total_aset";
       break;
      case 'tkrit7':
        $colname="Kesulitan";
        $tblname="t_kesulitan";
       break;
      case 'tkrit8':
        $colname="Prospek Peluang Usaha";
        $tblname="t_prospel_usaha";
       break;
      case 'tkrit9':
        $colname="Prospek 3 Bulan Lalu";
        $tblname="t_x3_bulan_lalu";
       break;
      case 'tkrit10':
        $colname="Rencana";
        $tblname="t_rencana";
       break;
      case 'tkrit11':
        $colname="Balas Jasa";
        $tblname="t_balas_jasa";
       break;
     default:
       break;
   }
  
  ?>

       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tabel Kriteria</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                    <strong class="card-title"><?php echo "Tabel ".$colname; ?></strong>
                    <a class="btn btn-primary" href="?admcbr=input-kat" style="float: right; font-size: 9pt;"><i class="fa fa-plus"></i>&emsp;Tambahkan Kategori </a>
                </div>
                  <div class="card-body">
                    <table class="table table-bordered table-sm">
                       <thead style="text-align: center;">
                        <tr>
                          <th>No</th>
                          <th>ID</th>
                          <th>
                          <?php echo $colname; ?>
                          </th>
                          <th>Operasi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no_tbl=1;
                        $querytbl=mysql_query("SELECT * FROM ".$tblname) or die(mysql_error());
                        while ($cek_querytbl=mysql_fetch_row($querytbl)) {
                          echo "<tr>
                                  <td>".$no_tbl++."</td>
                                  <td>".$cek_querytbl[0]."</td>
                                  <td>".$cek_querytbl[1]."</td>
                                   <td align='center'>
                                  <a href='?admcbr=tkritedit&id=".$cek_querytbl[0].
                                  "' class='btn btn-primary'><span class='fa fa-edit'></span></a>
                                  <a onclick='return konfirmasi()' href='?admcbr=opdelete&id=".$cek_querytbl[0].
                                  "' class='btn btn-danger'><span class='fa fa-trash'></span></a></td>
                                  </tr>";
                        }
                       ?>
                      </tbody> 
                     </table>
                  </div>
                </div>
        </div>


        
<?php 
  $_SESSION['newtb']=$tblname;
  $_SESSION['nmsever']=$nameser;
  $_SESSION['colserver']=$colname;
 ?>     