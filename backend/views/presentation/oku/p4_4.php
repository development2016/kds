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
          'type' =>'pie',
        
      ],

      'title' => [
        'text' => 'Graf Pie OKU Mengikut Kategori',
        'style' => [
          'fontSize' => '25px',
          'fontWeight' => 'normal',
        ],


        
      ],
      'plotOptions' => [
        'pie' => [
            'allowPointSelect' => true,
            'cursor' => 'pointer',
            'dataLabels' => [
                'enabled' => true,
                'distance' => -90,
                'style' => [
                  'fontSize' => '15px',
                  'fontWeight' => 'normal',
                ],
                'format' => '<b>{point.name}</b> : {point.y}',
            ]
        ]
      ],
      'credits' => [
        'enabled' => false,
      ],

      'series' => [
         [
           'name' => 'OKU', 
           'data' => [
              [
                'name' => 'Kurang Upaya Pendengaran',
                'y' => 31
              ],
              [
                'name' => 'Kurang Upaya Penglihatan',
                'y' => 77
              ],
              [
                'name' => 'Kurang Upaya Fizikal',
                'y' => 261,
                'sliced' => true,
                'selected' => true
              ],
              [
                'name' => 'Masalah Pembelajaran',
                'y' => 93
              ],
              [
                'name' => 'Kurang Upaya Pertuturan',
                'y' => 15
              ],
              [
                'name' => 'Kurang Upaya Mental',
                'y' => 64
              ],
              [
                'name' => 'Kurang Upaya Pelbagai',
                'y' => 51
              ]

           ]
         ],

      ]
   ]
]); ?>