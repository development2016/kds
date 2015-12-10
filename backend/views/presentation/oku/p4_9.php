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
          'type' =>'column',
      ],

      'title' => [
      'text' => 'Graf Bar Jumlah OKU Mengikut Minat Kerja Sampingan Bagi Setiap Negeri',
          'style' => [
          'fontSize' => '25px',
          'fontWeight' => 'normal',
        ],

      ],
      'xAxis' => [
         'categories' => ['Perlis','Perak','Terengganu','Johor'],
         'labels' => [
              'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
              ],
         ]
        
      ],
      'yAxis' => [
         'title' => [
         	'text' => 'Jumlah',
              'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
              ],

         ],
         'labels' => [
         	'overflow' => 'justify'
         ],
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


      'series' => [
        [
          'name' => 'Mengumpul data', 
          'data' => [11,9,14,4]
        ],
        [
          'name' => 'Memasukkan data', 
          'data' => [9,7,12,12]
        ],
        [
          'name' => 'Mengesahkan data', 
          'data' => [7,7,6,4]
        ],
        [
          'name' => 'Mengedarkan brosur', 
          'data' => [18,16,11,3]
        ],
        [
          'name' => 'Mendapatkan isu', 
          'data' => [10,11,9,6]
        ],


        [
          'name' => 'Menggantung banner', 
          'data' => [16,14,23,3]
        ],
        [
          'name' => 'Fasilitator', 
          'data' => [8,6,3,2]
        ],
        
         

        
        
      ]
   ]
]);

?>