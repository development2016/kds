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
        'text' => 'Carta Pai Peratusan Ibu Tunggal Minat Menyertai Kerja - Kerja Kesukarelawanan (Keseluruhan)',
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
                'y' => 4662
              ],
              [
                'name' => 'Membersih kawasan kubur',
                'y' => 3761
              ],
              [
                'name' => 'Kenduri',
                'y' => 8202

              ],
              [
                'name' => 'Membersih kawasan kampung',
                'y' => 4756
              ],
              [
                'name' => 'Membaiki rumah',
                'y' => 1145
              ],
              [
                'name' => 'Membantu membersihkan kawasan',
                'y' => 2844
              ],
              [
                'name' => 'Membawa warga emas ke klinik',
                'y' => 1405
              ],     
              [
                'name' => 'Mengajar kanak-kanak sekolah',
                'y' => 1167,
                'sliced' => true,
                'selected' => true
              ]

           ]
         ],

      ]
   ]
]); ?>