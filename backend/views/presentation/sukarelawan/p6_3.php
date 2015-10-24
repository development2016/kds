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
        'title' => ['text' => 'Sukarelawan Minat Progam',
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
          'name' => 'Program Kanak - Kanak', 
          'data' => [421,20,432,581,27,306,43],


          ],
         
           [
          'name' => 'Program Kemasyarakatan', 
          'data' => [900,26,979,916,61,961,187],
        

          ],
         
           [
          'name' => 'Program Warga Emas', 
          'data' => [541,17,468,637,17,297,106],
    
          ],
          
          [
          'name' => 'Program OKU', 
          'data' => [357,16,271,470,13,170,24],
         
          ],
         
          [
          'name' => 'Aktiviti Rekreasi', 
          'data' => [760,26,696,642,51,702,114],
       
          ],
          
          [
          'name' => 'Program Kesihatan', 
          'data' => [656,18,617,660,24,507,114],
         
          ],
         
          [
          'name' => 'Program Akademik', 
          'data' => [364,24,399,477,28,353,77],
         
          ],
         
          [
          'name' => 'Lain - Lain', 
          'data' => [0,0,0,0,0,0,0],
     
          ],
          



      ]
   ]
]); ?>
