        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
                <div class="col-sm-12 mb-4">
                        <div class="card-group">
                            <div class="card col-lg-4 col-md-6 no-padding no-shadow">
                                <div class="card-body bg-flat-color-1">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-book text-light"></i>
                                    </div>
                                    <div class="h4 mb-0 text-light">
                                        <?php 
                                            $jml_kasus=mysql_query("SELECT count(id_kasus) from t_kasus")or die(mysql_error());
                                            $col_jml_kasus=mysql_fetch_row($jml_kasus);
                                         ?>
                                        <span class="count"><?php echo $col_jml_kasus[0]; ?></span>
                                    </div>
                                    <small class="text-uppercase font-weight-bold text-light">Total Kasus</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-lg-4 col-md-6 no-padding no-shadow">
                                <div class="card-body bg-flat-color-5">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-user-plus text-light"></i>
                                    </div>
                                    <div class="h4 mb-0 text-light">
                                        <?php 
                                            $jml_hasil=mysql_query("SELECT count(id_hp) from hsl_prediksi")or die(mysql_error());
                                            $col_jml_hasil=mysql_fetch_row($jml_hasil);
                                         ?>
                                        <span class="count"><?php echo $col_jml_hasil[0]; ?></span>
                                    </div>
                                    <small class="text-uppercase font-weight-bold text-light">Hasil Prediksi</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-lg-4 col-md-6 no-padding no-shadow">
                                <div class="card-body bg-flat-color-4">
                                    <div class="h1 text-right mb-4">
                                        <i class="fa fa-user text-light"></i>
                                    </div>
                                    <div class="h4 mb-0 text-light">
                                        <?php 
                                            $jml_user=mysql_query("SELECT count(id_user) from user")or die(mysql_error());
                                            $col_jml_user=mysql_fetch_row($jml_user);
                                         ?>
                                        <span class="count"><?php echo $col_jml_user[0]; ?></span>
                                    </div>
                                    <small class="text-light text-uppercase font-weight-bold">Jumlah User</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content mt-3">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mb-3">Grafik Persentase Menerima Bantuan</h4>
                                             <div id="chartdiv"></div>
                                        </div>
                                    </div>
                                </div><!-- /# column -->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mb-3">Grafik Kategori Kriteria </h4>
                                            <select name="selectSm" id="SelectLm" class="form-control-sm form-control" onchange="getData();">
                                                <?php  $cmb_isi=$_GET['q']; ?>
                                                <option value="0" <?php if ($cmb_isi==0){echo "selected";} ?>>Pulau</option>
                                                <option value="1" <?php if ($cmb_isi==1){echo "selected";} ?>>Pendidikan Pemilik</option>
                                                <option value="3" <?php if ($cmb_isi==3){echo "selected";} ?>>Tahun Mulai Operasi</option>
                                                <option value="4" <?php if ($cmb_isi==4){echo "selected";} ?>>Pengguna Komputer</option>
                                                <option value="5" <?php if ($cmb_isi==5){echo "selected";} ?>>Total Aset</option>
                                                <option value="6" <?php if ($cmb_isi==6){echo "selected";} ?>>Kesulitan</option>
                                                <option value="7" <?php if ($cmb_isi==7){echo "selected";} ?>>Prospek Peluang Usaha</option>
                                                <option value="8" <?php if ($cmb_isi==8){echo "selected";} ?>>Prospek 3 Bulan Lalu</option>
                                                <option value="9" <?php if ($cmb_isi==9){echo "selected";} ?>>Rencana</option>
                                                <option value="10" <?php if ($cmb_isi==10){echo "selected";} ?>>Balas Jasa</option>
                                              </select>
                                             <canvas id="singelBarChart"></canvas>
                                             <p id="hasil"></p>
                                        </div>
                                    </div>
                            </div><!-- /# column -->
                        </div>
                    </div><!-- .animated -->
                </div><!-- .content -->
        </div> <!-- .content -->

<?php 
    $q_kasus=mysql_query("SELECT id_keputusan, count(id_keputusan) from t_kasus group by id_keputusan")or die(mysql_error());
    $arr_q_kasus=array();
    while ($q_perc_kasus=mysql_fetch_row($q_kasus)) {
        $arr_q_kasus[]=$q_perc_kasus;
    }

   
    switch ($cmb_isi) {  
        case '1':
            $kritname="pendidikan_pemilik";
            break;
        case '3':
            $kritname="tahun_mulai";
            break;
        case '4':
            $kritname="p_komputer";
            break;
        case '5':
            $kritname="total_aset";
            break;
        case '6':
            $kritname="kesulitan";
            break;
        case '7':
            $kritname="prospel_usaha";
            break;
        case '8':
            $kritname="X3_bulan_lalu";
            break;
        case '9':
            $kritname="rencana";
            break;
        case '10':
            $kritname="balas_jasa";
            break;
        default:
            $kritname="pulau";
            break;
    }
    // $kritname="pulau";

    $query_cmb=mysql_query("SELECT t_".$kritname.".".$kritname.", count(t_kasus.id_".$kritname.") from t_kasus, t_".$kritname." where t_".$kritname.".id_".$kritname."=t_kasus.id_".$kritname." group by t_".$kritname.".".$kritname."") or die(mysql_error());

    $arr_cmb=array();
    $arr_kat=array();
    $arr_count=array();
    while ($row=mysql_fetch_row($query_cmb)) {
        $arr_cmb[]=$row;
    }

    $size_arr=sizeof($arr_cmb);
    print_r($size_arr);
    for ($i=0; $i < $size_arr; $i++) { 
        $arr_kat[]=$arr_cmb[$i][0];
    }
    for ($i=0; $i < $size_arr; $i++) { 
        $arr_count[]=$arr_cmb[$i][1];
    }

 ?>
<style>
    #chartdiv {
      width: 100%;
      height: 27rem;
    }
</style>      

    <script src="assets/js/lib/piechart/amcharts.min.js"></script>
    <script src="assets/js/lib/piechart/pie.js"></script>
    <script src="assets/js/lib/piechart/themelight.js"></script>
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>

    <script type="text/javascript" language="Javascript">

        var chart = AmCharts.makeChart( "chartdiv", {
          "type": "pie",
          "theme": "light",
          "dataProvider": [ {
            "country": "Ya",
            "litres": <?php echo $arr_q_kasus[1][1]; ?>
          }, {
            "country": "Tidak",
            "litres": <?php echo $arr_q_kasus[0][1]; ?>
          }],
          "valueField": "litres",
          "titleField": "country",
           "balloon":{
           "fixedPosition":true
          }
        } );

    function getData(){
        var cmb = document.getElementById("SelectLm").value;
        location.href="?q="+cmb;    
    }


    var arr_kat=<?php echo json_encode($arr_kat); ?>    
    var arr_count=<?php echo json_encode($arr_count); ?>

    var ctx = document.getElementById( "singelBarChart" );
    ctx.height = 250;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: arr_kat,
            datasets: [
                {
                    label: "Jumlah kasus",
                    data: arr_count,
                    borderColor: "rgba(244, 139, 141, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(244, 139, 141, 0.5)"
                            }
                        ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );

            </script>

