<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CountStateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Count SubBase';
$this->params['breadcrumbs'][] = $this->title;
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Dashboard</h1>
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
                    <a href="#">Utama</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Dashboard
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">

                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">

                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'kampung.kampung',
                                    'ict',
                                    'kesihatan',
                                    'pendidikan',
                                    'keusahawanan',
                                    'riadah',
                                    'last_update',

                                    [
                                        'header' => 'Tindakan',
                                        'class' => 'yii\grid\ActionColumn',
                                        'template'=>'{calculate}',
                                            'buttons' => [
                                                'calculate' => function ($url, $model) {
                                                    return Html::a('<span class="btn default btn-xs red-stripe">Calculate</span>', $url,[
                                                                'title'=> Yii::t('app','Calculate'),
                                                    ]);

                                                },
   
                                            ],
                                            'urlCreator' => function ($action, $model, $key, $index) {
                                                if ($action === 'calculate') {
                                                    $url = ['count-kampung/calculate','id'=>$model->kampung_id];
                                                    return $url;
                                                }

              
                                            }

                                    ],
                                ],
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

