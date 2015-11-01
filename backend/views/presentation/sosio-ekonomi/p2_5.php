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
      'text' => 'Graf Bar Perbelanjaan Dan Pendapatan Komuniti Mengikut Umur',
        'style' => [
          'fontSize' => '25px',
          'fontWeight' => 'normal',
        ],

      ],
      'xAxis' => [
         'categories' => ['18-23','24-29','30-35','36-41','42-47','48-53','54-59','60-65','66-71','72-77','78-83','84-89','90-95','96 >'],
                  'labels' => [
              'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
              ],
         ]
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
      'yAxis' => [
         'title' => [
         'text' => 'Jumlah',
            'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
            ],
         ]
      ],
      'series' => [
         [
         	'name' => 'Perbelanjaan', 'data' => [9224, 15560, 14863,12808,13235,14494,13645,11958,8162,5321,2812,1039,244,48]
          
         ],
         [
          'name' => 'Pendapatan', 'data' => [9505, 16387, 15569,13393,13882,15219,14313,12458,8538,5514,2905,1057,255,50]
          
         ],
      ]
   ]
]); ?>