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
                'distance' => -80,
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
                'name' => 'Kerja Sendiri',
                'y' => 7
              ],
              [
                'name' => 'Kerja',
                'y' => 4
              ],
              [
                'name' => 'Pelajar',
                'y' => 2,
                'sliced' => true,
                'selected' => true
              ],
              [
                'name' => 'Suri Rumah',
                'y' => 47
              ],
              [
                'name' => 'Penganggur',
                'y' => 1
              ],
              [
                'name' => 'Pesara',
                'y' => 16
              ]

           ]
         ],

      ]
   ]
]); ?>