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
        'text' => 'Carta Pai Peratusan OKU Minat Dalam Bidang Keusahawanan (Keseluruhan)',
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
                'name' => 'Bengkel Usahawan',
                'y' => 104
              ],
              [
                'name' => 'Kursus IKS',
                'y' => 67
              ],
              [
                'name' => 'Amanah Ikhtiar Malaysia',
                'y' => 56
              ],
              
              
              
             
             
             

           ]
         ],

      ]
   ]
]); ?>