<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>
<br><br>


<?php foreach ($model23 as $key => $value) {

   // store data in array
   $prog_kanak_ya[] = (int)$value['prog_kanak_ya']; // x axis must integer value
 
   $prog_kemasyarakatan_ya[] = (int)$value['prog_kemasyarakatan_ya']; // x axis must integer value
  
   $prog_warga_ya[] = (int)$value['prog_warga_ya']; // x axis must integer value
 
   $prog_oku_ya[] = (int)$value['prog_oku_ya']; // x axis must integer value
  
   $aktiviti_rekreasi_ya[] = (int)$value['aktiviti_rekreasi_ya']; // x axis must integer value
   
   $prog_kesihatan_ya[] = (int)$value['prog_kesihatan_ya']; // x axis must integer value
  
   $prog_akademik_ya[] = (int)$value['prog_akademik_ya']; // x axis must integer value
  
   $lain_ya[] = (int)$value['lain_ya']; // x axis must integer value
  

   $state[] = $value['state'];
 
}
// store array data to temp variable
$xAxis = $state; 
$yAxisA = $prog_kanak_ya;

$yAxisC = $prog_kemasyarakatan_ya;

$yAxisE = $prog_warga_ya;

$yAxisG = $prog_oku_ya;

$yAxisI = $aktiviti_rekreasi_ya;

$yAxisK = $prog_kesihatan_ya;

$yAxisM = $prog_akademik_ya;

$yAxisO = $lain_ya;



echo Highcharts::widget([
  'scripts' => [
     'modules/exporting', // adds Exporting button/menu to chart
  ],
   'options' => [
      'chart' => [
          'type' => 'column'
          ],
        'title' => ['text' => 'Slru - Sukarelawan Minat Progam - Ya'],
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
          'name' => 'prog_kanak_ya', 
          'data' => $yAxisA,
          'stack' => 'a'

          ],
         
           [
          'name' => 'prog_kemasyarakatan_ya', 
          'data' => $yAxisC,
          'stack' => 'b'

          ],
         
           [
          'name' => 'prog_warga_ya', 
          'data' => $yAxisE,
          'stack' => 'c'
          ],
          
          [
          'name' => 'prog_oku_ya', 
          'data' => $yAxisG,
          'stack' => 'd'
          ],
         
          [
          'name' => 'aktiviti_rekreasi_ya', 
          'data' => $yAxisI,
          'stack' => 'e'
          ],
          
          [
          'name' => 'prog_kesihatan_ya', 
          'data' => $yAxisK,
          'stack' => 'f'
          ],
         
          [
          'name' => 'prog_akademik_ya', 
          'data' => $yAxisM,
          'stack' => 'g'
          ],
         
          [
          'name' => 'lain_ya', 
          'data' => $yAxisO,
          'stack' => 'h'
          ],
          



      ]
   ]
]); ?>

<br>

<table class="table table-striped table-bordered">
<?php foreach ($model23 as $key => $value) { ?>
  <tr>
    <td><?=  $value['state']; ?></td>
    <td><?=  $value['prog_kanak_ya']; ?></td>
   
    <td><?=  $value['prog_kemasyarakatan_ya']; ?></td>
    
    <td><?=  $value['prog_warga_ya']; ?></td>
    
    <td><?=  $value['prog_oku_ya']; ?></td>
    
    <td><?=  $value['aktiviti_rekreasi_ya']; ?></td>
   
    <td><?=  $value['prog_kesihatan_ya']; ?></td>
   
    <td><?=  $value['prog_akademik_ya']; ?></td>
   
    <td><?=  $value['lain_ya']; ?></td>
   

  </tr>
<?php } ?>
</table>
