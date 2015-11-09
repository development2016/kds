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
        'text' => 'Carta Pai Peratusan Ibu Tunggal Minat Menyertai Kerja Sampingan (Keseluruhan)',
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
                'name' => 'Mengumpul data',
                'y' => 1378
              ],
              [
                'name' => 'Memasukkan data',
                'y' => 1036
              ],
              [
                'name' => 'Mengesahkan data',
                'y' => 897

              ],
              [
                'name' => 'Mengedarkan brosur',
                'y' => 1386
              ],
              [
                'name' => 'Mendapatkan isu',
                'y' => 1327
              ],
              [
                'name' => 'Menggantung banner',
                'y' => 1115
              ],
              [
                'name' => 'Fasilitator',
                'y' => 584,
                'sliced' => true,
                'selected' => true
              ]

           ]
         ],

      ]
   ]
]); ?>