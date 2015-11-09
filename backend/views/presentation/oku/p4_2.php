<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */

?>

<?php echo Highcharts::widget([
   'options' => [

       'chart' => [
          'type' =>'column',
      ],

      'title' => [
      'text' => 'Graf Bar Jumlah OKU Mengikut Jantina Bagi Setiap Negeri',
          'style' => [
          'fontSize' => '25px',
          'fontWeight' => 'normal',
        ],

      ],
      'xAxis' => [
         'categories' => ['Perlis','Perak','Terengganu','Johor'],
         'labels' => [
              'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
              ],
         ]
        
      ],
      'yAxis' => [
         'title' => [
         	'text' => 'Jumlah',
              'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
              ],

         ],
         'labels' => [
         	'overflow' => 'justify'
         ],
      ],
      'plotOptions' => [
          'column' => [
  
            'dataLabels' => [
              'enabled' => true,
              'rotation' => -90,
              'y' => -30,
              'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
              ],
              'align' => 'center',]


            ]
        ],
      'credits' => [
      	'enabled' => false,
      ],


      'series' => [
        [
          'name' => 'Lelaki', 
          'data' => [106,117,147,16]
        ],
        [
          'name' => 'Perempuan',
          'data' => [60,64,84,14]
        ],
        
      ]
   ]
]);

?>