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
      'text' => 'Graf Bar Pendapatan OKU Mengikut Negeri',
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
          'data' => [110,128,148,16]
        ],
        [
          'name' => 'RM 401 - RM 800', 
          'data' => [31,33,45,4]
        ],
        [
          'name' => 'RM 801 - RM 1200', 
          'data' => [13,14,29,9]
        ],
        [
          'name' => 'RM 1201 - RM 1600', 
          'data' => [1,4,3,0]
        ],
        [
          'name' => 'RM 1601 - RM 2000', 
          'data' => [2,1,1,1]
        ],
        
         

        
        
      ]
   ]
]);

?>