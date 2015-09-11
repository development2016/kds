<?php

use yii\helpers\Html;
$this->title = 'Lihat';
?>
<span id="programView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
  <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Program</h1>
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
                    <?= Html::a('Program', ['program/index']) ?><i class="fa fa-circle"></i>
                </li>
                <li class="active">Lihat Maklumat Program : <?= strtoupper($model->program_name); ?></li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-haze">
                                <i class="icon-users font-green-haze"></i>
                                <span class="caption-subject bold uppercase"> Lihat Maklumat Program </span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body" >

                                                
                                            <div class="form-body">
                                                <h3 class="form-section">Maklumat Program</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'program_name'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->program_name;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'organize_by'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->organize_by;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                 <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'sector'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->sector_id ? $model->sector->sector_name : null ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'field'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->field_id ? $model->field->field_name : null ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                   
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?= Html::activeLabel($model,'program_milestone'); ?> : </label>
                                                            <div class="col-md-8">
                                                                <span class="view"><?= $model->program_milestone;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'date_register'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->date_register;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'program_status'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->program_status;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?= Html::activeLabel($model,'note'); ?> : </label>
                                                            <div class="col-md-8">
                                                                <span class="view"><?= $model->note;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
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



