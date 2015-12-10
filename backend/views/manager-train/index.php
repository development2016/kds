
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PeopleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Senarai Rangkaian Fasiliti Awam';
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1> Pengurus Rangkaian Fasiliti Awam Yang Menerima Latihan</h1>
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
                     Pengurus Rangkaian Fasiliti Awam Yang Menerima Latihan
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-haze">
                                <i class="icon-user font-green-haze"></i>
                                <span class="caption-subject bold uppercase"> Senarai Pengurus Rangkaian Fasiliti Awam Yang Menerima Latihan</span>
                            </div>
                            <div class="actions">

                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
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
                        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
                            <p>
                                <?= Html::a('Pengurus Rangkaian Fasiliti Awam Yang Menerima Latihan', ['create'], ['class' => 'btn btn-success']) ?>
                            </p> 
                        <?= GridView::widget([
                                'dataProvider' => $dataProvider,

                                'pager' => [
                                    'firstPageLabel' => 'First',
                                    'lastPageLabel' => 'Last',
                                ],
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'rangkaian_fasiliti_awam',
                                    'category.cat_name',
                                    'state.state',
                                    'district.district',
       
                                    'subBase.sub_base',
                                    'cluster.cluster',
                                    'kampung.kampung',
                                   // 'state.state',
                                    [
                                        'header' => 'Tindakan',
                                        'class' => 'yii\grid\ActionColumn',
                                        'template'=>'{lihat} {kemaskini} {buang}',
                                            'buttons' => [
                                                'lihat' => function ($url, $model) {
                                                    return Html::a('<span class="btn default btn-xs red-stripe">Lihat</span>', $url,[
                                                                'title'=> Yii::t('app','Lihat'),
                                                    ]);

                                                },
                                                'kemaskini' => function ($url, $model) {
                                                    return Html::a('<span class="btn default btn-xs red-stripe">Edit</span>', $url, [
                                                                'title' => Yii::t('app', 'Kemaskini'),
                                                    ]);
                                                },

                                                'buang' => function ($url, $model) {
                                                    return Html::a('<span class="btn default btn-xs red-stripe">Buang</span>', $url, [
                                                                'title' => Yii::t('app', 'Buang'),
                                                    ]);

                                                },

                                            ],
                                            'urlCreator' => function ($action, $model, $key, $index) {
                                                if ($action === 'lihat') {
                                                    $url = ['manager-train/view','id'=>$model->id];
                                                    return $url;
                                                }
                                                if ($action === 'kemaskini') {
                                                    $url = ['manager-train/update','id'=>$model->id];
                                                    return $url;
                                                }
                                                if ($action === 'buang') {
                                                    $url = ['manager-train/delete','id'=>$model->id];
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
