<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>

    
                     <?php  

                      foreach ($model as $key => $value) {
                            $ict = (int)$value['ict'];
                            $kesihatan = (int)$value['kesihatan'];
                            $pendidikan = (int)$value['pendidikan'];
                            $keusahawanan = (int)$value['keusahawanan'];
                            $riadah = (int)$value['riadah'];
                      }


                      echo Highcharts::widget([

                              'options' => [
                              'chart' => [
                                  'type' =>'pie',
                                
                              ],

                              'title' => [
                                'text' => 'Graf Pie Minat keseluruhan',
                                
                              ],
                              'plotOptions' => [
                                'pie' => [
                                    'allowPointSelect' => true,
                                    'cursor' => 'pointer',
                                    'dataLabels' => [
                                        'enabled' => true,
                                        'format' => '<b>{point.name}</b> : {point.y} - {point.percentage:.1f}%',
                                    ]
                                ]
                              ],

                              'series' => [
                                 [
                                   'name' => 'Minat', 
                                   'data' => [
                                      [
                                        'name' => 'ICT',
                                        'y' => $ict
                                      ],
                                      [
                                        'name' => 'Kesihatan',
                                        'y' => $kesihatan
                                      ],
                                      [
                                        'name' => 'Pendidikan',
                                        'y' => $pendidikan,
                                        'sliced' => true,
                                        'selected' => true
                                      ],
                                      [
                                        'name' => 'Keusahawanan',
                                        'y' => $keusahawanan
                                      ],
                                      [
                                        'name' => 'Riadah',
                                        'y' => $riadah
                                      ]

                                   ]
                                 ],

                              ]
                           ]
                        ]); ?>


