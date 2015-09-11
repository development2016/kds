<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;

use common\models\LookupPerkahwinan;
use common\models\LookupAgama;
use common\models\LookupBangsa;
use common\models\LookupCountry;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupKampung;
use common\models\LookupIncome;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupBank;
use common\models\UserPengalaman;
use common\models\UserMinat;


$agama = ArrayHelper::map(LookupAgama::find()->asArray()->all(), 'id', 'religion');
$bangsa = ArrayHelper::map(LookupBangsa::find()->asArray()->all(), 'id', 'race');
$perkahwinan = ArrayHelper::map(LookupPerkahwinan::find()->asArray()->all(), 'id', 'marital_status');
$citizen = array('Warganegara'=>'Warganegara','Bukan Warganegara'=>'Bukan Warganegara','Penduduk Tetap'=>'Penduduk Tetap');

$bank = ArrayHelper::map(LookupBank::find()->asArray()->all(), 'id', 'bank');

$state = ArrayHelper::map(LookupState::find()->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
$kampung = ArrayHelper::map(LookupKampung::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'kampung_id','kampung');
$income = ArrayHelper::map(LookupIncome::find()->asArray()->all(), 'id', 'income');

$state_area = ArrayHelper::map(LookupState::find()->asArray()->all(), 'state_id', 'state');
$district_area = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_area_id])->asArray()->all(), 'district_id', 'district');
$subbase_area = ArrayHelper::map(LookupSubBase::find()->where(['district_id'=>$model->district_area_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster_area = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_area_id])->asArray()->all(),'cluster_id','cluster');
$kampung_area = ArrayHelper::map(LookupKampung::find()->where(['cluster_id'=>$model->cluster_area_id])->asArray()->all(),'kampung_id','kampung');

$userminat = ArrayHelper::map(UserMinat::find()->asArray()->all(), 'id', 'id');

