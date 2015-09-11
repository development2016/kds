<?php

use yii\helpers\Html;
$this->title = 'Lihat';
?>
<span id="demographicView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
  <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Demographic</h1>
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
                    <?= Html::a('Demographic', ['demographic/index']) ?><i class="fa fa-circle"></i>
                </li>
                <li class="active">Lihat Maklumat Demographic </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-haze">
                                <i class="icon-users font-green-haze"></i>
                                <span class="caption-subject bold uppercase"> Lihat Maklumat Demographic </span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body" >
                            
                            <div class="form-body">
                                <h3 class="form-section">Maklumat Demographic</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'nama_ketua_kampung'); ?> : </label>
                                            <div class="col-md-6"
                                                <span class="view"><?= $model->nama_ketua_kampung ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'no_tel'); ?> : </label>
                                            <div class="col-md-6">
                                                <span class="view"><?= $model->no_tel;?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'koordinate'); ?> : </label>
                                            <div class="col-md-6">
                                                <span class="view"><?= $model->koordinate;?></span>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'mukim_id'); ?> : </label>
                                            <div class="col-md-5">
                                                <span class="view"><?= $model->mukim_id ? $model->mukim->mukim : null ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'sub_base_id'); ?> : </label>
                                            <div class="col-md-5">
                                                <span class="view"><?= $model->sub_base_id ? $model->subBase->sub_base : null ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'cluster_id'); ?> : </label>
                                            <div class="col-md-5">
                                                <span class="view"><?= $model->cluster_id ? $model->cluster->cluster : null ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'kampung_id'); ?> : </label>
                                            <div class="col-md-5">
                                                <span class="view"><?= $model->kampung_id ? $model->kampung->kampung : null ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <h3 class="form-section">Struktur Kampung</h3>
                               
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'jenis_kampung_id'); ?> : </label>
                                            <div class="col-md-6">
                                                <span class="view"><?= $model->jenis_kampung_id ? $model->jeniskg->jenis_kampung : null ?></span>
                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'corak_penempatan_id'); ?> : </label>
                                            <div class="col-md-6">
                                                <span class="view"><?= $model->corak_penempatan_id ? $model->corak->corak_penempatan : null ?></span>
           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'jenis_perumahan_id'); ?> : </label>
                                            <div class="col-md-6">
                                                <span class="view"><?= $model->jenis_perumahan_id ? $model->jenisPerumahan->jenis_perumahan : null ?></span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-5"><?= Html::activeLabel($model,'bilangan_rumah'); ?> : </label>
                                            <div class="col-md-6">
                                                <span class="view"><?= $model->bilangan_rumah ? $model->bil->bil_rumah : null ?></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <?php foreach ($kemudahan as $key => $value) {
                                    if ($value['id_kemudahan'] == 1) {
                                            $kemudahan1 = $value['kemudahan'];
                                            $bil1 = $value['bil'];
                                            $status1 = $value['status'];
                                            $nama1 = $value['nama'];
                                            $catatan1 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 2) {
                                            $kemudahan2 = $value['kemudahan'];
                                            $bil2 = $value['bil'];
                                            $status2 = $value['status'];
                                            $nama2 = $value['nama'];
                                            $catatan2 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 3) {
                                            $kemudahan3 = $value['kemudahan'];
                                            $bil3 = $value['bil'];
                                            $status3 = $value['status'];
                                            $nama3 = $value['nama'];
                                            $catatan3 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 4) {
                                            $kemudahan4 = $value['kemudahan'];
                                            $bil4 = $value['bil'];
                                            $status4 = $value['status'];
                                            $nama4 = $value['nama'];
                                            $catatan4 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 5) {
                                            $kemudahan5 = $value['kemudahan'];
                                            $bil5 = $value['bil'];
                                            $status5 = $value['status'];
                                            $nama5 = $value['nama'];
                                            $catatan5 = $value['catatan'];
                                    }
                                    
                                    //tambah
                                    if ($value['id_kemudahan'] == 6) {
                                            $kemudahan6 = $value['kemudahan'];
                                            $bil6 = $value['bil'];
                                            $status6 = $value['status'];
                                            $nama6 = $value['nama'];
                                            $catatan6 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 7) {
                                            $kemudahan7 = $value['kemudahan'];
                                            $bil7 = $value['bil'];
                                            $status7 = $value['status'];
                                            $nama7 = $value['nama'];
                                            $catatan7 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 8) {
                                            $kemudahan8 = $value['kemudahan'];
                                            $bil8 = $value['bil'];
                                            $status8 = $value['status'];
                                            $nama8 = $value['nama'];
                                            $catatan8 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 9) {
                                            $kemudahan9 = $value['kemudahan'];
                                            $bil9 = $value['bil'];
                                            $status9 = $value['status'];
                                            $nama9 = $value['nama'];
                                            $catatan9 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 10) {
                                            $kemudahan10 = $value['kemudahan'];
                                            $bil10 = $value['bil'];
                                            $status10 = $value['status'];
                                            $nama10 = $value['nama'];
                                            $catatan10 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 11) {
                                            $kemudahan11 = $value['kemudahan'];
                                            $bil11 = $value['bil'];
                                            $status11 = $value['status'];
                                            $nama11 = $value['nama'];
                                            $catatan11 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 12) {
                                            $kemudahan12 = $value['kemudahan'];
                                            $bil12 = $value['bil'];
                                            $status12 = $value['status'];
                                            $nama12 = $value['nama'];
                                            $catatan12 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 13) {
                                            $kemudahan13 = $value['kemudahan'];
                                            $bil13 = $value['bil'];
                                            $status13 = $value['status'];
                                            $nama13 = $value['nama'];
                                            $catatan13 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 14) {
                                            $kemudahan14 = $value['kemudahan'];
                                            $bil14 = $value['bil'];
                                            $status14 = $value['status'];
                                            $nama14 = $value['nama'];
                                            $catatan14 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 15) {
                                            $kemudahan15 = $value['kemudahan'];
                                            $bil15 = $value['bil'];
                                            $status15 = $value['status'];
                                            $nama15 = $value['nama'];
                                            $catatan15 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 16) {
                                            $kemudahan16 = $value['kemudahan'];
                                            $bil16 = $value['bil'];
                                            $status16 = $value['status'];
                                            $nama16 = $value['nama'];
                                            $catatan16 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 17) {
                                            $kemudahan17 = $value['kemudahan'];
                                            $bil17 = $value['bil'];
                                            $status17 = $value['status'];
                                            $nama17 = $value['nama'];
                                            $catatan17 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 18) {
                                            $kemudahan18 = $value['kemudahan'];
                                            $bil18 = $value['bil'];
                                            $status18 = $value['status'];
                                            $nama18 = $value['nama'];
                                            $catatan18 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 19) {
                                            $kemudahan19 = $value['kemudahan'];
                                            $bil19 = $value['bil'];
                                            $status19 = $value['status'];
                                            $nama19 = $value['nama'];
                                            $catatan19 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 20) {
                                            $kemudahan20 = $value['kemudahan'];
                                            $bil20 = $value['bil'];
                                            $status20 = $value['status'];
                                            $nama20 = $value['nama'];
                                            $catatan20 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 21) {
                                            $kemudahan21 = $value['kemudahan'];
                                            $bil21 = $value['bil'];
                                            $status21 = $value['status'];
                                            $nama21 = $value['nama'];
                                            $catatan21 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 22) {
                                            $kemudahan22 = $value['kemudahan'];
                                            $bil22 = $value['bil'];
                                            $status22 = $value['status'];
                                            $nama22 = $value['nama'];
                                            $catatan22 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 23) {
                                            $kemudahan23 = $value['kemudahan'];
                                            $bil23 = $value['bil'];
                                            $status23 = $value['status'];
                                            $nama23 = $value['nama'];
                                            $catatan23 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 24) {
                                            $kemudahan24 = $value['kemudahan'];
                                            $bil24 = $value['bil'];
                                            $status24 = $value['status'];
                                            $nama24 = $value['nama'];
                                            $catatan24 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 25) {
                                            $kemudahan25 = $value['kemudahan'];
                                            $bil25 = $value['bil'];
                                            $status25 = $value['status'];
                                            $nama25 = $value['nama'];
                                            $catatan25 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 26) {
                                            $kemudahan26 = $value['kemudahan'];
                                            $bil26 = $value['bil'];
                                            $status26 = $value['status'];
                                            $nama26 = $value['nama'];
                                            $catatan26 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 27) {
                                            $kemudahan27 = $value['kemudahan'];
                                            $bil27 = $value['bil'];
                                            $status27 = $value['status'];
                                            $nama27 = $value['nama'];
                                            $catatan27 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 28) {
                                            $kemudahan28 = $value['kemudahan'];
                                            $bil28 = $value['bil'];
                                            $status28 = $value['status'];
                                            $nama28 = $value['nama'];
                                            $catatan28 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 29) {
                                            $kemudahan29 = $value['kemudahan'];
                                            $bil29 = $value['bil'];
                                            $status29 = $value['status'];
                                            $nama29 = $value['nama'];
                                            $catatan29 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 30) {
                                            $kemudahan30 = $value['kemudahan'];
                                            $bil30 = $value['bil'];
                                            $status30 = $value['status'];
                                            $nama30 = $value['nama'];
                                            $catatan30 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 31) {
                                            $kemudahan31 = $value['kemudahan'];
                                            $bil31 = $value['bil'];
                                            $status31 = $value['status'];
                                            $nama31 = $value['nama'];
                                            $catatan31 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 32) {
                                            $kemudahan32 = $value['kemudahan'];
                                            $bil32 = $value['bil'];
                                            $status32 = $value['status'];
                                            $nama32 = $value['nama'];
                                            $catatan32 = $value['catatan'];
                                    }
                                    if ($value['id_kemudahan'] == 33) {
                                            $kemudahan33 = $value['kemudahan'];
                                            $bil33 = $value['bil'];
                                            $status33 = $value['status'];
                                            $nama33 = $value['nama'];
                                            $catatan33 = $value['catatan'];
                                    }



                                } ?>
                                <br>
                                
                                    <div class="panel-group accordion" id="accordion3">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
                                                Kemudahan Rumah Ibadah </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3_1" class="panel-collapse in">
                                                <div class="panel-body">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan1; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil1; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status1; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama1; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan1; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan2; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil2; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status2; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama2; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan2; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4"><?= $kemudahan3; ?> : </label>
                                                                    <div class="col-md-6">
                                                                        <span class="view"><?= $bil3; ?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Status : </label>
                                                                    <div class="col-md-6">
                                                                        <span class="view"><?= $status3; ?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Nama : </label>
                                                                    <div class="col-md-7">
                                                                        <span class="view"><?= $nama3; ?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Catatan : </label>
                                                                    <div class="col-md-7">
                                                                        <span class="view"><?= $catatan3; ?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4"><?= $kemudahan4; ?> : </label>
                                                                    <div class="col-md-6">
                                                                        <span class="view"><?= $bil4; ?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Status : </label>
                                                                    <div class="col-md-6">
                                                                        <span class="view"><?= $status4; ?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Nama : </label>
                                                                    <div class="col-md-7">
                                                                        <span class="view"><?= $nama4; ?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Catatan : </label>
                                                                    <div class="col-md-7">
                                                                        <span class="view"><?= $catatan4; ?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4"><?= $kemudahan5; ?> : </label>
                                                                    <div class="col-md-6">
                                                                        <span class="view"><?= $bil5; ?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Status : </label>
                                                                    <div class="col-md-6">
                                                                        <span class="view"><?= $status5; ?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Nama : </label>
                                                                    <div class="col-md-7">
                                                                        <span class="view"><?= $nama5; ?></span>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Catatan : </label>
                                                                    <div class="col-md-7">
                                                                        <span class="view"><?= $catatan5; ?></span>
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
                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2">
                                                Kemudahan Masyarakat </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3_2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                     
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan6; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil6; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status6; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama6; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan6; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan7; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil7; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status7; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama7; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan7; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan8; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil8; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status8; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama8; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan8; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan9; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil9; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status9; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama9; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan9; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan10; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil10; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status10; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama10; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan10; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan11; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil11; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status11; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama11; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan11; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan27; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil27; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status27; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama27; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan27; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan28; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil28; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status28; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama28; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan28; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan29; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil29; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status29; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama29; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan29; ?></span>
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
                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3">
                                                Kemudahan Pendidikan </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3_3" class="panel-collapse collapse">
                                                <div class="panel-body">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan12; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil12; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status12; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama12; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan12; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan13; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil13; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status13; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama13; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan13; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan14; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil14; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status14; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama14; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan14; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan15; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil15; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status15; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama15; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan15; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan16; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil16; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status16; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama16; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan16; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan17; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil17; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status17; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama17; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan17; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan25; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil25; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status25; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama25; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan25; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan26; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil26; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status26; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama26; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan26; ?></span>
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
                                                Asas Ekonomi </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3_4" class="panel-collapse collapse">
                                                <div class="panel-body">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan18; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil18; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status18; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama18; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan18; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan19; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil19; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status19; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama19; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan19; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan20; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil20; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status20; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama20; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan20; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan21; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil21; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status21; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama21; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan21; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan22; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil22; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status22; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama22; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan22; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan23; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil23; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status23; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama23; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan23; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan24; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil24; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status24; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama24; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan24; ?></span>
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
                                                <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_5">
                                                Kemudahan Rekreasi </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3_5" class="panel-collapse collapse">
                                                <div class="panel-body">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan30; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil30; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status30; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama30; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan30; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan31; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil31; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status31; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama31; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan31; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan32; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil32; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status32; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama32; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan32; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4"><?= $kemudahan33; ?> : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $bil33; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Status : </label>
                                                                        <div class="col-md-6">
                                                                            <span class="view"><?= $status33; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Nama : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $nama33; ?></span>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Catatan : </label>
                                                                        <div class="col-md-7">
                                                                            <span class="view"><?= $catatan33; ?></span>
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
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <!-- END PAGE CONTENT INNER -->
        


        </div>
    </div>
    <!-- END PAGE CONTENT -->


    