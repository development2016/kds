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
      'text' => 'Graf Bar Status Pekerjaan Komuniti (Bekerja/Tidak Bekerja) Mengikut Umur (Keseluruhan)',
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
              'rotation' => -90,
              'y' => -30,
              'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
              ],
              'align' => 'center',]


            ]
        ],
      'credits' => [
        'enabled' => false,
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
          'name' => 'Bekerja', 'data' => [4393,12635,12273,10383,10657,11329,9764,7070,4239,2294,899,249,49,10]
          
         ],
         [
          'name' => 'Tidak Bekerja', 'data' => [8539,6519,5232,4819,5231,6031,6590,7025,5474,4106,2614,1036,277,48]
          
         ],

      ]
   ]
]); ?>