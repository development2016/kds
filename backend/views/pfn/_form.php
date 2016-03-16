<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupMukim;
use common\models\LookupKampung;
use common\models\LookupPfnCategory;
use common\models\LookupPfnRating;
use common\models\LookupBahagian;

$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
$subbase = ArrayHelper::map(LookupSubBase::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_id])->asArray()->all(),'cluster_id','cluster');
$kampung = ArrayHelper::map(LookupKampung::find()->where(['cluster_id'=>$model->cluster_id])->asArray()->all(),'kampung_id','kampung');
$mukim = ArrayHelper::map(LookupMukim::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'mukim_id','mukim');
$bahagian = ArrayHelper::map(LookupBahagian::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'bahagian_id', 'bahagian');

$pfnCat = ArrayHelper::map(LookupPfnCategory::find()->asArray()->all(), 'cat_id', 'cat_name');
$pfnRating = ArrayHelper::map(LookupPfnRating::find()->asArray()->all(), 'rating_id', 'description');
?>
<?php $form = ActiveForm::begin(); ?>

<div class="form-wizard">
    <div class="form-body">
        <ul class="nav nav-pills nav-justified steps">
            <li>
                <a href="#tab1" data-toggle="tab" class="step">
                <span class="number">
                1 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Maklumat Rangkaian Fasiliti Awam </span>
                </a>
            </li>
            <li>
                <a href="#tab2" data-toggle="tab" class="step">
                <span class="number">
                2 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Kemudahan Asas </span>
                </a>
            </li>
            <li>
                <a href="#tab3" data-toggle="tab" class="step">
                <span class="number">
                3 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Kemudahan ICT </span>
                </a>
            </li>
            <li>
                <a href="#tab4" data-toggle="tab" class="step">
                <span class="number">
                4 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Bilik Latihan </span>
                </a>
            </li>
            <li>
                <a href="#tab5" data-toggle="tab" class="step">
                <span class="number">
                5 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Peralatan Sukan </span>
                </a>
            </li>
            <li>
                <a href="#tab6" data-toggle="tab" class="step">
                <span class="number">
                6 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Mesra OKU </span>
                </a>
            </li>
            <li>
                <a href="#tab7" data-toggle="tab" class="step">
                <span class="number">
                7 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Capaian </span>
                </a>
            </li>
            <li>
                <a href="#tab8" data-toggle="tab" class="step">
                <span class="number">
                8 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Ulasan </span>
                </a>
            </li>
            <li>
                <a href="#tab9" data-toggle="tab" class="step">
                <span class="number">
                9 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Pengesahan </span>
                </a>
            </li>
        </ul>
        <div id="bar" class="progress progress-striped" role="progressbar">
            <div class="progress-bar progress-bar-success">
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <?=$form->errorSummary($model);?>
                <div class="caption font-green-haze">
                    <span class="caption-subject bold uppercase"> Maklumat Rangkaian Fasiliti Awam</span>
                </div>
                <br>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'pfn_code',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'pfn_code'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'pfn_code'); ?></span>
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'date',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'date'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'date'); ?></span>
                                    
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
                                    
                                    <?= Html::activeTextInput($model,'pfn_name',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'pfn_name'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'pfn_name'); ?></span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'cat_id', $pfnCat, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'cat_id'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'cat_id'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'lokasi',
                                     [
                                        'Bandar' => 'Bandar',
                                        'Luar Bandar' => 'Luar Bandar',
                                     ], 
                                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'lokasi'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'lokasi'); ?></span>
                                </div>
                            </div>
            <div class="col-md-3">
                <div class="form-group form-md-line-input">
                    <?= Html::activeDropDownList($model, 'status_audit',
                     [
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                     ], 
                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'status_audit'); ?></label>
                    <span class="help-block"><?= Html::error($model,'status_audit'); ?></span>
                </div>
            </div>
                        <div class="col-md-3">
                <div class="form-group form-md-line-input">
                    <?= Html::activeDropDownList($model, 'status_rangkaian',
                     [
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                     ], 
                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'status_rangkaian'); ?></label>
                    <span class="help-block"><?= Html::error($model,'status_rangkaian'); ?></span>
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
                                    <?= Html::activeTextArea($model,'alamat',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'alamat'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'alamat'); ?></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'poskod',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'poskod'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'poskod'); ?></span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'state_id', $state, 
                                        [
                                            'prompt'=>'(Sila Pilih)','id'=>'state_pfn',
                                                'onchange'=>
                                                'JS: var id = (this.value);
                                                if (id == 21) {
                                                    $.post( "'.Yii::$app->urlManager->createUrl(['pfn/listbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#bahagian " ).html( data );});
                                                }
                                                else if(id == 22){
                                                    $.post( "'.Yii::$app->urlManager->createUrl(['pfn/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#johordistrict " ).html( data );});
                                                } else {
                                                    $.post( "'.Yii::$app->urlManager->createUrl(['pfn/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district " ).html( data );});
                                                };',
                                                    /*'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});*',*/
                                            'class'=>'form-control state_drilldown']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                                </div>
                            </div>
                            <div style="display:none;" class="johor_pfn"> <!-- Johor SECTION -->
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'district_id', $district, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listmukim','id'=>'']).'"+$(this).val(), function( data ) {$( "select#mukim_johor" ).html( data );});',
                                                'prompt'=>'','id'=>'johordistrict',
                               
                                                'class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'mukim_id', $mukim, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listjohorsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbasejohor" ).html( data );});',
                                                'prompt'=>'','id'=>'mukim_johor',
                                                'class'=>'form-control',

                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'mukim_id'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'mukim_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#clusterjohor" ).html( data );});',
                                                'prompt'=>'','id'=>'subbasejohor',   
                                                'class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_id'); ?> </label>
                                            <span class="help-block"><?= Html::error($model,'sub_base_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'cluster_id', $cluster, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampungjohor" ).html( data );});',
                                                'prompt'=>'','id'=>'clusterjohor',   
                                                'class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'cluster_id'); ?> </label>
                                                <span class="help-block"><?= Html::error($model,'cluster_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'kampung_id', $kampung, 
                                            [
                                                'prompt'=>'','id'=>'kampungjohor',
                                                'class'=>'form-control',

                                            ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?> <span class="required">*</span></label>
                                                <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none;" class="sarawak_pfn"> <!-- SARAWAK SECTION -->
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'bahagian_id', $bahagian, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listdistrictbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district_bahagian" ).html( data );});',
                                                'prompt'=>'','id'=>'bahagian',   
                                                'class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'bahagian_id'); ?> </label>
                                                <span class="help-block"><?= Html::error($model,'bahagian_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'district_id', $district, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbasesarawak" ).html( data );});',
                                                'prompt'=>'','id'=>'district_bahagian',   
                                                'class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> </label>
                                                <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#clustersarawak" ).html( data );});',
                                                'prompt'=>'','id'=>'subbasesarawak',   
                                                'class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_id'); ?> </label>
                                                <span class="help-block"><?= Html::error($model,'sub_base_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'cluster_id', $cluster, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampungsarawak" ).html( data );});',
                                                'prompt'=>'','id'=>'clustersarawak',   
                                                'class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'cluster_id'); ?> </label>
                                                <span class="help-block"><?= Html::error($model,'cluster_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'kampung_id', $kampung, 
                                            [
                                                'prompt'=>'','id'=>'kampungsarawak',
                                                'class'=>'form-control',

                                            ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?> <span class="required">*</span></label>
                                                <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none;" class="other_state_pfn"> <!-- Other State SECTION -->
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'district_id', $district, 
                                            [
                                                'prompt'=>'','id'=>'district',
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase_other" ).html( data );});',
                                                'class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster_other" ).html( data );});',
                                                'prompt'=>'','id'=>'subbase_other',
                                                'class'=>'form-control',
                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_id'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'sub_base_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'cluster_id', $cluster, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung_other" ).html( data );});',
                                                'prompt'=>'','id'=>'cluster_other',
                                                'class'=>'form-control',
                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'cluster_id'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'cluster_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'kampung_id', $kampung, 
                                            [
                                                'prompt'=>'','id'=>'kampung_other',
                                                'class'=>'form-control',
                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
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
                                    
                                    <?= Html::activeTextInput($model,'nama_pengurus',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'nama_pengurus'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'nama_pengurus'); ?></span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'no_kp',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'no_kp'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'no_kp'); ?></span>
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'no_kp_old',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'no_kp_old'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'no_kp_old'); ?></span>
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'jantina',
                                     [
                                        'Lelaki' => 'Lelaki',
                                        'Perempuan' => 'Perempuan',
                                     ], 
                                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'jantina'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'jantina'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'mobile',['id'=>'mask_mobile','class'=>'form-control','placeholder'=>'011-*********']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'mobile'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'mobile'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'no_tel',['id'=>'mask_home','class'=>'form-control','placeholder'=>'03-********']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'no_tel'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'no_tel'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'fax',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'fax'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'fax'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'email',['id'=>'form_control_1','class'=>'form-control','placeholder'=>'Eg. cypress@gmail.com']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'email'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'email'); ?></span>
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
                                    
                                    <?= Html::activeTextInput($model,'nama_pengurus2',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'nama_pengurus2'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'nama_pengurus2'); ?></span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'no_kp2',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'no_kp2'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'no_kp2'); ?></span>
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'no_kp_old2',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'no_kp_old2'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'no_kp_old2'); ?></span>
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'jantina2',
                                     [
                                        'Lelaki' => 'Lelaki',
                                        'Perempuan' => 'Perempuan',
                                     ], 
                                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'jantina2'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'jantina2'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'mobile2',['id'=>'mask_mobile','class'=>'form-control','placeholder'=>'011-*********']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'mobile2'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'mobile2'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'no_tel2',['id'=>'mask_home','class'=>'form-control','placeholder'=>'03-********']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'no_tel2'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'no_tel2'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'fax2',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'fax2'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'fax2'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'email2',['id'=>'form_control_1','class'=>'form-control','placeholder'=>'Eg. cypress@gmail.com']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'email2'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'email2'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'koordinate',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'koordinate'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'koordinate'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="tab-pane" id="tab2">
                <div class="caption font-green-haze">
                    <span class="caption-subject bold uppercase"> Kemudahan Asas</span>
                </div>
                <br>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'elektrik',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'elektrik'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'elektrik'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keadaan_elektrik',
                                     [
                                        'Baik' => 'Baik',
                                        'Tidak Baik' => 'Tidak Baik',
                                     ], 
                                    ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_elektrik'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_elektrik'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'air',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     ], 
                                    ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'air'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'air'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keadaan_air',
                                     [
                                        'Baik' => 'Baik',
                                        'Tidak Baik' => 'Tidak Baik',
                                     ], 
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_air'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_air'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'meja',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     ], 
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'meja'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'meja'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keadaan_meja',
                                     [
                                        'Baik' => 'Baik',
                                        'Tidak Baik' => 'Tidak Baik',
                                     ], 
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_meja'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_meja'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'jumlah_meja',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'jumlah_meja'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'jumlah_meja'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'kerusi',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'kerusi'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'kerusi'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keadaan_kerusi',
                                     [
                                        'Baik' => 'Baik',
                                        'Tidak Baik' => 'Tidak Baik',
                                     ], 
                                    ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_kerusi'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_kerusi'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'jumlah_kerusi',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'jumlah_kerusi'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'jumlah_kerusi'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'papan_putih',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'papan_putih'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'papan_putih'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keadaan_papan_putih',
                                     [
                                        'Baik' => 'Baik',
                                        'Tidak Baik' => 'Tidak Baik',
                                     ], 
                                    ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_papan_putih'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_papan_putih'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'bilik_mesyuarat',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'bilik_mesyuarat'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'bilik_mesyuarat'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keadaan_bilik_mesyuarat',
                                     [
                                        'Baik' => 'Baik',
                                        'Tidak Baik' => 'Tidak Baik',
                                     ], 
                                    ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_bilik_mesyuarat'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_bilik_mesyuarat'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keaktifan_bilik_mesyuarat',
                                     [
                                        'Aktif' => 'Aktif',
                                        'Tidak Aktif' => 'Tidak Aktif',
                                     ], 
                                    ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keaktifan_bilik_mesyuarat'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keaktifan_bilik_mesyuarat'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'keluasan_bilik_mesyuarat',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keluasan_bilik_mesyuarat'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keluasan_bilik_mesyuarat'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'kawasan_lapang',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'kawasan_lapang'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'kawasan_lapang'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body"> 
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'keluasan_kawasan_lapang',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keluasan_kawasan_lapang'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keluasan_kawasan_lapang'); ?></span>
                                </div>
                            </div>
                           <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'tandas',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'tandas'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'tandas'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keadaan_tandas',
                                     [
                                        'Baik' => 'Baik',
                                        'Tidak Baik' => 'Tidak Baik',
                                     ], 
                                    ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_tandas'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_tandas'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'bilik_mandi',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'bilik_mandi'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'bilik_mandi'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keadaan_bilik_mandi',
                                     [
                                        'Baik' => 'Baik',
                                        'Tidak Baik' => 'Tidak Baik',
                                     ], 
                                    ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_bilik_mandi'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_bilik_mandi'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'ruang_solat',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'ruang_solat'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'ruang_solat'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body"> 
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keadaan_ruang_solat',
                                     [
                                        'Baik' => 'Baik',
                                        'Tidak Baik' => 'Tidak Baik',
                                     ], 
                                    ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_ruang_solat'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_ruang_solat'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'rating_kemudahan_asas', $pfnRating, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'rating_kemudahan_asas'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'rating_kemudahan_asas'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane" id="tab3">
                <div class="caption font-green-haze">
                    <span class="caption-subject bold uppercase"> Kemudahan ICT</span>
                </div>
                <br>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'komputer',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'komputer'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'komputer'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'keadaan_komputer',
                                     [
                                        'Boleh Diguna' => 'Boleh Diguna',
                                        'Tidak Boleh Diguna' => 'Tidak Boleh Diguna',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_komputer'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_komputer'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'bilangan_komputer',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'bilangan_komputer'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'bilangan_komputer'); ?></span>
                                </div>
                            </div>
                            
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'projektor',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'projektor'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'projektor'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'keadaan_projektor',
                                     [
                                        'Boleh Diguna' => 'Boleh Diguna',
                                        'Tidak Boleh Diguna' => 'Tidak Boleh Diguna',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_projektor'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_projektor'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'bilangan_projektor',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'bilangan_projektor'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'bilangan_projektor'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'mesin_pencetak',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'mesin_pencetak'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'mesin_pencetak'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'keadaan_mesin_pencetak',
                                     [
                                        'Boleh Diguna' => 'Boleh Diguna',
                                        'Tidak Boleh Diguna' => 'Tidak Boleh Diguna',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_mesin_pencetak'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_mesin_pencetak'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'bilangan_mesin_pencetak',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'bilangan_mesin_pencetak'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'bilangan_mesin_pencetak'); ?></span>
                                </div>
                            </div>
                            
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'mesin_faks',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'mesin_faks'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'mesin_faks'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'keadaan_mesin_faks',
                                     [
                                        'Boleh Diguna' => 'Boleh Diguna',
                                        'Tidak Boleh Diguna' => 'Tidak Boleh Diguna',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_mesin_faks'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_mesin_faks'); ?></span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body"> 
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'bilangan_mesin_faks',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'bilangan_mesin_faks'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'bilangan_mesin_faks'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'pa_system',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'pa_system'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'pa_system'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'keadaan_pa_system',
                                     [
                                        'Boleh Diguna' => 'Boleh Diguna',
                                        'Tidak Boleh Diguna' => 'Tidak Boleh Diguna',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_pa_system'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_pa_system'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'unifi',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'unifi'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'unifi'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'streamyx',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'streamyx'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'streamyx'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'lain_internet',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'lain_internet'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'lain_internet'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body"> 
                            
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'maxis',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'maxis'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'maxis'); ?></span>
                                </div>
                            </div>
                           <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'digi',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'digi'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'digi'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'celcom',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'celcom'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'celcom'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'p1wimax',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'p1wimax'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'p1wimax'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'yes4g',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'yes4g'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'yes4g'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'lain_broadband',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'lain_broadband'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'lain_broadband'); ?></span>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body"> 
                            <div class="col-md-4" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'rating_kemudahan_ict', $pfnRating, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="orm_control_1"><?= Html::activeLabel($model,'rating_kemudahan_ict'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'rating_kemudahan_ict'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="tab4">
                <div class="caption font-green-haze">
                    <span class="caption-subject bold uppercase"> Bilik Latihan</span>
                </div>
                <br>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'kerusi_bilik_latihan',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'kerusi_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'kerusi_bilik_latihan'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keadaan_kerusi_bilik_latihan',
                                     [
                                        'Baik' => 'Baik',
                                        'Tidak Baik' => 'Tidak Baik',
                                     ], 
                                    ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_kerusi_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_kerusi_bilik_latihan'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'bil_kerusi_bilik_latihan',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'bil_kerusi_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'bil_kerusi_bilik_latihan'); ?></span>
                                </div>
                            </div>


                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'meja_bilik_latihan',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'meja_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'meja_bilik_latihan'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keadaan_meja_bilik_latihan',
                                     [
                                        'Baik' => 'Baik',
                                        'Tidak Baik' => 'Tidak Baik',
                                     ], 
                                    ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_meja_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_meja_bilik_latihan'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body"> 
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'bil_meja_bilik_latihan',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'bil_meja_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'bil_meja_bilik_latihan'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'keluasan_bilik_latihan',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keluasan_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keluasan_bilik_latihan'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'penghawa_dingin_bilik_latihan',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'penghawa_dingin_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'penghawa_dingin_bilik_latihan'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keadaan_penghawa_dingin_bilik_latihan',
                                     [
                                        'Baik' => 'Baik',
                                        'Tidak Baik' => 'Tidak Baik',
                                     ], 
                                    ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_penghawa_dingin_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_penghawa_dingin_bilik_latihan'); ?></span>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body"> 
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'bilangan_penghawa_dingin_bilik_latihan',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'bilangan_penghawa_dingin_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'bilangan_penghawa_dingin_bilik_latihan'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'papan_putih_bilik_latihan',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'papan_putih_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'papan_putih_bilik_latihan'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'keadaan_papan_putih_bilik_latihan',
                                     [
                                        'Baik' => 'Baik',
                                        'Tidak Baik' => 'Tidak Baik',
                                     ], 
                                    ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'keadaan_papan_putih_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'keadaan_papan_putih_bilik_latihan'); ?></span>
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'bilangan_papan_putih_bilik_latihan',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'bilangan_papan_putih_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'bilangan_papan_putih_bilik_latihan'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body"> 
                            <div class="col-md-4" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'rating_bilik_latihan', $pfnRating, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'rating_bilik_latihan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'rating_bilik_latihan'); ?></span>
                                </div>
                            </div>            
                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-pane" id="tab5">
                <div class="caption font-green-haze">
                    <span class="caption-subject bold uppercase"> Peralatan Sukan</span>
                </div>
                <br>
                <?= Html::a('Tambah',FALSE, ['id'=>'addmoresukan','class' => 'btn btn-success']) ?>
                <br><br>
                <div class="adddivsukan">
                    <div class="row" id="sukan">
                        <div class="portlet-body form">
                            <div class="form-body">

                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeTextInput($model_equip,'equip_name[]',['class'=>'form-control']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model_equip,'equip_name'); ?></label>
                                        <span class="help-block"><?= Html::error($model_equip,'equip_name'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeTextInput($model_equip,'quantity[]',['class'=>'form-control']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model_equip,'quantity'); ?></label>
                                        <span class="help-block"><?= Html::error($model_equip,'quantity'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeTextInput($model_equip,'condition[]',['class'=>'form-control']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model_equip,'condition'); ?></label>
                                        <span class="help-block"><?= Html::error($model_equip,'condition'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-1" id="del"  style="display:none;">
                                    <div class="form-group form-md-line-input">
                                        <input type="button" id="remove" class="btn red-sunglo"  value="Buang">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body"> 
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'rating_equip', $pfnRating, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'rating_equip'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'rating_equip'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>

           
            <div class="tab-pane" id="tab6">
                <div class="caption font-green-haze">
                    <span class="caption-subject bold uppercase"> Mesra OKU</span>
                </div>
                <br>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-3" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'tempat_letak_kereta_oku',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'tempat_letak_kereta_oku'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'tempat_letak_kereta_oku'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'tandas_khas_oku',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'tandas_khas_oku'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'tandas_khas_oku'); ?></span>
                                </div>
                            </div>
                           <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'laluan_khas_oku',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'laluan_khas_oku'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'laluan_khas_oku'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'tangga_handrail_oku',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'tangga_handrail_oku'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'tangga_handrail_oku'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'papan_tanda_khas_oku',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'papan_tanda_khas_oku'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'papan_tanda_khas_oku'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-4" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'rating_mesra_oku', $pfnRating, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'rating_mesra_oku'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'rating_mesra_oku'); ?></span>
                                </div>
                            </div>  
                            
                        
                        </div>
                    </div>
                </div>
            </div>

        
            <div class="tab-pane" id="tab7">
                <div class="caption font-green-haze">
                    <span class="caption-subject bold uppercase"> Capaian</span>
                </div>
                <br>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'jarak_pfn_komuniti',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'jarak_pfn_komuniti'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'jarak_pfn_komuniti'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'tempat_letak_kenderaan_capaian',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'tempat_letak_kenderaan_capaian'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'tempat_letak_kenderaan_capaian'); ?></span>
                                </div>
                            </div>
                           <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'jarak_tempat_letak_kenderaan_capaian',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'jarak_tempat_letak_kenderaan_capaian'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'jarak_tempat_letak_kenderaan_capaian'); ?></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'kedai_runcit',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'kedai_runcit'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'kedai_runcit'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'jarak_kedai_runcit',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'jarak_kedai_runcit'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'jarak_kedai_runcit'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'kedai_makan',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'kedai_makan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'kedai_makan'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'jarak_kedai_makan',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'jarak_kedai_makan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'jarak_kedai_makan'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'stesen_minyak',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'stesen_minyak'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'stesen_minyak'); ?></span>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'jarak_stesen_minyak',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'jarak_stesen_minyak'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'jarak_stesen_minyak'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'hentian_bas',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'hentian_bas'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'hentian_bas'); ?></span>
                                </div>
                            </div>  
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'jarak_hentian_bas',['id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'jarak_hentian_bas'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'jarak_hentian_bas'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'isyarat_telekomunikasi',
                                     [
                                        'Ada' => 'Ada',
                                        'Tiada' => 'Tiada',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'isyarat_telekomunikasi'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'isyarat_telekomunikasi'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'rating_capaian', $pfnRating, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'rating_capaian'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'rating_capaian'); ?></span>
                                </div>
                            </div> 



                        </div>
                    </div>
                </div> 
            </div>
            



            <div class="tab-pane" id="tab8">
                <div class="caption font-green-haze">
                    <span class="caption-subject bold uppercase"> Ulasan</span>
                </div>
                <br>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextArea($model,'ulasan_keadaan_fizikal',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'ulasan_keadaan_fizikal'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'ulasan_keadaan_fizikal'); ?></span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-4" >
                                <div class="form-group form-md-line-input">

                                    <?= Html::activeDropDownList($model, 'kerjasama_pengurus',
                                     [
                                        'Memberi Kerjasama' => 'Memberi Kerjasama',
                                        'Tidak Memberi Kerjasama' => 'Tidak Memberi Kerjasama',
                                     
                                     ],
                                      ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'kerjasama_pengurus'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'kerjasama_pengurus'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeDropDownList($model, 'rating_keseluruhan_pfn', $pfnRating, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'rating_keseluruhan_pfn'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'rating_keseluruhan_pfn'); ?></span>
                                    
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane" id="tab9">
                <div class="caption font-green-haze">
                    <span class="caption-subject bold uppercase"> Pengesahan</span>
                </div>
                <br>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'tarikh_daftar',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_daftar'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'tarikh_daftar'); ?></span>
                                    
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
                                    
                                    <?= Html::activeTextInput($model,'didaftarkan_oleh',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'didaftarkan_oleh'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'didaftarkan_oleh'); ?></span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'tarikh_audit',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_audit'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'tarikh_audit'); ?></span>
                                    
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
                                    
                                    <?= Html::activeTextInput($model,'diaudit_oleh',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'diaudit_oleh'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'diaudit_oleh'); ?></span>
                                    
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
                                    
                                    <?= Html::activeTextArea($model,'nota',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'nota'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'nota'); ?></span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="form-actions">
            
            <a href="javascript:;" class="btn default button-previous">
            Kembali </a>
            <a href="javascript:;" class="btn blue button-next">
            Seterusnya 
            </a>
            <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['id'=>'button-submit','class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>         

        </div>
</div>
<?php ActiveForm::end(); ?>