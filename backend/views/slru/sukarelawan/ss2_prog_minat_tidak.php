<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>
<br><br>


<?php foreach ($model24 as $key => $value) {

   // store data in array
   
   $prog_kanak_tidak[] = (int)$value['prog_kanak_tidak']; // x axis must integer value
   
   $prog_kemasyarakatan_tidak[] = (int)$value['prog_kemasyarakatan_tidak']; // x axis must integer value
   
   $prog_warga_tidak[] = (int)$value['prog_warga_tidak']; // x axis must integer value
  
   $prog_oku_tidak[] = (int)$value['prog_oku_tidak']; // x axis must integer value
   
   $aktiviti_rekreasi_tidak[] = (int)$value['aktiviti_rekreasi_tidak']; // x axis must integer value
   
   $prog_kesihatan_tidak[] = (int)$value['prog_kesihatan_tidak']; // x axis must integer value
  
   $prog_akademik_tidak[] = (int)$value['prog_akademik_tidak']; // x axis must integer value
  
   $lain_tidak[] = (int)$value['lain_tidak']; // x axis must integer value

   $state[] = $value['state'];
 
}
// store array data to temp variable
$xAxis = $state; 

$yAxisB = $prog_kanak_tidak;

$yAxisD = $prog_kemasyarakatan_tidak;

$yAxisF = $prog_warga_tidak;

$yAxisH = $prog_oku_tidak;

$yAxisJ = $aktiviti_rekreasi_tidak;

$yAxisL = $prog_kesihatan_tidak;

$yAxisN = $prog_akademik_tidak;

$yAxisP = $lain_tidak;


echo Highcharts::widget([
  'scripts' => [
     'modules/exporting', // adds Exporting button/menu to chart
  ],
   'options' => [
      'chart' => [
          'type' => 'column'
          ],
        'title' => ['text' => 'Slru - Sukarelawan Minat Progam - Tidak'],
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
          'name' => 'prog_kanak_tidak', 
          'data' => $yAxisB,
          'stack' => 'a'

          ],
           
          [
          'name' => 'prog_kemasyarakatan_tidak', 
          'data' => $yAxisD,
          'stack' => 'b'
          ],
           
          [
          'name' => 'prog_warga_tidak', 
          'data' => $yAxisF,
          'stack' => 'c'
          ],
         
          [
          'name' => 'prog_oku_tidak', 
          'data' => $yAxisH,
          'stack' => 'd'
          ],
          
          [
          'name' => 'aktiviti_rekreasi_tidak', 
          'data' => $yAxisJ,
          'stack' => 'e'
          ],
          
          [
          'name' => 'prog_kesihatan_tidak', 
          'data' => $yAxisL,
          'stack' => 'f'
          ],
         
          [
          'name' => 'prog_akademik_tidak', 
          'data' => $yAxisN,
          'stack' => 'g'
          ],
          
          [
          'name' => 'lain_tidak', 
          'data' => $yAxisP,
          'stack' => 'h'
          ],



      ]
   ]
]); ?>

<br>

<table class="table table-striped table-bordered">
<?php foreach ($model24 as $key => $value) { ?>
  <tr>
    <td><?=  $value['state']; ?></td>
    
    <td><?=  $value['prog_kanak_tidak']; ?></td>
   
    <td><?=  $value['prog_kemasyarakatan_tidak']; ?></td>
   
    <td><?=  $value['prog_warga_tidak']; ?></td>
   
    <td><?=  $value['prog_oku_tidak']; ?></td>
    
    <td><?=  $value['aktiviti_rekreasi_tidak']; ?></td>
   
    <td><?=  $value['prog_kesihatan_tidak']; ?></td>
    
    <td><?=  $value['prog_akademik_tidak']; ?></td>
   
    <td><?=  $value['lain_tidak']; ?></td>

  </tr>
<?php } ?>
</table>
