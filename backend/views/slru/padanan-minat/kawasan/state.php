<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Slru</h1>
            </div>
            <!-- END PAGE TITLE -->

        </div>
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Slru</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Demografi Jantina
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">

                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
    
                     <?php  

                      foreach ($model as $key => $value) {
                            $ict = (int)$value['ict'];
                            $kesihatan = (int)$value['kesihatan'];
                            $pendidikan = (int)$value['pendidikan'];
                            $keusahawanan = (int)$value['keusahawanan'];
                            $riadah = (int)$value['riadah'];
                            $state = $value['state'];
                      }


                      echo Highcharts::widget([

                              'options' => [
                              'chart' => [
                                  'type' =>'pie',
                                
                              ],

                              'title' => [
                                'text' => 'Graf Pie Minat keseluruhan - '.$state,
                                
                              ],
                              'plotOptions' => [
                                'pie' => [
                                    'allowPointSelect' => true,
                                    'cursor' => 'pointer',
                                    'dataLabels' => [
                                        'enabled' => true,
                                        'format' => '<b>{point.name}</b> : {point.y} - {point.percentage:.1f}%',
                                    ]
                                ]
                              ],

                              'series' => [
                                 [
                                   'name' => 'Minat', 
                                   'data' => [
                                      [
                                        'name' => 'ICT',
                                        'y' => $ict
                                      ],
                                      [
                                        'name' => 'Kesihatan',
                                        'y' => $kesihatan
                                      ],
                                      [
                                        'name' => 'Pendidikan',
                                        'y' => $pendidikan
                                      ],
                                      [
                                        'name' => 'Keusahawanan',
                                        'y' => $keusahawanan
                                      ],
                                      [
                                        'name' => 'Riadah',
                                        'y' => $riadah
                                      ]

                                   ]
                                 ],

                              ]
                           ]
                        ]); ?>

<br>
<?php foreach ($model2 as $key => $value2) {

	$state = $value2['state'];
	$district[] = $value2['district'];
  if ($value2['district_id'] == 6 ) {

    $bentong21 = (int)$value2['ict'];
    $bentong22 = (int)$value2['kesihatan'];
    $bentong23 = (int)$value2['pendidikan'];
    $bentong24 = (int)$value2['keusahawanan'];
    $bentong25 = (int)$value2['riadah'];

  }
  if ($value2['district_id'] == 7 ) {
    $temerloh21 = (int)$value2['ict'];
    $temerloh22 = (int)$value2['kesihatan'];
    $temerloh23 = (int)$value2['pendidikan'];
    $temerloh24 = (int)$value2['keusahawanan'];
    $temerloh25 = (int)$value2['riadah'];

  }
  if ($value2['district_id'] == 8 ) {
    $rompin21 = (int)$value2['ict'];
    $rompin22 = (int)$value2['kesihatan'];
    $rompin23 = (int)$value2['pendidikan'];
    $rompin24 = (int)$value2['keusahawanan'];
    $rompin25 = (int)$value2['riadah'];

  }
  if ($value2['district_id'] == 9 ) {
    $jerantut21 = (int)$value2['ict'];
    $jerantut22 = (int)$value2['kesihatan'];
    $jerantut23 = (int)$value2['pendidikan'];
    $jerantut24 = (int)$value2['keusahawanan'];
    $jerantut25 = (int)$value2['riadah'];

  }
  if ($value2['district_id'] == 10 ) {
    $maran21 = (int)$value2['ict'];
    $maran22 = (int)$value2['kesihatan'];
    $maran23 = (int)$value2['pendidikan'];
    $maran24 = (int)$value2['keusahawanan'];
    $maran25 = (int)$value2['riadah'];

  }
  if ($value2['district_id'] == 11 ) {
    $bera21 = (int)$value2['ict'];
    $bera22 = (int)$value2['kesihatan'];
    $bera23 = (int)$value2['pendidikan'];
    $bera24 = (int)$value2['keusahawanan'];
    $bera25 = (int)$value2['riadah'];

  }
  if ($value2['district_id'] == 12 ) {
    $kuantan21 = (int)$value2['ict'];
    $kuantan22 = (int)$value2['kesihatan'];
    $kuantan23 = (int)$value2['pendidikan'];
    $kuantan24 = (int)$value2['keusahawanan'];
    $kuantan25 = (int)$value2['riadah'];

  }
  if ($value2['district_id'] == 13 ) {
    $raub21 = (int)$value2['ict'];
    $raub22 = (int)$value2['kesihatan'];
    $raub23 = (int)$value2['pendidikan'];
    $raub24 = (int)$value2['keusahawanan'];
    $raub25 = (int)$value2['riadah'];

  }
   if ($value2['district_id'] == 14 ) {
    $lipis21 = (int)$value2['ict'];
    $lipis22 = (int)$value2['kesihatan'];
    $lipis23 = (int)$value2['pendidikan'];
    $lipis24 = (int)$value2['keusahawanan'];
    $lipis25 = (int)$value2['riadah'];

  }
   if ($value2['district_id'] == 15 ) {
    $pekan21 = (int)$value2['ict'];
    $pekan22 = (int)$value2['kesihatan'];
    $pekan23 = (int)$value2['pendidikan'];
    $pekan24 = (int)$value2['keusahawanan'];
    $pekan25 = (int)$value2['riadah'];

  }
   if ($value2['district_id'] == 16 ) {
    $cameron21 = (int)$value2['ict'];
    $cameron22 = (int)$value2['kesihatan'];
    $cameron23 = (int)$value2['pendidikan'];
    $cameron24 = (int)$value2['keusahawanan'];
    $cameron25 = (int)$value2['riadah'];

  }
} 
echo Highcharts::widget([
   'options' => [

       'chart' => [
          'type' =>'column',
          'renderTo' => 'ictchart3',
          //'width' => '850'

      ],

      'title' => [
      	'text' => 'Graf Minat By Group - '.$state
      ],
      'xAxis' => [
         'categories' => $district
      ],
      'yAxis' => [
         'title' => ['text' => 'Jumlah']
      ],
      'exporting' => [
        'enabled'=> false
      ],
         

      'series' => [
        [
          'name' => 'ICT', 
          'data' => [$bentong21,$temerloh21,$rompin21,$jerantut21,$maran21,$bera21,$kuantan21,$raub21,$lipis21,$pekan21,$cameron21]
        ],
        [
          'name' => 'Kesihatan',
          'data' => [$bentong22,$temerloh22,$rompin22,$jerantut22,$maran22,$bera22,$kuantan22,$raub22,$lipis22,$pekan22,$cameron22]
        ],
        [
          'name' => 'Pendidikan',
          'data' => [$bentong23,$temerloh23,$rompin23,$jerantut23,$maran23,$bera23,$kuantan23,$raub23,$lipis23,$pekan23,$cameron23]
        ],
        [
          'name' => 'Keusahawanan',
          'data' => [$bentong24,$temerloh24,$rompin24,$jerantut24,$maran24,$bera24,$kuantan24,$raub24,$lipis24,$pekan24,$cameron24]
        ],
        [
          'name' => 'Riadah',
          'data' => [$bentong25,$temerloh25,$rompin25,$jerantut25,$maran25,$bera25,$kuantan25,$raub25,$lipis25,$pekan25,$cameron25]
        ]
      ]
   ]
]);

?>

<div id="ictchart3"></div>



                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <!-- END PAGE CONTENT INNER -->
        


        </div>
    </div>
    <!-- END PAGE CONTENT -->