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
                     Mikro Worker Jantina
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



<?php foreach ($model3 as $key => $value) {

   // store data in array
   $lelaki[] = (int)$value['lelaki']; // x axis must integer value
   $perempuan[] = (int)$value['perempuan']; // x axis must integer value
   $state[] = $value['state'];
 
}
// store array data to temp variable
$xAxis = $state; 
$yAxisP = $perempuan;
$yAxisL = $lelaki;

echo Highcharts::widget([
  'scripts' => [
     'modules/exporting', // adds Exporting button/menu to chart
  ],
   'options' => [
      'chart' => [
          'type' => 'column'
          ],
        'title' => ['text' => 'Slru - Mikro Worker Jantina'],
        'xAxis' => [
          'categories' => $xAxis,
        ],
        'yAxis' => [
          'title' => ['text' => 'Jumlah']
        ],
        'series' => [
          ['name' => 'Lelaki', 'data' => $yAxisL],
          ['name' => 'Perempuan', 'data' => $yAxisP]
      ]
   ]
]); ?>

<br>
<hr>
<ul>
<?php 


foreach ($model_state as $key => $value) { ?>

<li><?= Html::a($value['state'], ['slru/sm1']) ?></li>

<?php } ?>
</ul>



                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <!-- END PAGE CONTENT INNER -->
        


        </div>
    </div>
    <!-- END PAGE CONTENT -->