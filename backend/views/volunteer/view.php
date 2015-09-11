<?php

use yii\helpers\Html;
$this->title = 'Lihat';
?>
<span id="volunteerView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
  <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Sukarelawan</h1>
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
                    <?= Html::a('Sukarelawan', ['volunteer/index']) ?><i class="fa fa-circle"></i>
                </li>
                <li class="active">Lihat Maklumat Sukarelawan : <?= strtoupper($model->nama); ?></li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-haze">
                                <i class="icon-users font-green-haze"></i>
                                <span class="caption-subject bold uppercase"> Lihat Maklumat Sukarelawan </span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body" >
                            
                                            <div class="form-body">
                                                <h3 class="form-section">Maklumat Sukarelawan</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'nama'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view"><?= $model->nama;?></span>
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
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'jantina'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->jantina;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'tel_hp'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->tel_hp;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'tel_rumah'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->tel_rumah;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'email'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view"><?= $model->email;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'alamat'); ?> : </label>
                                                            <div class="col-md-7">
                                                                <span class="view"><?= $model->alamat;?></span>
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
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'district'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->district_id ? $model->district->district : null ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'sub_base'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->sub_base_id ? $model->subBase->sub_base : null?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'cluster'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->cluster_id ? $model->cluster->cluster : null ?></span>
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
                                                            <div class="col-md-6">
                                                                <span class="view"><?=  $model->kampung_id ? $model->kampung->kampung : null ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <h3 class="form-section">Kerja-Kerja Sukarelawan</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-12">Adakah anda terlibat dengan kerja-kerja kesukarelawan ?:</label>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                           
                                                            <div class="col-md-9">
                                                                <span class="view"><?= $model->kerja_sukarelawan;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if ($model->kerja_sukarelawan == "Ya") { ?>
                                                 <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5"><?= Html::activeLabel($model,'persatuan'); ?> : </label>
                                                                <div class="col-md-5">
                                                                    <div class="col-md-1"><span class="view"><?= $model->persatuan ?></span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5"><?= Html::activeLabel($model,'jawatan'); ?> : </label>
                                                                <div class="col-md-5">
                                                                    <div class="col-md-1"><span class="view"><?= $model->jawatan ?></span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-5"><?= Html::activeLabel($model,'tempoh'); ?> : </label>
                                                                <div class="col-md-6">
                                                                    <div class="col-md-3"><span class="view"><?= $model->tempoh ?></span></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <br>
                                                <?php } else {

                                                } ?>
                                                <br>
                                           

                                        <div class="row">

                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet grey-hoki box">
                                                    <div class="portlet-title">
                                                        <div class="caption bold font-blue uppercase">
                                                            Program Sukarelawan
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'prog_kanak_kanak'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->prog_kanak_kanak;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-11">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-6"><?= Html::activeLabel($model,'prog_kemasyarakatan'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->prog_kemasyarakatan;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'prog_warga_emas'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->prog_warga_emas;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'prog_oku'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->prog_oku;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'aktiviti_rekreasi'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->aktiviti_rekreasi;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'prog_kesihatan'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->prog_kesihatan;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'prog_akademik'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->prog_akademik;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'lain_lain'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->lain_lain;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet grey-hoki box">
                                                    <div class="portlet-title">
                                                        <div class="caption bold font-blue uppercase">
                                                            Bahasa yang boleh Di Tuturkan
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'bahasa_melayu'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->bahasa_melayu;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'bahasa_inggeris'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->bahasa_inggeris;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'bahasa_tamil'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->bahasa_tamil;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'bahasa_cina'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->bahasa_cina;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'lain_lain_2'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->lain_lain_2;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                         

                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet grey-hoki box">
                                                    <div class="portlet-title">
                                                        <div class="caption bold font-blue uppercase">
                                                            Memiliki Kenderaan
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'memiliki_kenderaan'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->memiliki_kenderaan;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet grey-hoki box">
                                                    <div class="portlet-title">
                                                        <div class="caption bold font-blue uppercase">
                                                            Waktu ketika diperlukan
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'bila_bila_masa'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->bila_bila_masa;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'setiap_hari'); ?> : </label>
                                                                    <div class="col-md-1">
                                                                        <span class="view"><?= $model->setiap_hari;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'cuti_am'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->cuti_am;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                       
                                        <div class="row">

                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet grey-hoki box">
                                                    <div class="portlet-title">
                                                        <div class="caption bold font-blue uppercase">
                                                            Sumbangan yang boleh diberikan
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    
                                                      <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'fasilitator'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->fasilitator;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'fotografi'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->fotografi;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'tenaga'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->tenaga;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
            
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'lain_lain_3'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->lain_lain_3;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-9"><?= Html::activeLabel($model,'nota_tambahan'); ?> : </label>
                                                                    <div class="col-md-2">
                                                                        <span class="view"><?= $model->nota_tambahan;?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>     
                                                        
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
