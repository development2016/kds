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
        'text' => 'Carta Pie Jumlah Minat Kerja Sampingan OKU Mengikut Kategori',
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
                'y' => 38
              ],
              [
                'name' => 'Memasukkan data',
                'y' => 32
              ],
              [
                'name' => 'Mengesahkan data',
                'y' => 24

              ],
              [
                'name' => 'Mengedarkan brosur',
                'y' => 48
              ],
              [
                'name' => 'Mendapatkan isu',
                'y' => 36
              ],
              [
                'name' => 'Menggantung banner',
                'y' => 56
              ],
              [
                'name' => 'Fasilitator',
                'y' => 19,
                'sliced' => true,
                'selected' => true
              ]

           ]
         ],

      ]
   ]
]); ?>