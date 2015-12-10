<?php

use yii\helpers\Html;
$this->title = 'Lihat';
?>
<span id="countryView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
  <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Country</h1>
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
                    <?= Html::a('Country', ['lookup-country/index']) ?><i class="fa fa-circle"></i>
                </li>
                <li class="active">Lihat Country : <?= strtoupper($model->country); ?></li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-haze">
                                <i class="icon-users font-green-haze"></i>
                                <span class="caption-subject bold uppercase"> Lihat Country </span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body" > 
                            <div class="form-body">
                                <h3 class="form-section">Maklumat Country</h3>
                       
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'country'); ?> : </label>
                                            <div class="col-md-6">
                                            <span class="view"><?= $model->country;?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'country_code'); ?> : </label>
                                            <div class="col-md-6">
                                            <span class="view"><?= $model->country_code;?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'desc'); ?> : </label>
                                            <div class="col-md-6">
                                            <span class="view"><?= $model->desc;?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'flag'); ?> : </label>
                                            <div class="col-md-6">
                                            <span class="view"><?= $model->flag;?></span>
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



   