$status = array('Microworker Train'=>'Microworker Train','Microworker Train & Task'=>'Microworker Train & Task');
/* @var $this yii\web\View */
/* @var $searchModel common\models\PeopleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Senarai Maklumat Profil';
?>
<span id="userView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>My Profil</h1>
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
                    Profil
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
           
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row margin-top-10">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar" style="width: 250px;">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                               
                            </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">
                                     <?= $model->nama;?>
                                </div>
                                <div class="profile-desc-text">
                                     <?= $model->ic_no;?>
                                </div>
                                <div class="profile-desc-text">
                                     <?= $model->ic_no_old;?>
                                </div>
                                <div class="profile-usertitle-job">
                                     <?= $model->pekerjaan;?>
                                </div>
                                <br>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->


                        </div>
                        <!-- END PORTLET MAIN -->
                        <!-- PORTLET MAIN -->
                        <div class="portlet light">

                            <div>
                                <h4 class="profile-desc-title">Contact</h4>

                                <div class="margin-top-20 profile-desc-link">
                                    <i class="fa fa-mobile"></i>
                                    <a href="#"><?= $model->mobile_no;?></a>
                                </div>
                                <div class="margin-top-20 profile-desc-link">
                                    <i class="fa fa-phone"></i>
                                    <a href="#"><?= $model->home_no;?></a>
                                </div>
                                <div class="margin-top-20 profile-desc-link">
                                    <i class="fa fa-envelope"></i>
                                    <a href="#"><?= $model->email;?></a>
                                </div>
                            </div>
                        </div>
                        <!-- END PORTLET MAIN -->
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->

                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light">


                                    <!-- Mula Maklumat Peribadi -->
                                    <div class="row">
                                            
                                            <br>
                                            <div class="caption caption-md">
                                                <i class="icon-globe theme-font hide"></i>
                                                <span class="caption-subject font-blue-madison bold uppercase">Maklumat Peribadi</span>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'nama'); ?> : </label>
                                                        <div class="col-md-7">
                                                            <span class="view"><?= $model->nama;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'ic_no'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->ic_no;?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'ic_no_old'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->ic_no_old;?></span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'address'); ?> : </label>
                                                        <div class="col-md-7">
                                                            <span class="view"><?= $model->address;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'poskod'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->poskod;?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'state_id'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->state_id ? $model->state->state : null ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'district_id'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->district_id ? $model->district->district : null ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'mukim'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->mukim ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'kampung_id'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->kampung_id ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'bangsa'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->bangsa ? $model->bangsas->bangsa: null ?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'agama'); ?> : </label>
                                                        <div class="col-md-5">
                                                           <span class="view"><?= $model->agama ? $model->agamas->agama: null ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'kewarganegaraan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->kewarganegaraan ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'jantina'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->jantina ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'status_perkahwinan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->status_perkahwinan ? $model->kahwin->status_perkahwinan: null ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'tarikh_lahir'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->tarikh_lahir ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'email'); ?> : </label>
                                                        <div class="col-md-7">
                                                            <span class="view"><?= $model->email;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'mobile_no'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->mobile_no ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'home_no'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->home_no ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'no_tel_pej'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->no_tel_pej ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'no_akaun'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->no_akaun ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'pekerjaan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->pekerjaan ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'jawatan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->jawatan ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'pendapatan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->pendapatan ? $model->incomes->income : null ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <br>
                                            <br>

                                            <div class="caption caption-md">
                                                <i class="icon-globe theme-font hide"></i>
                                                <span class="caption-subject font-blue-madison bold uppercase">Maklumat Tugasan (Kawasan Kerja)</span>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'state_area_id'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->state_area_id ? $model->state->state : null ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'district_area_id'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->district_area_id ? $model->district->district : null ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'sub_base_area_id'); ?> : </label>
                                                        <div class="col-md-5">
                                                            
                                                            <span class="view"><?= $model->sub_base_area_id ? $model->subBase->sub_base : null ?></span>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'cluster_area_id'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->cluster_area_id ? $model->cluster->cluster : null ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'kampung_area_id'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->kampung_area_id ? $model->kampung->kampung : null ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'status_area'); ?> : </label>
                                                        <div class="col-md-7">
                                                            <span class="view"><?= $model->status_area ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                              
                                    </div>
                                    <!-- Tamat Maklumat Peribadi -->







                    <!-- BEGIN PAGE CONTENT -->

                        <div class="portlet-body">
                            <div class="panel-group accordion" id="accordion3">
    

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
                                        Akademik </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                           
                                            

                                            <!-- akademik -->
                                            <div class="row">
                                                
                                                <?php

                                                $user_id = Yii::$app->getRequest()->getQueryParam('id'); ?>
                                                

                                                <p></p>
                                                <br>

                                                <?php 

                                                if (empty($model_userakademik)) {
                                                    echo "Tiada Maklumat Akademik";
                                                }

                                                foreach ($model_userakademik as $key => $value) { ?>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Tahap Pendidikan : </label>
                                                            <div class="col-md-7">
                                                                <span class="view"><?= $value['tahap_pendidikan']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Sijil : </label>
                                                            <div class="col-md-7">
                                                                <span class="view"><?= $value['sijil']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Nama Institusi : </label>
                                                            <div class="col-md-7">
                                                                <span class="view"><?= $value['nama_institusi']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Bidang Pengkhususan : </label>
                                                            <div class="col-md-7">
                                                                <span class="view"><?= $value['bidang_pengkhususan']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>   
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Gred Keseluruhan : </label>
                                                            <div class="col-md-7">
                                                                <span class="view"><?= $value['gred_keseluruhan']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Tarikh Anugerah : </label>
                                                            <div class="col-md-7">
                                                                <span class="view"><?= $value['tarikh_anugerah']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>   
                                                <br>   
                                                                                  
                                                <?php } ?>
                                                
                                            </div>
                                            <!-- tamat akademik -->

                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2">
                                        Pengalaman </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                           
                                            <!-- Pengalaman-->
                                            <div class="row">
                                
                                                <br>

                                                <?php
                                                if (empty($model_userpengalaman)) {
                                                    echo "Tiada Maklumat Pengalaman";
                                                }

                                                 foreach ($model_userpengalaman as $key => $value) { ?>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Organisasi : </label>
                                                            <div class="col-md-7">
                                                                <span class="view"><?= $value['nama_organisasi']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Jawatan : </label>
                                                            <div class="col-md-7">
                                                                <span class="view"><?= $value['jawatan']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Bidang : </label>
                                                            <div class="col-md-7">
                                                                <span class="view"><?= $value['bidang']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Tarikh Mula : </label>
                                                            <div class="col-md-7">
                                                                <span class="view"><?= $value['tarikh_mula']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5">Tarikh Tamat : </label>
                                                            <div class="col-md-7">
                                                                <span class="view"><?= $value['tarikh_tamat']; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
   
                                                <br>                                           
                                                <?php } ?>
                                                
                                            </div>
                                            <!-- Tamat Pengalaman-->

                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3">
                                        Bahasa & Kemahiran </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_3" class="panel-collapse collapse">
                                        <div class="panel-body" style="height:400px; overflow-y:auto;">

                                            <!-- Bahasa & Kemahiran -->
                                            <div class="row">
                                              
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"></label>
                                                                    <div class="col-md-3">
                                                                       
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        Tahap Pencapaian
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-5 control-label" id="inlineradio" for="form_control_1"></label>
                                                                    <div class="col-md-4">
                                                                       Menulis
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        Lisan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- BAHASA BAHASA MELAYU MENULIS -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_bahasa,'bahasa_melayu_menulis'); ?></label>

                                                                        <div class="col-md-4">
                                                                            <div class="md-radio-inline">
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_melayu_menulis == 1) { ?>
                                                                                        <input type="radio" id="radio53" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio53" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="1">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio53">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_melayu_menulis == 2) { ?>
                                                                                        <input type="radio" id="radio54" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio54" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>  
                                                                                     
                                                                                    <label for="radio54">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_melayu_menulis == 3) { ?>
                                                                                        <input type="radio" id="radio55" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio55" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="3">
                                                                                    <?php } ?> 

                                                                                    <label for="radio55">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_melayu_menulis == 4) { ?>
                                                                                        <input type="radio" id="radio56" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio56" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="4">
                                                                                    <?php } ?> 

                                                                                    <label for="radio56">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_melayu_menulis == 5) { ?>
                                                                                        <input type="radio" id="radio57" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio57" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="5">
                                                                                    <?php } ?> 

                                                                                    <label for="radio57">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="md-radio-inline">
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_melayu_lisan == 1) { ?>
                                                                                        <input type="radio" id="radio58" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio58" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio58">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_melayu_lisan == 2) { ?>
                                                                                        <input type="radio" id="radio59" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio59" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio59">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_melayu_lisan == 3) { ?>
                                                                                        <input type="radio" id="radio60" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio60" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio60">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_melayu_lisan == 4) { ?>
                                                                                        <input type="radio" id="radio61" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio61" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio61">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_melayu_lisan == 5) { ?>
                                                                                        <input type="radio" id="radio62" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio62" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio62">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- BAHASA BAHASA INGGERIS MENULIS -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_bahasa,'bahasa_inggeris_menulis'); ?></label>

                                                                        <div class="col-md-4">
                                                                            <div class="md-radio-inline">
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_inggeris_menulis == 1) { ?>
                                                                                        <input type="radio" id="radio63" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio63" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="1">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio63">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_inggeris_menulis == 2) { ?>
                                                                                        <input type="radio" id="radio64" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio64" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>  
                                                                                     
                                                                                    <label for="radio64">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_inggeris_menulis == 3) { ?>
                                                                                        <input type="radio" id="radio65" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio65" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="3">
                                                                                    <?php } ?> 

                                                                                    <label for="radio65">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_inggeris_menulis == 4) { ?>
                                                                                        <input type="radio" id="radio66" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio66" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="4">
                                                                                    <?php } ?> 

                                                                                    <label for="radio66">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_inggeris_menulis == 5) { ?>
                                                                                        <input type="radio" id="radio67" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio67" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="5">
                                                                                    <?php } ?> 

                                                                                    <label for="radio67">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="md-radio-inline">
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_inggeris_lisan == 1) { ?>
                                                                                        <input type="radio" id="radio68" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio68" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio68">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_inggeris_lisan == 2) { ?>
                                                                                        <input type="radio" id="radio69" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio69" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio69">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_inggeris_lisan == 3) { ?>
                                                                                        <input type="radio" id="radio70" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio70" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio70">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_inggeris_lisan == 4) { ?>
                                                                                        <input type="radio" id="radio71" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio71" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio71">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->bahasa_inggeris_lisan == 5) { ?>
                                                                                        <input type="radio" id="radio72" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio72" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio72">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- BAHASA LAIN LAIN MENULIS -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_bahasa,'lain_lain_menulis'); ?></label>

                                                                        <div class="col-md-4">
                                                                            <div class="md-radio-inline">
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->lain_lain_menulis == 1) { ?>
                                                                                        <input type="radio" id="radio73" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio73" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="1">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio73">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->lain_lain_menulis == 2) { ?>
                                                                                        <input type="radio" id="radio74" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio74" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>  
                                                                                     
                                                                                    <label for="radio74">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->lain_lain_menulis == 3) { ?>
                                                                                        <input type="radio" id="radio75" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio75" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="3">
                                                                                    <?php } ?> 

                                                                                    <label for="radio75">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->lain_lain_menulis == 4) { ?>
                                                                                        <input type="radio" id="radio76" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio76" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="4">
                                                                                    <?php } ?> 

                                                                                    <label for="radio76">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->lain_lain_menulis == 5) { ?>
                                                                                        <input type="radio" id="radio77" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio77" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="5">
                                                                                    <?php } ?> 

                                                                                    <label for="radio77">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->lain_lain_lisan == 1) { ?>
                                                                                        <input type="radio" id="radio78" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio78" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio78">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->lain_lain_lisan == 2) { ?>
                                                                                        <input type="radio" id="radio79" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio79" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio79">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->lain_lain_lisan == 3) { ?>
                                                                                        <input type="radio" id="radio80" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio80" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio80">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->lain_lain_lisan == 4) { ?>
                                                                                        <input type="radio" id="radio81" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio81" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio81">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_bahasa->lain_lain_lisan == 5) { ?>
                                                                                        <input type="radio" id="radio82" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio82" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio82">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <div class="col-md-12">
                                                                            <div class="form-group form-md-line-input">
                                                                                <?= Html::activeTextInput($model_bahasa,'lain_lain',['class'=>'form-control']); ?>
                                                                                <label for="form_control_1"><?= Html::activeLabel($model_bahasa,'lain_lain'); ?></label>
                                                                            </div>
                                                                        </div>


                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>




                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">

                                                                    <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><b>Petunjuk :</b></label>
                                                                    <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><b>1</b> Mahir</label>
                                                                    <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><b>2</b> Kurang Mahir</label>
                                                                    <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><b>3</b> Sederhana</label>
                                                                    <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><b>4</b> Lemah</label>
                                                                    <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><b>5</b> Sangat Lemah</label>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>


                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-6 control-label" id="inlineradio" for="form_control_1"></label>
                                                                    <div class="col-md-2">

                                                                    </div>
                                                                    <div class="col-md-2">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        Tahap Kemahiran ICT
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- KEMAHIRAN WORD -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'word'); ?></label>

                                                                         <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->word == 1) { ?>
                                                                                        <input type="radio" id="radio83" name="UserKemahiran[word]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio83" name="UserKemahiran[word]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio83">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->word == 2) { ?>
                                                                                        <input type="radio" id="radio84" name="UserKemahiran[word]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio84" name="UserKemahiran[word]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio84">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->word == 3) { ?>
                                                                                        <input type="radio" id="radio85" name="UserKemahiran[word]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio85" name="UserKemahiran[word]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio85">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->word == 4) { ?>
                                                                                        <input type="radio" id="radio86" name="UserKemahiran[word]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio86" name="UserKemahiran[word]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio86">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->word == 5) { ?>
                                                                                        <input type="radio" id="radio87" name="UserKemahiran[word]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio87" name="UserKemahiran[word]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio87">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- KEMAHIRAN EXCEL -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'excel'); ?></label>

                                                                         <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->excel == 1) { ?>
                                                                                        <input type="radio" id="radio88" name="UserKemahiran[excel]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio88" name="UserKemahiran[excel]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio88">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->excel == 2) { ?>
                                                                                        <input type="radio" id="radio89" name="UserKemahiran[excel]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio89" name="UserKemahiran[excel]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio89">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->excel == 3) { ?>
                                                                                        <input type="radio" id="radio90" name="UserKemahiran[excel]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio90" name="UserKemahiran[excel]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio90">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->excel == 4) { ?>
                                                                                        <input type="radio" id="radio91" name="UserKemahiran[excel]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio91" name="UserKemahiran[excel]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio91">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->excel == 5) { ?>
                                                                                        <input type="radio" id="radio92" name="UserKemahiran[excel]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio92" name="UserKemahiran[excel]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio92">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>



                                                <!-- KEMAHIRAN POWER POINT -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'power_point'); ?></label>

                                                                         <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->power_point == 1) { ?>
                                                                                        <input type="radio" id="radio93" name="UserKemahiran[power_point]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio93" name="UserKemahiran[power_point]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio93">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->power_point == 2) { ?>
                                                                                        <input type="radio" id="radio94" name="UserKemahiran[power_point]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio94" name="UserKemahiran[power_point]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio94">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->power_point == 3) { ?>
                                                                                        <input type="radio" id="radio95" name="UserKemahiran[power_point]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio95" name="UserKemahiran[power_point]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio95">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->power_point == 4) { ?>
                                                                                        <input type="radio" id="radio96" name="UserKemahiran[power_point]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio96" name="UserKemahiran[power_point]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio96">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->power_point == 5) { ?>
                                                                                        <input type="radio" id="radio97" name="UserKemahiran[power_point]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio97" name="UserKemahiran[power_point]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio97">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- KEMAHIRAN MENAIP -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'menaip'); ?></label>

                                                                         <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->menaip == 1) { ?>
                                                                                        <input type="radio" id="radio98" name="UserKemahiran[menaip]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio98" name="UserKemahiran[menaip]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio98">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->menaip == 2) { ?>
                                                                                        <input type="radio" id="radio99" name="UserKemahiran[menaip]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio99" name="UserKemahiran[menaip]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio99">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->menaip == 3) { ?>
                                                                                        <input type="radio" id="radio100" name="UserKemahiran[menaip]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio100" name="UserKemahiran[menaip]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio100">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->menaip == 4) { ?>
                                                                                        <input type="radio" id="radio101" name="UserKemahiran[menaip]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio101" name="UserKemahiran[menaip]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio101">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->menaip == 5) { ?>
                                                                                        <input type="radio" id="radio102" name="UserKemahiran[menaip]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio102" name="UserKemahiran[menaip]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio102">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>



                                                <!-- KEMAHIRAN INTERNET -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'internet'); ?></label>

                                                                         <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->internet == 1) { ?>
                                                                                        <input type="radio" id="radio103" name="UserKemahiran[internet]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio103" name="UserKemahiran[internet]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio103">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->internet == 2) { ?>
                                                                                        <input type="radio" id="radio104" name="UserKemahiran[internet]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio104" name="UserKemahiran[internet]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio104">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->internet == 3) { ?>
                                                                                        <input type="radio" id="radio105" name="UserKemahiran[internet]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio105" name="UserKemahiran[internet]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio105">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->internet == 4) { ?>
                                                                                        <input type="radio" id="radio106" name="UserKemahiran[internet]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio106" name="UserKemahiran[internet]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio106">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->internet == 5) { ?>
                                                                                        <input type="radio" id="radio107" name="UserKemahiran[internet]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio107" name="UserKemahiran[internet]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio107">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- KEMAHIRAN YOUTUBE -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'youtube'); ?></label>

                                                                         <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->youtube == 1) { ?>
                                                                                        <input type="radio" id="radio108" name="UserKemahiran[youtube]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio108" name="UserKemahiran[youtube]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio108">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->youtube == 2) { ?>
                                                                                        <input type="radio" id="radio109" name="UserKemahiran[youtube]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio109" name="UserKemahiran[youtube]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio109">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->youtube == 3) { ?>
                                                                                        <input type="radio" id="radio110" name="UserKemahiran[youtube]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio110" name="UserKemahiran[youtube]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio110">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->youtube == 4) { ?>
                                                                                        <input type="radio" id="radio111" name="UserKemahiran[youtube]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio111" name="UserKemahiran[youtube]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio111">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->youtube == 5) { ?>
                                                                                        <input type="radio" id="radio112" name="UserKemahiran[youtube]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio112" name="UserKemahiran[youtube]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio112">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- KEMAHIRAN PERBANKAN -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'perbankan'); ?></label>

                                                                         <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->perbankan == 1) { ?>
                                                                                        <input type="radio" id="radio113" name="UserKemahiran[perbankan]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio113" name="UserKemahiran[perbankan]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio113">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->perbankan == 2) { ?>
                                                                                        <input type="radio" id="radio114" name="UserKemahiran[perbankan]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio114" name="UserKemahiran[perbankan]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio114">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->perbankan == 3) { ?>
                                                                                        <input type="radio" id="radio115" name="UserKemahiran[perbankan]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio115" name="UserKemahiran[perbankan]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio115">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->perbankan == 4) { ?>
                                                                                        <input type="radio" id="radio116" name="UserKemahiran[perbankan]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio116" name="UserKemahiran[perbankan]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio116">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->perbankan == 5) { ?>
                                                                                        <input type="radio" id="radio117" name="UserKemahiran[perbankan]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio117" name="UserKemahiran[perbankan]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio117">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- KEMAHIRAN BELIAN -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'belian'); ?></label>

                                                                         <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->belian == 1) { ?>
                                                                                        <input type="radio" id="radio118" name="UserKemahiran[belian]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio118" name="UserKemahiran[belian]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio118">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->belian == 2) { ?>
                                                                                        <input type="radio" id="radio119" name="UserKemahiran[belian]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio119" name="UserKemahiran[belian]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio119">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->belian == 3) { ?>
                                                                                        <input type="radio" id="radio120" name="UserKemahiran[belian]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio120" name="UserKemahiran[belian]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio120">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->belian == 4) { ?>
                                                                                        <input type="radio" id="radio121" name="UserKemahiran[belian]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio121" name="UserKemahiran[belian]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio121">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->belian == 5) { ?>
                                                                                        <input type="radio" id="radio122" name="UserKemahiran[belian]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio122" name="UserKemahiran[belian]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio122">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- KEMAHIRAN JUALAN -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'jualan'); ?></label>

                                                                         <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->jualan == 1) { ?>
                                                                                        <input type="radio" id="radio123" name="UserKemahiran[jualan]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio123" name="UserKemahiran[jualan]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio123">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->jualan == 2) { ?>
                                                                                        <input type="radio" id="radio124" name="UserKemahiran[jualan]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio124" name="UserKemahiran[jualan]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio124">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->jualan == 3) { ?>
                                                                                        <input type="radio" id="radio125" name="UserKemahiran[jualan]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio125" name="UserKemahiran[jualan]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio125">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->jualan == 4) { ?>
                                                                                        <input type="radio" id="radio126" name="UserKemahiran[jualan]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio126" name="UserKemahiran[jualan]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio126">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->jualan == 5) { ?>
                                                                                        <input type="radio" id="radio127" name="UserKemahiran[jualan]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio127" name="UserKemahiran[jualan]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio127">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- KEMAHIRAN MEDIA SOSIAL -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">

                                                                    <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><b>Media Sosial :</b></label>
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- KEMAHIRAN FACEBOOK -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'facebook'); ?></label>

                                                                         <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->facebook == 1) { ?>
                                                                                        <input type="radio" id="radio128" name="UserKemahiran[facebook]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio128" name="UserKemahiran[facebook]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio128">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->facebook == 2) { ?>
                                                                                        <input type="radio" id="radio129" name="UserKemahiran[facebook]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio129" name="UserKemahiran[facebook]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio129">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->facebook == 3) { ?>
                                                                                        <input type="radio" id="radio130" name="UserKemahiran[facebook]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio130" name="UserKemahiran[facebook]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio130">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->facebook == 4) { ?>
                                                                                        <input type="radio" id="radio131" name="UserKemahiran[facebook]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio131" name="UserKemahiran[facebook]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio131">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->facebook == 5) { ?>
                                                                                        <input type="radio" id="radio132" name="UserKemahiran[facebook]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio132" name="UserKemahiran[facebook]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio132">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- KEMAHIRAN TWITTER -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'twitter'); ?></label>

                                                                         <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->twitter == 1) { ?>
                                                                                        <input type="radio" id="radio133" name="UserKemahiran[twitter]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio133" name="UserKemahiran[twitter]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio133">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->twitter == 2) { ?>
                                                                                        <input type="radio" id="radio134" name="UserKemahiran[twitter]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio134" name="UserKemahiran[twitter]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio134">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->twitter == 3) { ?>
                                                                                        <input type="radio" id="radio135" name="UserKemahiran[twitter]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio135" name="UserKemahiran[twitter]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio135">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->twitter == 4) { ?>
                                                                                        <input type="radio" id="radio136" name="UserKemahiran[twitter]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio136" name="UserKemahiran[twitter]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio136">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->twitter == 5) { ?>
                                                                                        <input type="radio" id="radio137" name="UserKemahiran[twitter]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio137" name="UserKemahiran[twitter]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio137">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- KEMAHIRAN INSTAGRAM -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'instagram'); ?></label>

                                                                         <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->instagram == 1) { ?>
                                                                                        <input type="radio" id="radio138" name="UserKemahiran[instagram]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio138" name="UserKemahiran[instagram]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio138">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->instagram == 2) { ?>
                                                                                        <input type="radio" id="radio139" name="UserKemahiran[instagram]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio139" name="UserKemahiran[instagram]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio139">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->instagram == 3) { ?>
                                                                                        <input type="radio" id="radio140" name="UserKemahiran[instagram]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio140" name="UserKemahiran[instagram]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio140">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->instagram == 4) { ?>
                                                                                        <input type="radio" id="radio141" name="UserKemahiran[instagram]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio141" name="UserKemahiran[instagram]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio141">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->instagram == 5) { ?>
                                                                                        <input type="radio" id="radio142" name="UserKemahiran[instagram]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio142" name="UserKemahiran[instagram]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio142">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- KEMAHIRAN LAIN LAIN -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'lain_lain'); ?></label>

                                                                         <div class="col-md-4">
                                                                            <div class="md-radio-inline">

                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->lain_lain == 1) { ?>
                                                                                        <input type="radio" id="radio143" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="1" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio143" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="1">
                                                                                    <?php } ?> 

                                                                                    <label for="radio143">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    1 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->lain_lain == 2) { ?>
                                                                                        <input type="radio" id="radio144" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="2" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio144" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="2">
                                                                                    <?php } ?>

                                                                                    <label for="radio144">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    2 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->lain_lain == 3) { ?>
                                                                                        <input type="radio" id="radio145" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="3" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio145" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="3">
                                                                                    <?php } ?>

                                                                                    <label for="radio145">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    3 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->lain_lain == 4) { ?>
                                                                                        <input type="radio" id="radio146" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="4" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio146" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="4">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio146">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    4 </label>
                                                                                </div>
                                                                                <div class="md-radio">
                                                                                    <?php if ($model_kemahiran->lain_lain == 5) { ?>
                                                                                        <input type="radio" id="radio147" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="5" checked>
                                                                                    <?php } else { ?>
                                                                                        <input type="radio" id="radio147" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="5">
                                                                                    <?php } ?>
                                                                                    
                                                                                    <label for="radio147">
                                                                                    <span></span>
                                                                                    <span class="check"></span>
                                                                                    <span class="box"></span>
                                                                                    5 </label>
                                                                                </div>



                                                                            </div>
                                                                        </div>
                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- KEMAHIRAN LAIN LAIN NYATAKAN -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">
                                                                    <div class="col-md-12">
                                                                            <div class="form-group form-md-line-input">
                                                                                <?= Html::activeTextInput($model_kemahiran,'lain_lain_nyatakan',['class'=>'form-control']); ?>
                                                                                <label for="form_control_1"><?= Html::activeLabel($model_kemahiran,'lain_lain_nyatakan'); ?></label>
                                                                            </div>
                                                                        </div>


                                                                        

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">

                                                                    <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><b>Petunjuk :</b></label>
                                                                    <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><b>1</b> Mahir</label>
                                                                    <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><b>2</b> Kurang Mahir</label>
                                                                    <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><b>3</b> Sederhana</label>
                                                                    <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><b>4</b> Lemah</label>
                                                                    <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><b>5</b> Sangat Lemah</label>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                


                                                <!-- KEMAHIRAN PERKAKASAN ICT YG DI MILIKI -->
                                                <div class="row">
                                                    <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group form-md-line-input">

                                                                    <label class="col-md-6 control-label" id="inlineradio" for="form_control_1"><b>Perkakasan ICT yang di miliki :</b></label>
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>





                                            
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_4">
                                        Minat</a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_4" class="panel-collapse collapse">
                                        <div class="panel-body">
                                           
                                            <!-- Minat -->
                                            <div class="row">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group form-md-line-input">
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                                




                                            </div>
                                            <!-- Tamat Minat -->


                                        </div>
                                    </div>
                                </div>
                                
                            
                            </div>
                        </div>
                    <!-- END PAGE CONTENT -->





    
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- BEGIN PAGE CONTENT INNER -->
    </div>
    <!-- END PAGE CONTENT -->
    
