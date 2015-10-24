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
      'text' => 'Perbelanjaan',
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
         	'name' => 'Perbelanjaan', 'data' => [49991, 33532, 22602,10278,4002,1216,798,658,115,122,53,105]
          
         ],

      ]
   ]
]); ?>