<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>

<br><br>
                        <?php foreach ($model2 as $key => $value) {

                           // store data in array
                           $lelaki[] = (int)$value['lelaki']; // x axis must integer value
                           $perempuan[] = (int)$value['perempuan']; // x axis must integer value
                           $state[] = $value['state'];
                         
                        }
                        // store array data to temp variable
                        $xAxis = $state; 
                        $yAxisP = $perempuan;
                        $yAxisL = $lelaki;

                        echo Highcharts::widget([
                          'scripts' => [
                             'modules/exporting', // adds Exporting button/menu to chart
                          ],
                           'options' => [
                              'chart' => [
                                  'type' => 'column',
                                  'height' => '600',
                                  ],
                              'exporting' => [
                                'enabled'=> false
                              ],
                                'title' => ['text' => 'Sukarelawan Jantina'],
                                'xAxis' => [
                                  'categories' => $xAxis,
                                ],
                                'yAxis' => [
                                  'title' => ['text' => 'Jumlah']
                                ],
                                'series' => [
                                  ['name' => 'Lelaki', 'data' => $yAxisL],
                                  ['name' => 'Perempuan', 'data' => $yAxisP]
                              ]
                           ]
                        ]); ?>



