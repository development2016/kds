<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>


<br><br>

<?php foreach ($model6 as $key => $value) {

   // store data in array
   $ya[] = (int)$value['ya']; // x axis must integer value
   $tidak[] = (int)$value['tidak']; // x axis must integer value
   $state[] = $value['state'];
 
}
// store array data to temp variable
$xAxis = $state; 
$yAxisP = $tidak;
$yAxisL = $ya;

echo Highcharts::widget([
  'scripts' => [
     'modules/exporting', // adds Exporting button/menu to chart
  ],
   'options' => [
      'chart' => [
          'type' => 'column',
               'height' => '600',
               ],
                                            'exporting' => [
                                'enabled'=> false
                              ],
        'title' => ['text' => 'Slru - Sukarelawan Progam Kanak-Kanak'],
        'xAxis' => [
          'categories' => $xAxis,
        ],
        'yAxis' => [
          'title' => ['text' => 'Jumlah']
        ],
        'series' => [
          ['name' => 'Ya', 'data' => $yAxisL],
          ['name' => 'Tidak', 'data' => $yAxisP]
      ]
   ]
]); ?>
