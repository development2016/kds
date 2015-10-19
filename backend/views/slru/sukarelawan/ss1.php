<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Slru</h1>
            </div>
            <!-- END PAGE TITLE -->

        </div>
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="#">Slru</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Mikro Worker Jantina
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">

                            <div class="actions">
                              <?php  if (Yii::$app->request->serverName == "localhost") { ?>
                                 <?= Html::a('Senarai Negeri',FALSE,['value'=>Url::to(['request/create','id'=>4]),'class'=>'btn btn-circle btn-default btn-sm request-form']) ?>
                              <?php } else { ?>

                              <?php }  ?>

                             
                              
                                
                            </div>
                        </div>
                        <div class="portlet-body">



                        <?php foreach ($model as $key => $value) {

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
                                  'type' => 'column'
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




                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <!-- END PAGE CONTENT INNER -->
        


        </div>
    </div>
    <!-- END PAGE CONTENT -->