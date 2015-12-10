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
        'text' => 'Carta Pai Peratusan Microworker Mengikut Profesion Pekerjaan (Keseluruhan)',
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
           'name' => 'Profession', 
           'data' => [
              [
                'name' => 'Tidak Bekerja',
                'y' => 950
              ],
              [
                'name' => 'Suri Rumah',
                'y' => 826
              ],
              [
                'name' => 'Sendiri',
                'y' => 825

              ],
              [
                'name' => 'Sektor Pertanian',
                'y' => 249
              ],
              [
                'name' => 'Pesara',
                'y' => 234
              ],
              [
                'name' => 'Pelajar',
                'y' => 195
              ],
              [
                'name' => 'Kerajaan',
                'y' => 178
              ],     
              [
                'name' => 'Swasta',
                'y' => 1264,
                'sliced' => true,
                'selected' => true
              ]

           ]
         ],

      ]
   ]
]); ?>