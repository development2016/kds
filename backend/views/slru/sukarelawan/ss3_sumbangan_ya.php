<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>
<br><br>


<?php foreach ($model26 as $key => $value) {

   // store data in array
   $fasilitator_ya[] = (int)$value['fasilitator_ya']; // x axis must integer value
 
   $tenaga_ya[] = (int)$value['tenaga_ya']; // x axis must integer value
  
   $fotografi_ya[] = (int)$value['fotografi_ya']; // x axis must integer value
  
   $lain_ya[] = (int)$value['lain_ya']; // x axis must integer value
  

   $state[] = $value['state'];
 
}
// store array data to temp variable
$xAxis = $state; 
$yAxisA = $fasilitator_ya;

$yAxisC = $tenaga_ya;

$yAxisE = $fotografi_ya;

$yAxisO = $lain_ya;



echo Highcharts::widget([
  'scripts' => [
     'modules/exporting', // adds Exporting button/menu to chart
  ],
   'options' => [
      'chart' => [
          'type' => 'column'
          ],
        'title' => ['text' => 'Slru - Sukarelawan Sumbangan - Ya '],
        'xAxis' => [
          'categories' => $xAxis,
        ],



        'yAxis' => [
              'title' => ['text' => 'Jumlah'],

             /*'stackLabels' => [
                  'enabled' => true,
                  'rotation' => -90,


             'style' => [
                  'fontWeight' => ['bold'],
                  'color' => ['(Highcharts.theme && Highcharts.theme.textColor) || gray']    
                ]
               ]*/

        ],



        
        'plotOptions' => [
          'column' => [
            'stacking'=> ['normal'],
           
           /* 'dataLabels' => [
              'enabled' => true,
              'rotation' => -90,
             
              //'y' => -100,
             



               
              'color' => ['(Highcharts.theme && Highcharts.theme.dataLabelsColor) || white'],
              ' style' => [
                        'textShadow' => ['0 0 3px black'],
            ]
            ]*/
            ]
        ],








        'series' => [
         
          [
          'name' => 'fasilitator_ya', 
          'data' => $yAxisA,
          'stack' => 'a'

          ],
         
           [
          'name' => 'tenaga_ya', 
          'data' => $yAxisC,
          'stack' => 'b'

          ],
         
           [
          'name' => 'fotografi_ya', 
          'data' => $yAxisE,
          'stack' => 'c'

          ],
           
          [
          'name' => 'lain_ya', 
          'data' => $yAxisO,
          'stack' => 'd'
          ],
          



      ]
   ]
]); ?>

<br>

<table class="table table-striped table-bordered">
<?php foreach ($model26 as $key => $value) { ?>
  <tr>
    <td><?=  $value['state']; ?></td>
    <td><?=  $value['fasilitator_ya']; ?></td>
    <td><?=  $value['tenaga_ya']; ?></td>
    <td><?=  $value['fotografi_ya']; ?></td>
    <td><?=  $value['lain_ya']; ?></td>
   

  </tr>
<?php } ?>
</table>
