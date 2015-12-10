<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'Senarai Maklumat Organisasi';
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Organisasi</h1>
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
                    <?= Html::a('Utama', ['site/index']) ?><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Organisasi
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-haze">
                                <i class="icon-users font-green-haze"></i>
                                <span class="caption-subject bold uppercase"> Senarai Maklumat Organisasi</span>
                            </div>
                            
                        </div>
                        <div class="portlet-body">
                        <?php if(Yii::$app->session->hasFlash('create')):?>
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                 <?php echo  Yii::$app->session->getFlash('create'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(Yii::$app->session->hasFlash('update')):?>
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                 <?php echo  Yii::$app->session->getFlash('update'); ?>
                            </div>
                        <?php endif; ?>

                        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

                        <?= GridView::widget([
                                'dataProvider' => $dataProvider,

                                'pager' => [
                                    'firstPageLabel' => 'First',
                                    'lastPageLabel' => 'Last',
                                ],
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'org_name',
                                    'reg_no',
                                    'sector.sector_name',
                                    'field.field_name',
                                    
                                    [
                                        'header' => 'Tindakan',
                                        'class' => 'yii\grid\ActionColumn',
                                        'template'=>'{lihat}',
                                            'buttons' => [
                                                'lihat' => function ($url, $model) {
                                                    return Html::a('<span class="btn default btn-xs red-stripe">Lihat</span>', $url,[
                                                                'title'=> Yii::t('app','Lihat'),
                                                    ]);

                                                },

                                            ],
                                            'urlCreator' => function ($action, $model, $key, $index) {
                                                if ($action === 'lihat') {
                                                    $url = ['organization/view','id'=>base64_encode($model->org_id)];
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



   