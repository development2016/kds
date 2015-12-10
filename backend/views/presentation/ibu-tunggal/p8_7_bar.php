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
      'text' => 'Graf Bar Jumlah Ibu Tunggal Minat Menyertai Kerja - Kerja Kesukarelawanan Bagi Setiap Negeri',
          'style' => [
          'fontSize' => '25px',
          'fontWeight' => 'normal',
        ],

      ],
      'xAxis' => [
         'categories' => ['Pahang','Perlis','Perak','Kedah','Terengganu','Johor'],
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
                'data' => [1550,509,1153,34,1229,186]
              ],
              [
                'name' => 'Membersih kawasan kubur',
                'data' => [1276,397,979,32,960,116]
              ],
              [
                'name' => 'Kenduri',
                'data' => [2757,1344,1949,74,1675,399]

              ],
              [
                'name' => 'Membersih kawasan kampung',
                'data' => [1429,661,1334,30,1134,167]
              ],
              [
                'name' => 'Membaiki rumah',
                'data' => [369,108,337,5,298,28]
              ],
              [
                'name' => 'Membantu membersihkan kawasan',
                'data' => [1036,318,624,10,750,106]
              ],
               [
                'name' => 'Membawa warga emas ke klinik',
                'data' => [508,127,418,7,316,29]
              ],
              [
                'name' => 'Mengajar kanak-kanak sekolah',
                'data' => [411,103,351,5,268,29]
              ],
       
        
         

        
        
      ]
   ]
]);

?>