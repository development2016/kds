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
        'text' => 'Graf Pai Status Pekerjaan (Bekerja/Tidak Bekerja) Komuniti (Keseluruhan)',
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
                'format' => '<b>{point.name}</b> : {point.y}',
            ]
        ]
      ],
      'credits' => [
      	'enabled' => false,
      ],

      'series' => [
         [
           'name' => 'Minat', 
           'data' => [
              [
                'name' => 'Bekerja',
                'y' => 86232,
                'sliced' => true,
                'selected' => true
              ],
              [
                'name' => 'Tidak Bekerja',
                'y' => 59959,

              ],


           ]
         ],

      ]
   ]
]); ?>xx