<?php

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Lihat';
?>
<span id="issueView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
  <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Isu Konduit</h1>
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
                    <?= Html::a('Isu Konduit', ['issue-conduit/index']) ?><i class="fa fa-circle"></i>
                </li>
                <li class="active">Lihat Isu Konduit : <?= strtoupper($model->name); ?></li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-haze">
                                <i class="icon-users font-green-haze"></i>
                                <span class="caption-subject bold uppercase"> Lihat Isu Konduit </span>
                            </div>
                            <div class="actions">
                                <?= Html::a('Permintaan',FALSE,['value'=>Url::to(['request/create','id'=>$model->issue_id,'menu_id'=>3]),'class'=>'btn btn-circle btn-default btn-sm request-form']) ?>

                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <?php if(Yii::$app->session->hasFlash('request')):?>
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                 <?php echo  Yii::$app->session->getFlash('request'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="portlet-body" > 
                            <div class="form-body">
                            <h3 class="form-section">Maklumat Isu Konduit</h3>
                               

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'area_code'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view"><?= $model->area_code;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'issue_code'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view"><?= $model->issue_code;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'date'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->date;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'district'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->district_id ? $model->district->district : null ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'day'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->day;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'kampung'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?=  $model->kampung_id ? $model->kampung->kampung : null ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'time'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->time;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'name'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view"><?= $model->name;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'no_kp'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->no_kp;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'no_kp_old'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->no_kp_old;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'jantina'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->jantina;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'age'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->age;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>

                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'religion'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->religion ? $model->agama->agama : null ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'race'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->race ? $model->bangsa->bangsa : null ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                            
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'marital_status'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view"><?= $model->marital_status ? $model->kahwin->status_perkahwinan : null ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-12">Adakah anda tergolong dalam Orang Kelainan Upaya (OKU) ?:</label>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                           
                                                            <div class="col-md-9">
                                                                <span class="view"><?= $model->kategori_oku;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if ($model->kategori_oku == "Ya") { ?>
                                                <br>
                                                 <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5"><?= Html::activeLabel($model,'kategori_oku_id'); ?> : </label>
                                                                <div class="col-md-6">
                                                                    <span class="view">
                                                                        <?= $model->kategori_oku_id ? $model->oku->kategori_oku : null ?>
                                                                       </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                
                                                <?php } else {

                                                } ?>
                                                <br>

                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?= Html::activeLabel($model,'address'); ?> : </label>
                                                            <div class="col-md-9">
                                                                <span class="view"><?= $model->address;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'postcode'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->postcode;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'no_tel'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view"><?= $model->no_tel;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                               <br>



                                    <!--kotak besar-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet grey-hoki box">
                                                    <div class="portlet-title">
                                                        <div class="caption bold font-blue uppercase">
                                                            Isu 
                                                        </div>
                                                    </div>
                                            
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'issue_category'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view"><?= $model->issue_category ? $model->kategoriisu->kategori_isu : null ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>   
                                                 <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?= Html::activeLabel($model,'issue_report'); ?> : </label>
                                                            <div class="col-md-9">
                                                                <span class="view"><?= $model->issue_report;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?= Html::activeLabel($model,'analisis_isu'); ?> : </label>
                                                            <div class="col-md-9">
                                                                <span class="view"><?= $model->analisis_isu;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><?= Html::activeLabel($model,'cadangan'); ?> : </label>
                                                            <div class="col-md-9">
                                                                <span class="view"><?= $model->cadangan;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'received_by'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view"><?= $model->received_by;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'witness_by'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view"><?= $model->witness_by;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                        
                                            </div>
                                            </div>
                                        </div>   
                                    </div>
                                    <!--end kotak besar-->
                        </div>
                    </div>
                <!-- END SAMPLE FORM PORTLET-->



                    </div>
                    <!-- END PAGE CONTENT INNER -->
        
                </div>
            </div>


        </div>
    </div>
    <!-- END PAGE CONTENT -->

