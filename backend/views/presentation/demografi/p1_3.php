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
      'text' => 'Graf Bar Status Pendidikan Komuniti Mengikut Negeri',
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
          'name' => 'Sekolah Rendah', 
          'data' => [6163,1530,1338,145,4871,593]
        ],
        [
          'name' => 'Sekolah Menengah',
          'data' => [16719,3372,5693,370,10224,1777]
        ],
        [
          'name' => 'Sijil',
          'data' => [1209,283,284,8,558,121]
        ],
        [
          'name' => 'Diploma',
          'data' => [2967,449,778,56,1393,314]
        ],
        [
          'name' => 'Ijazah',
          'data' => [1698,313,552,15,844,281]
        ],
        [
          'name' => 'Master/PHD',
          'data' => [269,37,58,2,125,18]
        ],

        
      ]
   ]
]);

?>