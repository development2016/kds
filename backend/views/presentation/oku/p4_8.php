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
      'text' => 'Graf Bar Minat Sukarelawan OKU Mengikut Negeri',
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
          'name' => 'Membersih kawasan masjid', 
          'data' => [36,46,20,9]
        ],
        [
          'name' => 'Membersih kawasan kubur', 
          'data' => [29,42,53,9]
        ],
        [
          'name' => 'Kenduri', 
          'data' => [69,59,68,15]
        ],
        [
          'name' => 'Membersih kawasan kampung', 
          'data' => [42,46,55,8]
        ],
        [
          'name' => 'Membaiki rumah', 
          'data' => [7,10,15,5]
        ],


        [
          'name' => 'Membantu membersihkan kawasan', 
          'data' => [27,28,30,8]
        ],
        [
          'name' => 'Membawa warga emas ke klinik', 
          'data' => [10,16,9,4]
        ],
        [
          'name' => 'Mengajar kanak-kanak sekolah', 
          'data' => [9,13,11,5]
        ],
        
         

        
        
      ]
   ]
]);

?>