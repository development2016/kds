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
        'text' => 'Carta Pai Jumlah Isu Mengikut Kategori (Keseluruhan)',
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
                'format' => '{point.y}',
            ],
            'showInLegend' => true,
     
        ]
      ],
      'credits' => [
      	'enabled' => false,
      ],

      'series' => [
         [
           'name' => 'Isu', 
           'data' => [
              [
                'name' => 'Akademik & Kerjaya (AK/KJ)',
                'y' => 179
              ],
              [
                'name' => 'Kesihatan (SHT)',
                'y' => 68
              ],
              [
                'name' => 'Ekonomi & Keusahawanan (EK/US)',
                'y' => 460,

              ],
              [
                'name' => 'Kebajikan (KBJ)',
                'y' => 136
              ],
              [
                'name' => 'Remaja belia Warga Emas (RBWE)',
                'y' => 228
              ],
              [
                'name' => 'Lain-lain (LL)',
                'y' => 1343,
                'sliced' => true,
                'selected' => true
              ]

           ]
         ],

      ]
   ]
]); ?>