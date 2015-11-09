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
        'text' => 'Carta Pai Peratusan Wanita Berminat Menyertai Kerja - Kerja Kesukarelawanan (Keseluruhan)',
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
                'format' => '{point.percentage:.1f}%',
            ],
            'showInLegend' => true,
     
        ]
      ],
      'credits' => [
        'enabled' => false,
      ],

      'series' => [
         [
           'name' => 'Wanita', 
           'data' => [
              [
                'name' => 'Membersih kawasan masjid',
                'y' => 20509
              ],
              [
                'name' => 'Membersih kawasan kubur',
                'y' => 16880
              ],
              [
                'name' => 'Kenduri',
                'y' => 40634

              ],
              [
                'name' => 'Membersih kawasan kampung',
                'y' => 24466
              ],
              [
                'name' => 'Membaiki rumah',
                'y' => 5078
              ],
              [
                'name' => 'Membantu membersihkan kawasan',
                'y' => 15195
              ],
              [
                'name' => 'Membawa warga emas ke klinik',
                'y' => 8113
              ],     
              [
                'name' => 'Mengajar kanak-kanak sekolah',
                'y' => 9579,
                'sliced' => true,
                'selected' => true
              ]

           ]
         ],

      ]
   ]
]); ?>