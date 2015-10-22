<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>
<br><br>


<?php foreach ($model25 as $key => $value) {

   // store data in array
   $fasilitator_ya[] = (int)$value['fasilitator_ya']; // x axis must integer value
   $fasilitator_tidak[] = (int)$value['fasilitator_tidak']; // x axis must integer value
   $tenaga_ya[] = (int)$value['tenaga_ya']; // x axis must integer value
   $tenaga_tidak[] = (int)$value['tenaga_tidak']; // x axis must integer value
   $fotografi_ya[] = (int)$value['fotografi_ya']; // x axis must integer value
   $fotografi_tidak[] = (int)$value['fotografi_tidak']; // x axis must integer value
   $lain_ya[] = (int)$value['lain_ya']; // x axis must integer value
   $lain_tidak[] = (int)$value['lain_tidak']; // x axis must integer value
  
   $state[] = $value['state'];
 
}
// store array data to temp variable
$xAxis = $state; 
$yAxisA = $fasilitator_ya;
$yAxisB = $fasilitator_tidak;
$yAxisC = $tenaga_ya;
$yAxisD = $tenaga_tidak;
$yAxisE = $fotografi_ya;
$yAxisF = $fotografi_tidak;
$yAxisG = $lain_ya;
$yAxisH = $lain_tidak;


echo Highcharts::widget([
  'scripts' => [
     'modules/exporting', // adds Exporting button/menu to chart
  ],
   'options' => [
      'chart' => [
          'type' => 'column'
          ],
        'title' => ['text' => 'Slru - Sukarelawan Sumbangan'],
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
          'name' => 'fasilitator_tidak', 
          'data' => $yAxisB,
          'stack' => 'a'

          ],
           [
          'name' => 'tenaga_ya', 
          'data' => $yAxisC,
          'stack' => 'b'

          ],
          [
          'name' => 'tenaga_tidak', 
          'data' => $yAxisD,
          'stack' => 'b'
          ],
           [
          'name' => 'fotografi_ya', 
          'data' => $yAxisE,
          'stack' => 'c'
          ],
          [
          'name' => 'fotografi_tidak', 
          'data' => $yAxisF,
          'stack' => 'c'
          ],
          [
          'name' => 'lain_ya', 
          'data' => $yAxisG,
          'stack' => 'd'
          ],
          [
          'name' => 'lain_tidak', 
          'data' => $yAxisH,
          'stack' => 'd'
          ],
          



      ]
   ]
]); ?>

<br>

<table class="table table-striped table-bordered">
<?php foreach ($model25 as $key => $value) { ?>
  <tr>
    <td><?=  $value['state']; ?></td>
    <td><?=  $value['fasilitator_ya']; ?></td>
    <td><?=  $value['fasilitator_tidak']; ?></td>
    <td><?=  $value['tenaga_ya']; ?></td>
    <td><?=  $value['tenaga_tidak']; ?></td>
    <td><?=  $value['fotografi_ya']; ?></td>
    <td><?=  $value['fotografi_tidak']; ?></td>
    <td><?=  $value['lain_ya']; ?></td>
    <td><?=  $value['lain_tidak']; ?></td>

  </tr>
<?php } ?>
</table>
