<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */

?>


<?php echo Highcharts::widget([
  'scripts' => [
     'modules/exporting', // adds Exporting button/menu to chart
  ],
   'options' => [
      'chart' => [
          'type' => 'column'
          ],
        'title' => ['text' => 'Graf Bar Jumlah Sukarelawan Mengikut Kategori Sumbangan Yang Ingin Diberikan Bagi Setiap Negeri ',
        'style' => [
          'fontSize' => '25px',
          'fontWeight' => 'normal',
        ],
        ],
        'xAxis' => [
          'categories' => ['Pahang','Selangor','Perlis','Perak','Kedah','Terengganu','Johor'],
            'labels' => [
              'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
              ],
         ]
        ],



        'yAxis' => [
              'title' => ['text' => 'Jumlah',
                          'style' => [
                'fontSize' => '15px',
                'fontWeight' => 'normal',
            ],

              ],
                       'labels' => [
         	'overflow' => 'justify',

         ],
        ],

              'credits' => [
      	'enabled' => false,
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

        'series' => [
         
          [
          'name' => 'Fasilitator', 
          'data' => [364,10,167,163,7,137,21]


          ],
         
           [
          'name' => 'Tenaga', 
          'data' => [1026,29,1089,954,85,1149,191],
        

          ],
         
           [
          'name' => 'Fotografi', 
          'data' => [40,9,12,35,5,42,6],
    
          ],
          
          [
          'name' => 'Lain - Lain', 
          'data' => [0,0,0,0,0,0,0],
         
          ]
         
          



      ]
   ]
]); ?>
