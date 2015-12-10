<?php

use yii\helpers\Html;
$this->title = 'Lihat';
?>
<span id="kampungView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
  <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Kampung</h1>
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
                <li>
                    <?= Html::a('Kampung', ['lookup-kampung/index']) ?><i class="fa fa-circle"></i>
                </li>
                <li class="active">Lihat Kampung : <?= strtoupper($model->kampung); ?></li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-haze">
                                <i class="icon-users font-green-haze"></i>
                                <span class="caption-subject bold uppercase"> Lihat Kampung </span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body" > 
                            <div class="form-body">
                                <h3 class="form-section">Maklumat Kampung</h3>
                       
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'state_id'); ?> : </label>
                                            <div class="col-md-6">
                                            <span class="view"><?= $model->state_id ? $model->state->state : null ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'district_id'); ?> : </label>
                                            <div class="col-md-6">
                                            <span class="view"><?= $model->district_id ? $model->district->district : null ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'mukim_id'); ?> : </label>
                                            <div class="col-md-5">
                                                <span class="view"><?= $model->mukim_id ? $model->mukim->mukim : null?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'sub_base_id'); ?> : </label>
                                            <div class="col-md-6">
                                            <span class="view"><?= $model->sub_base_id ? $model->subBase->sub_base : null ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'cluster_id'); ?> : </label>
                                            <div class="col-md-6">
                                            <span class="view"><?= $model->cluster_id ? $model->cluster->cluster : null ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'kampung_id'); ?> : </label>
                                            <div class="col-md-6">
                                            <span class="view"><?= $model->kampung;?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>   
                                           

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <!-- END PAGE CONTENT INNER -->
        
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</span>










