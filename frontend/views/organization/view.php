<?php

use yii\helpers\Html;
$this->title = 'Lihat';
?>
<span id="organizationView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
  <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Organization</h1>
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
                    <?= Html::a('Organization', ['organization/index']) ?><i class="fa fa-circle"></i>
                </li>
                <li class="active">Lihat Maklumat Organization : <?= strtoupper($model->org_name); ?></li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-haze">
                                <i class="icon-users font-green-haze"></i>
                                <span class="caption-subject bold uppercase"> Lihat Maklumat Organization </span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body" >
                            
                                            <div class="form-body">
                                                <h3 class="form-section">Maklumat Organization</h3>
                                                <div class="row">



                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?= Html::activeLabel($model,'nama_organisasi'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view"><?= $model->org_name;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    


                                                </div>



                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'no_pendaftaran'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->reg_no;?></span>
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
                                                            <label class="control-label col-md-3"><?= Html::activeLabel($model,'alamat'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view"><?= $model->address;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                   
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'poskod'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->postcode;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'pegawai_perhubungan'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->contact_person;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                   
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'state'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->state_id ? $model->state->state : null ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                   
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'tel_bimbit'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->mobile_no;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'tel_pejabat'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->office_no;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                   
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'no_faks'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->fax_no;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'email'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->email;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                   
                                                </div>
                                                <br>
                                                 <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'date_enter'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->date_enter;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                   
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?= Html::activeLabel($model,'mengenai_organisasi'); ?> : </label>
                                                            <div class="col-md-9">
                                                                <span class="view"><?= $model->about_org;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                   
                                                </div>
                                                <br>
                                                <br>
                                                <br>
                                                
                                               
                                
                                       
                                          
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


   


