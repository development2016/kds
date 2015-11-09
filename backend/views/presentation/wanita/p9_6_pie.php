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
        'text' => 'Carta Pai Peratusan Wanita Berminat Menyertai Kerja Sampingan (Keseluruhan)',
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
                'name' => 'Mengumpul data',
                'y' => 10163
              ],
              [
                'name' => 'Memasukkan data',
                'y' => 8921
              ],
              [
                'name' => 'Mengesahkan data',
                'y' => 6312

              ],
              [
                'name' => 'Mengedarkan brosur',
                'y' => 8255
              ],
              [
                'name' => 'Mendapatkan isu',
                'y' => 7985
              ],
              [
                'name' => 'Menggantung banner',
                'y' => 5708
              ],
              [
                'name' => 'Fasilitator',
                'y' => 5543,
                'sliced' => true,
                'selected' => true
              ]

           ]
         ],

      ]
   ]
]); ?>