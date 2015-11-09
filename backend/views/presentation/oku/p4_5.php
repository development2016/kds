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
        'text' => 'Carta Pai Status Pekerjaan OKU Yang Didaftarkan (Keseluruhan)',
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
                'format' => '<b>{point.name}</b> : {point.percentage:.1f}%',
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
                'name' => 'Bekerja Sendiri',
                'y' => 109
              ],
              [
                'name' => 'Kerajaan',
                'y' => 10
              ],
              [
                'name' => 'Niaga',
                'y' => 19
              ],
              [
                'name' => 'Swasta',
                'y' => 57
              ],
              [
                'name' => 'Lain - Lain',
                'y' => 15
              ],
             [
                'name' => 'Tidak Bekerja',
                'y' => 398
              ],
              
              
             
             
             

           ]
         ],

      ]
   ]
]); ?>