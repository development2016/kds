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
                                        'y' => $pendidikan,
                                         'sliced' => true,
                                        'selected' => true
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
          'data' => [1,2]
        ],
        [
          'name' => 'Kesihatan',
          'data' => [1,2]
        ],
        [
          'name' => 'Pendidikan',
          'data' => [1,2]
        ],
        [
          'name' => 'Keusahawanan',
          'data' => [1,2]
        ],
        [
          'name' => 'Riadah',
          'data' => [1,2]
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