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
      'text' => 'Graf Bar Jumlah Wanita Mengikut Padanan Minat Bagi Setiap Negeri',
          'style' => [
          'fontSize' => '25px',
          'fontWeight' => 'normal',
        ],

      ],
      'xAxis' => [
         'categories' => ['Pahang','Perlis','Perak','Kedah','Terengganu','Johor'],
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
                'name' => 'ICT',
                'data' => [9256,5130,5506,245,5915,882]
              ],
              [
                'name' => 'Kesihatan',
                'data' => [13883,8321,9284,351,7592,1388]
              ],
              [
                'name' => 'Pendidikan',
                'data' => [14257,8969,11740,385,8922,1079]
              ],
              [
                'name' => 'Keusahawanan',
                'data' => [11841,6924,9380,368,7202,1193]
              ],
               [
                'name' => 'Riadah',
                'data' => [11969,6395,6326,311,7428,1079]
              ],
       
        
         

        
        
      ]
   ]
]);

?>