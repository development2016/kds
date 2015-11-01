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
          'type' => 'column'
          ],
      'title' => [
      'text' => ' Graf Bar Maklumat Komuniti 18 Tahun Ke Atas',
        'style' => [
          'fontSize' => '25px',
          'fontWeight' => 'normal',
        ],

      ],
      'xAxis' => [
         'categories' => ['18-23','24-29','30-35','36-41','42-47','48-53','54-59','60-65','66-71','72-77','78-83','84-89','90-95','96 >'],
                  'labels' => [
              'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
              ],
         ]
      ],
      'plotOptions' => [
          'column' => [
  
            'dataLabels' => [
              'enabled' => true,
              'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
              ],
              ]


            ]
        ],
      'yAxis' => [
         'title' => [
         'text' => 'Jumlah',
            'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
            ],
         ]
      ],
      'series' => [
         [
         	'name' => 'Profession', 'data' => [12886, 19114, 17459,15156,15848,17303,16317,14058,9689,6374,3502,1283,324,58]
          
         ],

      ]
   ]
]); ?>