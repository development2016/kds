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
      'text' => 'Graf Bar Perbelanjaan OKU Mengikut Negeri',
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
          'name' => 'Kurang RM 400', 
          'data' => [101,138,157,17]
        ],
        [
          'name' => 'RM 401 - RM 800', 
          'data' => [42,25,45,6]
        ],
        [
          'name' => 'RM 801 - RM 1200', 
          'data' => [7,14,17,5]
        ],
        [
          'name' => 'RM 1201 - RM 1600', 
          'data' => [4,2,7,1]
        ],

         [
          'name' => 'RM 1601 - RM 2000', 
          'data' => [1,1,1,0]
        ],
         [
          'name' => 'RM 2001 - RM 2400', 
          'data' => [0,0,1,1]
        ],
         

        
        
      ]
   ]
]);

?>