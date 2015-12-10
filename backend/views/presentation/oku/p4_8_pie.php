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
        'text' => 'Carta Pai Peratusan OKU Yang Berminat Dengan Kerja Kesukarelawan (Keseluruhan)',
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
           'name' => 'OKU', 
           'data' => [
              [
                'name' => 'Membersih kawasan masjid',
                'y' => 151
              ],
              [
                'name' => 'Membersih kawasan kubur',
                'y' => 133
              ],
              [
                'name' => 'Kenduri',
                'y' => 211

              ],
              [
                'name' => 'Membersih kawasan kampung',
                'y' => 151
              ],
              [
                'name' => 'Membaiki rumah',
                'y' => 37
              ],
              [
                'name' => 'Membantu membersihkan kawasan',
                'y' => 93
              ],
              [
                'name' => 'Membawa warga emas ke klinik',
                'y' => 39
              ],
              [
                'name' => 'Mengajar kanak-kanak sekolah',
                'y' => 38,
                'sliced' => true,
                'selected' => true
              ]

           ]
         ],

      ]
   ]
]); ?>