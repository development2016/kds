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
      'text' => 'Graf Bar Jumlah Wanita Minat Menyertai Kerja - Kerja Kesukarelawanan Bagi Setiap Negeri',
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
                'name' => 'Mengumpul data',
                'data' => [3912,2092,1774,54,2046,285]
              ],
              [
                'name' => 'Memasukkan data',
                'data' => [3401,1553,1673,57,1985,252]
              ],
              [
                'name' => 'Mengesahkan data',
                'data' => [2533,1114,1378,27,1132,128]

              ],
              [
                'name' => 'Mengedarkan brosur',
                'data' => [3358,1228,1964,33,1493,179]
              ],
              [
                'name' => 'Mendapatkan isu',
                'data' => [2722,1539,1550,114,1741,319]
              ],
              [
                'name' => 'Menggantung banner',
                'data' => [2221,1081,1199,30,1012,165]
              ],
               [
                'name' => 'Fasilitator',
                'data' => [2288,1143,1030,30,845,207]
              ],
       
        
         

        
        
      ]
   ]
]);

?>