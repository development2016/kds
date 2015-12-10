<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
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
                                <img src="<?= $model->img; ?>" class="img-responsive" alt="">
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
                                    <a href="#"><?= $model->mobile_no;?>
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
                                    <div class="portlet-title tabbable-line">
                                        
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1_1" data-toggle="tab">Maklumat Peribadi</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_2" data-toggle="tab">Maklumat Akademik</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_3" data-toggle="tab">Pengalaman</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_4" data-toggle="tab">Bahasa dan Kemahiran</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_5" data-toggle="tab">Minat</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="tab_1_1">
                                                <br>
                                                <div class="caption caption-md">
                                                <i class="icon-globe theme-font hide"></i>
                                                <span class="caption-subject font-blue-madison bold uppercase">Maklumat Peribadi</span>
                                            </div>
                                             <br>
                                             <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5" ><?= Html::activeLabel($model,'nama'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view" ><?= $model->nama;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                             </div>
                                             
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'address'); ?> : </label>
                                                            <div class="col-md-6">
                                                                <span class="view"><?= $model->address;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>      
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'kampung'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->kampung;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'poskod'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->poskod;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'daerah'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->daerah;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'bandar'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->bandar;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'negeri'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->negeri;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'negara'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->negara;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                               
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'tarikh_lahir'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->tarikh_lahir;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'tempat_lahir'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->tempat_lahir;?></span>
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
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'status_perkahwinan'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->status_perkahwinan;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'bangsa'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->bangsa;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'agama'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->agama;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                 <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'kewarganegaraan'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->kewarganegaraan;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'pendapatan'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->pendapatan;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                 
                                               
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'pekerjaan'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->pekerjaan;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'jawatan'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->jawatan;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                 <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'bank'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->bank;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'no_akaun'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->no_akaun;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                 <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'tarikh_daftar'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->tarikh_daftar;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'mukim'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->mukim;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'negara_area_id'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->negara_area_id;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'state_area_id'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->state_area_id;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'district_area_id'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->district_area_id;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'sub_base_area_id'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->sub_base_area_id;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'cluster_area_id'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->cluster_area_id;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'kampong_area_id'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->kampong_area_id;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                     <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'role'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->role;?></span>
                                                            </div>
                                                        </div>   
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'status_area'); ?> : </label>
                                                            <div class="col-md-5">
                                                                <span class="view"><?= $model->status_area;?></span>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                 


                                               


                                            
                                            </div>
                                            <!-- END PERSONAL INFO TAB -->
                                            <!-- CHANGE AVATAR TAB -->
                                            <div class="tab-pane" id="tab_1_2">
                                                <br>
                                                <div class="caption caption-md">
                                                <i class="icon-globe theme-font hide"></i>
                                                <span class="caption-subject font-blue-madison bold uppercase">Maklumat Akademik</span>
                                                </div>
                                                <br>
                                                <form action="#">
                                                    <div class="form-group">
                                                        <label class="control-label">Current Password</label>
                                                        <input type="password" class="form-control"/>
                                                    </div>  
                                                </form>
                                                <br>
                                            </div>
                                            <!-- END CHANGE AVATAR TAB -->
                                            <!-- CHANGE PASSWORD TAB -->
                                            <div class="tab-pane" id="tab_1_3">
                                                <br>
                                                <div class="caption caption-md">
                                                <i class="icon-globe theme-font hide"></i>
                                                <span class="caption-subject font-blue-madison bold uppercase">Pengalaman</span>
                                                </div>
                                                <br>
                                                <form action="#">
                                                    <div class="form-group">
                                                        <label class="control-label">Current Password</label>
                                                        <input type="password" class="form-control"/>
                                                    </div>  
                                                </form>
                                                <br>
                                            </div>
                                            <!-- END CHANGE PASSWORD TAB -->
                                            <!-- PRIVACY SETTINGS TAB -->
                                            <div class="tab-pane" id="tab_1_4">
                                                <br>
                                                <div class="caption caption-md">
                                                <i class="icon-globe theme-font hide"></i>
                                                <span class="caption-subject font-blue-madison bold uppercase">Bahasa dan Kemahiran</span>
                                                </div>
                                                <br>
                                                <form action="#">
                                                    <div class="form-group">
                                                        <label class="control-label">Current Password</label>
                                                        <input type="password" class="form-control"/>
                                                    </div>  
                                                </form>
                                                <br>
                                            </div>
                                            <!-- END CHANGE AVATAR TAB -->
                                            <!-- CHANGE PASSWORD TAB -->
                                            <div class="tab-pane" id="tab_1_5">
                                                <br>
                                                <div class="caption caption-md">
                                                <i class="icon-globe theme-font hide"></i>
                                                <span class="caption-subject font-blue-madison bold uppercase">Minat</span>
                                                </div>
                                                <br>
                                                <form action="#">
                                                    <div class="form-group">
                                                        <label class="control-label">Current Password</label>
                                                        <input type="password" class="form-control"/>
                                                    </div>  
                                                </form>
                                                <br>
                                            </div>
                                            <!-- END PRIVACY SETTINGS TAB -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->


        </div>
    </div>
    <!-- END PAGE CONTENT -->
