<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */

?>


<?php echo Highcharts::widget([
   'options' => [
      'title' => [
      'text' => 'Graf Line Status Pendapatan Komuniti (Keseluruhan)',
        'style' => [
          'fontSize' => '25px',
          'fontWeight' => 'normal',
        ],

      ],
      'xAxis' => [
         'categories' => ['Kurang RM 400', 'RM 401 - RM 800', 'RM 801 - RM 1200','RM 1201 - RM 1600','RM 1601 - RM 2000','RM 2001 - RM 2400','RM 2401 - RM 2800','RM 2801 - RM 3200','RM 3201 - RM 3600','RM 3601 - RM 4000','RM 4001 - RM 4400','Lebih RM 4400'],
                  'labels' => [
              'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
              ],
         ]
      ],
      'plotOptions' => [
          'line' => [
  
            'dataLabels' => [
              'enabled' => true,
              'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
              ],
              ]


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
         	'name' => 'Pendapatan', 'data' => [43484, 27340, 28005,15421,7716,2814,1883,1723,269,225,123,270]
         ],

      ]
   ]
]); ?>