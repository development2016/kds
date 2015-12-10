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
      'text' => 'Graf Bar Jumlah Wanita Minat Menyertai Kerja - Kerja Kesukarelawanan (Keseluruhan)',
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
                'data' => [7379,2995,4404,208,4865,658]
              ],
              [
                'name' => 'Membersih kawasan kubur',
                'data' => [5834,2528,4187,141,3758,432]
              ],
              [
                'name' => 'Kenduri',
                'data' => [13400,8690,8802,468,7629,1645]

              ],
              [
                'name' => 'Membersih kawasan kampung',
                'data' => [7481,4914,6194,192,4953,0732]
              ],
              [
                'name' => 'Membaiki rumah',
                'data' => [1654,846,1581,38,865,94]
              ],
              [
                'name' => 'Membantu membersihkan kawasan',
                'data' => [5864,2263,3141,104,3327,496]
              ],
               [
                'name' => 'Membawa warga emas ke klinik',
                'data' => [3171,1187,1909,74,1581,191]
              ],
              [
                'name' => 'Mengajar kanak-kanak sekolah',
                'data' => [3635,1673,2010,89,1906,266]
              ],
       
        
         

        
        
      ]
   ]
]);

?>