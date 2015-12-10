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
        'text' => 'Graf Pai Peratusan Ibu Tunggal Mengikut Kategori Profesion Pekerjaan (Keseluruhan)',
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
           'name' => 'Ibu Tunggal', 
           'data' => [
              
              [
                'name' => 'Bekerja Sendiri',
                'y' => 1
              ],
              [
                'name' => 'Kerajaan',
                'y' => 1
              ],
              [
                'name' => 'Niaga',
                'y' => 1
              ],
              [
                'name' => 'Swasta',
                'y' => 1
              ],
              [
                'name' => 'Lain - Lain',
                'y' => 1
              ],
             [
                'name' => 'Tidak Bekerja',
                'y' => 1
              ],
              
              
             
             
             

           ]
         ],

      ]
   ]
]); ?>