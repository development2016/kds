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
      'text' => 'Graf Bar Jumlah Ibu Tunggal Mengikut Padanan Minat Bagi Setiap Negeri',
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
                'data' => [1254,452,817,20,865,180]
              ],
              [
                'name' => 'Kesihatan',
                'data' => [2821,1268,1884,63,1707,380]
              ],
              [
                'name' => 'Pendidikan',
                'data' => [2675,1249,2357,54,1874,447]
              ],
              [
                'name' => 'Keusahawanan',
                'data' => [1993,732,1358,42,1367,308]
              ],
               [
                'name' => 'Riadah',
                'data' => [1808,701,867,27,1257,230]
              ],
       
        
         

        
        
      ]
   ]
]);

?>