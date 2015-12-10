<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>
<br><br>

<?php foreach ($model22 as $key => $value) {

   // store data in array
   $ya[] = (int)$value['ya']; // x axis must integer value
   $tidak[] = (int)$value['tidak']; // x axis must integer value
   $district[] = $value['district'];
 
}
// store array data to temp variable
$xAxis = $district; 
$yAxisP = $tidak;
$yAxisL = $ya;

echo Highcharts::widget([
  'scripts' => [
     'modules/exporting', // adds Exporting button/menu to chart
  ],
   'options' => [
      'chart' => [
          'type' => 'column'
          ],
        'title' => ['text' => 'Slru - Sukarelawan Lain-lain'],
        'xAxis' => [
          'categories' => $xAxis,
        ],

        'yAxis' => [
          'title' => [

              'text' => 'Jumlah',
              'align' => 'high'],
          'labels' => ['overflow' => 'justify']
        ],



        'plotOptions' => [
          'column' => [
  
            'dataLabels' => [
              'enabled' => true,
              'align' => 'center',]


            ]
        ],
        
        'series' => [
          ['name' => 'Ya', 'data' => $yAxisL],
          ['name' => 'Tidak', 'data' => $yAxisP]
      ]
   ]
]); ?>

