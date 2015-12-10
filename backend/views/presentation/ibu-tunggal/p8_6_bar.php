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
      'text' => 'Graf Bar Jumlah Ibu Tunggal Minat Menyertai Kerja Sampingan Bagi Setiap Negeri',
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
                'name' => 'Mengumpul data',
                'data' => [530,194,369,3,249,33]
              ],
              [
                'name' => 'Memasukkan data',
                'data' => [391,104,308,2,202,29]
              ],
              [
                'name' => 'Mengesahkan data',
                'data' => [347,88,291,3,152,16]

              ],
              [
                'name' => 'Mengedarkan brosur',
                'data' => [541,171,387,2,260,25]
              ],
              [
                'name' => 'Mendapatkan isu',
                'data' => [476,149,302,23,328,49]
              ],
              [
                'name' => 'Menggantung banner',
                'data' => [429,134,254,3,263,32]
              ],
               [
                'name' => 'Fasilitator',
                'data' => [297,65,193,0,0,28]
              ],
       
        
         

        
        
      ]
   ]
]);

?>