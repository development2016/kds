<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupCountry;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;
use common\models\LookupAgama;
use common\models\LookupBangsa;
use common\models\LookupKategoriOku;
use common\models\LookupPerkahwinan;
use common\models\LookupSpending;
use common\models\LookupIncome;
use common\models\LookupEduLevel;
use common\models\LookupHubungan;
use common\models\LookupEduLevelUnder17;
use common\models\LookupMukim;
use common\models\LookupBahagian;

//$negara = ArrayHelper::map(LookupCountry::find()->asArray()->all(), 'country_id', 'country');
$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
$district_sarawak = ArrayHelper::map(LookupDistrict::find()->where(['bahagian_id'=>$model->bahagian_id])->asArray()->all(), 'district_id', 'district');

$subbase = ArrayHelper::map(LookupSubBase::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_id])->asArray()->all(),'cluster_id','cluster');
$kampung = ArrayHelper::map(LookupKampung::find()->where(['cluster_id'=>$model->cluster_id])->asArray()->all(),'kampung_id','kampung');
$mukim = ArrayHelper::map(LookupMukim::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'mukim_id','mukim');
$bahagian = ArrayHelper::map(LookupBahagian::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'bahagian_id', 'bahagian');

$agama = ArrayHelper::map(LookupAgama::find()->asArray()->all(), 'id', 'agama');
$bangsa = ArrayHelper::map(LookupBangsa::find()->asArray()->all(), 'id', 'bangsa');
$kategoriOku = ArrayHelper::map(LookupKategoriOku::find()->asArray()->all(), 'id', 'kategori_oku');
$perkahwinan = ArrayHelper::map(LookupPerkahwinan::find()->asArray()->all(), 'id', 'status_perkahwinan');
$spending = ArrayHelper::map(LookupSpending::find()->asArray()->all(), 'id', 'spending');
$income = ArrayHelper::map(LookupIncome::find()->asArray()->all(), 'id', 'income');
$edu = ArrayHelper::map(LookupEduLevel::find()->asArray()->all(), 'id', 'edu_level');
$hubungan = ArrayHelper::map(LookupHubungan::find()->asArray()->all(), 'id', 'hubungan');
$edu17 = ArrayHelper::map(LookupEduLevelUnder17::find()->asArray()->all(), 'id', 'edu_level_under_17');
$i = array('0'=>'0','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15');
$citizen = array('Warganegara'=>'Warganegara','Bukan Warganegara'=>'Bukan Warganegara','Penduduk Tetap'=>'Penduduk Tetap');
$umur = array('1 Tahun'=>'1 Tahun','2 Tahun'=>'2 Tahun','3 Tahun'=>'3 Tahun','4 Tahun'=>'4 Tahun','5 Tahun'=>'5 Tahun','6 Tahun'=>'6 Tahun','7 Tahun'=>'7 Tahun','8 Tahun'=>'8 Tahun','9 Tahun'=>'9 Tahun','10 Tahun'=>'10 Tahun','11 Tahun'=>'11 Tahun','12 Tahun'=>'12 Tahun','13 Tahun'=>'13 Tahun','14 Tahun'=>'14 Tahun','15 Tahun'=>'15 Tahun','16 Tahun'=>'16 Tahun','17 Tahun'=>'17 Tahun');
/* @var $this yii\web\View */
/* @var $model common\models\People */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
        'id' => 'people-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => false,
    ]); ?>
       
        <div class="form-wizard">
            <div class="form-body">
                <ul class="nav nav-pills nav-justified steps">
                    <li>
                        <a href="#tab1" data-toggle="tab" class="step">
                        <span class="number">
                        1 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Responden </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab" class="step">
                        <span class="number">
                        2 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Pasangan </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab3" data-toggle="tab" class="step">
                        <span class="number">
                        2 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Tanggungan </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab4" data-toggle="tab" class="step">
                        <span class="number">
                        2 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Tambahan </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab5" data-toggle="tab" class="step">
                        <span class="number">
                        2 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> OKU </span>
                        </a>
                    </li>
                </ul>
                <div id="bar" class="progress " role="progressbar">
                    <div class="progress-bar progress-bar-success">
                    </div>
                </div>


                <div class="tab-content">
                    <p>Ruangan Yang Bertanda <span class="required">*</span> Adalah Wajib Diisi.</p>

                    <div class="tab-pane active" id="tab1">
                            <?=$form->errorSummary($model);?>
                            <div class="caption font-green-haze">
                                <span class="caption-subject bold uppercase"> Maklumat Responden</span>
                            </div>
                            <br>

                            <div class="row">
                                <div class="portlet-body form">
                                    <div class="form-body">

                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'tarikh_soal_selidik',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_soal_selidik'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'tarikh_soal_selidik'); ?></span>
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
                                                <?= Html::activeTextInput($model,'name',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'name'); ?> <span class="required">*</span></label>
                                                <span class="help-block"><?= Html::error($model,'name'); ?></span>
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
                                                <?= Html::activeTextInput($model,'name_nick',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'name_nick'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'name_nick'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'ic_no',['class'=>'form-control','placeholder'=>'Eg. xxxxxxxxxxxx','maxlength'=>12]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'ic_no'); ?> <span class="required">*</span></label>
                                                <span class="help-block"><?= Html::error($model,'ic_no'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'ic_no_old',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'ic_no_old'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'ic_no_old'); ?></span>
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
                                                <?= Html::activeTextInput($model,'dob',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'dob'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'dob'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'birth_place',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'birth_place'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'birth_place'); ?></span>
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
                                                <?= Html::activeTextArea($model,'address',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'address'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'address'); ?></span>
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
                                                <?= Html::activeTextInput($model,'postcode',['class'=>'form-control','maxlength'=>5]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'postcode'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'postcode'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'citizen', $citizen, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>

                                                <label for="form_control_1"><?= Html::activeLabel($model,'citizen'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'citizen'); ?></span>
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
                                                'prompt'=>'(Sila Pilih)','id'=>'state',
                                                'onchange'=>
                                                    'JS: var id = (this.value);
                                                    if (id == 21) {
                                                        $.post( "'.Yii::$app->urlManager->createUrl(['people/listbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#bahagian " ).html( data );});
                                                    }
                                                    else if(id == 22){
                                                        $.post( "'.Yii::$app->urlManager->createUrl(['people/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#johordistrict " ).html( data );});
                                                    } else {
                                                        $.post( "'.Yii::$app->urlManager->createUrl(['people/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district " ).html( data );});
                                                    };',
                                                /*'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});*',*/

                                                'class'=>'form-control state_drilldown']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?> <span class="required">*</span></label>
                                                <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                                            </div>
                                        </div>
                                        <div style="display:none;" class="johor"> <!-- Johor SECTION -->
                                            <div class="col-md-4">
                                                <div class="form-group form-md-line-input">
                                                    <?= Html::activeDropDownList($model, 'district_id', $district, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listmukimbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#mukim_johor" ).html( data );});',
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
                                                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listjohorsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbasejohor" ).html( data );});',
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
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#clusterjohor" ).html( data );});',
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
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampungjohor" ).html( data );});',
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
                                        <div style="display:none;" class="bahagian_mukim"> <!-- SARAWAK SECTION -->
                                            <div class="col-md-4">
                                                <div class="form-group form-md-line-input">
                                                    <?= Html::activeDropDownList($model, 'bahagian_id', $bahagian, 
                                                        [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listdistrictbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district_bahagian" ).html( data );});',
                                                            'prompt'=>'','id'=>'bahagian',   
                                                            'class'=>'form-control']); ?>
                                                        <label for="form_control_1"><?= Html::activeLabel($model,'bahagian_id'); ?> </label>
                                                        <span class="help-block"><?= Html::error($model,'bahagian_id'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-md-line-input">
                                                    <?= Html::activeDropDownList($model, 'district_id', $district_sarawak, 
                                                        [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbasesarawak" ).html( data );});',
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
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#clustersarawak" ).html( data );});',
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
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampungsarawak" ).html( data );});',
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
                                        <div style="display:none;" class="lainState"> <!-- Other State SECTION -->
                                            <div class="col-md-4">
                                                <div class="form-group form-md-line-input">
                                                    <?= Html::activeDropDownList($model, 'district_id', $district, 
                                                        [
                                                            'prompt'=>'','id'=>'district',
                                                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase_other" ).html( data );});',
                                                            'class'=>'form-control']); ?>
                                                            <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> <span class="required">*</span></label>
                                                            <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-md-line-input">
                                                    <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                                        [
                                                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster_other" ).html( data );});',
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
                                                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung_other" ).html( data );});',
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

                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'gender',
                                                 [
                                                    'Lelaki' => 'Lelaki',
                                                    'Perempuan' => 'Perempuan',
                                                 ], 
                                                 ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'gender'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'gender'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'religion', $agama, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'religion'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'religion'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'race', $bangsa, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'race'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'race'); ?></span>
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
                                                <?= Html::activeDropDownList($model, 'marital_status', $perkahwinan, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'marital_status'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'marital_status'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group form-md-line-input">
                                                
                                                <?= Html::activeDropDownList($model, 'no_of_children',$i, 
                                                [
                                                    //'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'no_of_children'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'no_of_children'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'mobile_no',['id'=>'mask_mobile','class'=>'form-control','placeholder'=>'011-*********']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'mobile_no'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'mobile_no'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'home_no',['id'=>'mask_home','class'=>'form-control','placeholder'=>'03-********']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'home_no'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'home_no'); ?></span>
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
                                                <?= Html::activeTextInput($model,'email',['class'=>'form-control','placeholder'=>'Eg. cypress@gmail.com']); ?>
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
                                        <p class="title_h4">Adakah anda tergolong dalam Orang Kelainan Upaya (OKU) ? <span class="required">*</span></p>


                                            <div class="col-md-12">
                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                       
                                                        <input type="radio" id="radio53" name="People[oku]" class="md-radiobtn" value="Ya">
                                                        
                                                        <label for="radio53">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                   <div class="md-radio">
                                                        
                                                        <input type="radio" id="radio54" name="People[oku]" class="md-radiobtn" value="Tidak" checked="checked">

                                                        <label for="radio54">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Tidak </label>
                                                    </div>
                                   
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row" id="hideshow" style="display:none;">
                                <div class="portlet-body form">
                                    <div class="form-body">

                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_oku,'no_pendaftaran',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_oku,'no_pendaftaran'); ?></label>
                                                <span class="help-block"><?= Html::error($model_oku,'no_pendaftaran'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_oku, 'kategori_oku', $kategoriOku, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_oku,'kategori_oku'); ?></label>
                                                <span class="help-block"><?= Html::error($model_oku,'kategori_oku'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextArea($model_oku,'nota',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_oku,'nota'); ?></label>
                                                <span class="help-block"><?= Html::error($model_oku,'nota'); ?></span>
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
                                                <?= Html::activeDropDownList($model, 'profession_status',
                                                 [
                                                    'Bekerja' => 'Bekerja',
                                                    'Tidak Bekerja' => 'Tidak Bekerja',
                                                 ], 
                                                 ['prompt'=>'(Sila Pilih)','id'=>'form_control','class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'profession_status'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'profession_status'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'profession',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'profession'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'profession'); ?></span>
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
                                                <?= Html::activeTextInput($model,'job_position',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'job_position'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'job_position'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'job_else',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'job_else'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'job_else'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'income', $income, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'income'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'income'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'spending', $spending, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'spending'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'spending'); ?></span>
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
                    <div class="tab-pane" id="tab2">

                        <div class="caption font-green-haze">
                            <span class="caption-subject bold uppercase"> Maklumat Pasangan</span>
                        </div>
                        <br>
                        <?= Html::a('Tambah',FALSE, ['id'=>'addmorewife','class' => 'btn btn-success']) ?>
                        <br><br>
                        <div class="adddivwife">
                            <div class="row" id="wife">
                                <div class="portlet-body form">
                                    <div class="form-body">

                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_wife,'wife_name[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_wife,'wife_name'); ?></label>
                                                <span class="help-block"><?= Html::error($model_wife,'wife_name'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_wife,'wife_ic[]',['class'=>'form-control','placeholder'=>'Eg. 900907105331','maxlength'=>12]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_wife,'wife_ic'); ?></label>
                                                <span class="help-block"><?= Html::error($model_wife,'wife_ic'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_wife, 'wife_work[]',
                                                 [
                                                    'Ya' => 'Ya',
                                                    'Tidak' => 'Tidak',
                                                 ], 
                                                 ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_wife,'wife_work'); ?></label>
                                                <span class="help-block"><?= Html::error($model_wife,'wife_work'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_wife, 'wife_oku[]',
                                                 [
                                                    'Ya' => 'Ya',
                                                    'Tidak' => 'Tidak',
                                                 ], 
                                                 ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_wife,'wife_oku'); ?></label>
                                                <span class="help-block"><?= Html::error($model_wife,'wife_oku'); ?></span>
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
     
                    </div>
                    <div class="tab-pane" id="tab3">

                        <div class="caption font-green-haze">
                            <span class="caption-subject bold uppercase"> Maklumat Tanggungan</span>
                        </div>
                        <br>
                        <?= Html::a('Tambah',FALSE, ['id'=>'addmoreson','class' => 'btn btn-success']) ?>
                        <br><br>

                        <div class="adddivson">
                            <div class="row" id="son">
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_tanggungan,'nama_tanggungan[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggungan,'nama_tanggungan'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggungan,'nama_tanggungan'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_tanggungan,'no_ic_tanggungan[]',['class'=>'form-control','placeholder'=>'Eg. 900907105331','maxlength'=>12]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggungan,'no_ic_tanggungan'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggungan,'no_ic_tanggungan'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_tanggungan,'tarikh_lahir[]',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggungan,'tarikh_lahir'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggungan,'tarikh_lahir'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_tanggungan, 'edu_level[]', $edu, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggungan,'edu_level'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggungan,'edu_level'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-1" id="delson"  style="display:none;">
                                            <div class="form-group form-md-line-input">
                                                <input type="button" id="removeson" class="btn red-sunglo"  value="Buang">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_tanggungan, 'tanggungan_kerja[]',
                                                 [
                                                    'Ya' => 'Ya',
                                                    'Tidak' => 'Tidak',
                                                 ], 
                                                 ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggungan,'tanggungan_kerja'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggungan,'tanggungan_kerja'); ?></span>
                                            </div>
                                        </div> 
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_tanggungan, 'hubungan[]', $hubungan, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggungan,'hubungan'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggungan,'hubungan'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_tanggungan, 'tanggungan_oku[]',
                                                 [
                                                    'Ya' => 'Ya',
                                                    'Tidak' => 'Tidak',
                                                 ], 
                                                 ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggungan,'tanggungan_oku'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggungan,'tanggungan_oku'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextArea($model_tanggungan,'note[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggungan,'note'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggungan,'note'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <hr class="hrson" style="display:none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane" id="tab4">

                        <?php foreach ($model_question as $key => $value) {
                            if ($value['question_id'] == 1) {$soalan_1 = $value['soalan'];}
                            if ($value['question_id'] == 2) {$soalan_2 = $value['soalan'];}
                            if ($value['question_id'] == 3) {$soalan_3 = $value['soalan'];}
                            if ($value['question_id'] == 4) {$soalan_4 = $value['soalan'];}
                            if ($value['question_id'] == 5) {$soalan_5 = $value['soalan'];}
                            if ($value['question_id'] == 6) {$soalan_6 = $value['soalan'];}
                            if ($value['question_id'] == 7) {$soalan_7 = $value['soalan'];}
                            if ($value['question_id'] == 8) {$soalan_8 = $value['soalan'];}
                            if ($value['question_id'] == 9) {$soalan_9 = $value['soalan'];}
                            if ($value['question_id'] == 10) {$soalan_10 = $value['soalan'];}
                            if ($value['question_id'] == 11) {$soalan_11 = $value['soalan'];}
                            if ($value['question_id'] == 12) {$soalan_12 = $value['soalan'];}
                            if ($value['question_id'] == 13) {$soalan_13 = $value['soalan'];}
                            if ($value['question_id'] == 14) {$soalan_14 = $value['soalan'];}
                            if ($value['question_id'] == 15) {$soalan_15 = $value['soalan'];}
                            if ($value['question_id'] == 16) {$soalan_16 = $value['soalan'];}
                            if ($value['question_id'] == 17) {$soalan_17 = $value['soalan'];}
                            if ($value['question_id'] == 18) {$soalan_18 = $value['soalan'];}
                            if ($value['question_id'] == 19) {$soalan_19 = $value['soalan'];}
                            if ($value['question_id'] == 20) {$soalan_20 = $value['soalan'];}
                            if ($value['question_id'] == 21) {$soalan_21 = $value['soalan'];}
                            if ($value['question_id'] == 22) {$soalan_22 = $value['soalan'];}
                            if ($value['question_id'] == 23) {$soalan_23 = $value['soalan'];}
                            if ($value['question_id'] == 24) {$soalan_24 = $value['soalan'];}
                            if ($value['question_id'] == 25) {$soalan_25 = $value['soalan'];}
                            if ($value['question_id'] == 26) {$soalan_26 = $value['soalan'];}
                            if ($value['question_id'] == 27) {$soalan_27 = $value['soalan'];}
                            if ($value['question_id'] == 28) {$soalan_28 = $value['soalan'];}
                            if ($value['question_id'] == 29) {$soalan_29 = $value['soalan'];}
                            if ($value['question_id'] == 30) {$soalan_30 = $value['soalan'];}
                            if ($value['question_id'] == 31) {$soalan_31 = $value['soalan'];}
                            if ($value['question_id'] == 32) {$soalan_32 = $value['soalan'];}
                            if ($value['question_id'] == 33) {$soalan_33 = $value['soalan'];}
                            if ($value['question_id'] == 34) {$soalan_34 = $value['soalan'];}
                            if ($value['question_id'] == 35) {$soalan_35 = $value['soalan'];}
                            if ($value['question_id'] == 36) {$soalan_36 = $value['soalan'];}
                            if ($value['question_id'] == 37) {$soalan_37 = $value['soalan'];}
                            if ($value['question_id'] == 38) {$soalan_38 = $value['soalan'];}
                            if ($value['question_id'] == 39) {$soalan_39 = $value['soalan'];}
                            if ($value['question_id'] == 40) {$soalan_40 = $value['soalan'];}
                            if ($value['question_id'] == 41) {$soalan_41 = $value['soalan'];}
                            if ($value['question_id'] == 42) {$soalan_42 = $value['soalan'];}
                            if ($value['question_id'] == 43) {$soalan_43 = $value['soalan'];}
                            if ($value['question_id'] == 44) {$soalan_44 = $value['soalan'];}
                            if ($value['question_id'] == 45) {$soalan_45 = $value['soalan'];}
                            if ($value['question_id'] == 46) {$soalan_46 = $value['soalan'];}
                            if ($value['question_id'] == 47) {$soalan_47 = $value['soalan'];}
                            if ($value['question_id'] == 48) {$soalan_48 = $value['soalan'];}
                            if ($value['question_id'] == 49) {$soalan_49 = $value['soalan'];}
                            if ($value['question_id'] == 50) {$soalan_50 = $value['soalan'];}
                            if ($value['question_id'] == 51) {$soalan_51 = $value['soalan'];}
                            if ($value['question_id'] == 52) {$soalan_52 = $value['soalan'];}

                        }

       

                        foreach ($model_question_temp as $key => $value_temp) {

                            if ($value_temp['id'] == 1) {$soalan_1_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 2) {$soalan_2_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 3) {$soalan_3_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 4) {$soalan_4_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 5) {$soalan_5_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 6) {$soalan_6_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 7) {$soalan_7_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 8) {$soalan_8_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 9) {$soalan_9_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 10) {$soalan_10_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 11) {$soalan_11_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 12) {$soalan_12_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 13) {$soalan_13_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 14) {$soalan_14_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 15) {$soalan_15_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 16) {$soalan_16_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 17) {$soalan_17_temp = $value_temp['soalan_temp'];}
                            if ($value_temp['id'] == 18) {$soalan_18_temp = $value_temp['soalan_temp'];}
                        } 

                        ?>

                        <div class="caption font-green-haze">
                            <span class="caption-subject bold uppercase"> Maklumat Tambahan</span>
                        </div>
                        <br>

                    <div class="show_sarawak" style="display:none;">

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="col-md-6">
                                        <p class="title_h5"><?php echo $soalan_1_temp; ?></p>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                               
                                                <input type="radio" id="radio13" name="AnswerTemp[jawapan][1]" class="md-radiobtn" value="1" >
                                                
                                                <label for="radio13">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                1 </label>
                                            </div>
                                            <div class="md-radio">
                                                
                                                <input type="radio" id="radio14" name="AnswerTemp[jawapan][1]" class="md-radiobtn" value="2" >

                                                <label for="radio14">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                2 </label>
                                            </div>
                                            <div class="md-radio">
                                                
                                                <input type="radio" id="radio15" name="AnswerTemp[jawapan][1]" class="md-radiobtn" value="3" >

                                                <label for="radio15">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                3 </label>
                                            </div>
                                            <div class="md-radio">
                                                
                                                <input type="radio" id="radio16" name="AnswerTemp[jawapan][1]" class="md-radiobtn" value="4" >

                                                <label for="radio16">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                4 </label>
                                            </div>
                                            <input type="radio" name="AnswerTemp[jawapan][1]" class="md-radiobtn" value="Tidak Menjawab" checked="checked" style="display:none">
                                        </div>
                                       <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 1]) ?>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="sukarelawan_temp" style="display:none;">

                           <div class="row">
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <p class="title_h7"><?php echo $soalan_2_temp; ?></p>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="md-radio-inline">
                                                <div class="md-radio">
                                                   
                                                    <input type="radio" id="radio44" name="AnswerTemp[jawapan][2]" class="md-radiobtn" value="1" >
                                                    
                                                    <label for="radio44">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    1 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio17" name="AnswerTemp[jawapan][2]" class="md-radiobtn" value="2" >

                                                    <label for="radio17">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    2 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio18" name="AnswerTemp[jawapan][2]" class="md-radiobtn" value="3" >

                                                    <label for="radio18">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    3 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio19" name="AnswerTemp[jawapan][2]" class="md-radiobtn" value="4" >

                                                    <label for="radio19">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    4 </label>
                                                </div>
                                                <input type="radio" name="AnswerTemp[jawapan][2]" class="md-radiobtn" value="Tidak Menjawab" checked="checked" style="display:none">
                                            </div>
                                           <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 2]) ?>
                                            
                                        </div>




                                    </div>
                                </div>
                            </div>

                           <div class="row">
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <p class="title_h7"><?php echo $soalan_3_temp; ?></p>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="md-radio-inline">
                                                <div class="md-radio">
                                                   
                                                    <input type="radio" id="radio20" name="AnswerTemp[jawapan][3]" class="md-radiobtn" value="1" >
                                                    
                                                    <label for="radio20">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    1 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio21" name="AnswerTemp[jawapan][3]" class="md-radiobtn" value="2" >

                                                    <label for="radio21">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    2 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio22" name="AnswerTemp[jawapan][3]" class="md-radiobtn" value="3" >

                                                    <label for="radio22">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    3 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio23" name="AnswerTemp[jawapan][3]" class="md-radiobtn" value="4" >

                                                    <label for="radio23">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    4 </label>
                                                </div>
                                                <input type="radio" name="AnswerTemp[jawapan][3]" class="md-radiobtn" value="Tidak Menjawab" checked="checked" style="display:none">
                                            </div>
                                           <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 3]) ?>
                                            
                                        </div>




                                    </div>
                                </div>
                            </div>

                           <div class="row">
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <p class="title_h7"><?php echo $soalan_4_temp; ?></p>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="md-radio-inline">
                                                <div class="md-radio">
                                                   
                                                    <input type="radio" id="radio24" name="AnswerTemp[jawapan][4]" class="md-radiobtn" value="1" >
                                                    
                                                    <label for="radio24">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    1 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio25" name="AnswerTemp[jawapan][4]" class="md-radiobtn" value="2" >

                                                    <label for="radio25">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    2 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio26" name="AnswerTemp[jawapan][4]" class="md-radiobtn" value="3" >

                                                    <label for="radio26">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    3 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio27" name="AnswerTemp[jawapan][4]" class="md-radiobtn" value="4" >

                                                    <label for="radio27">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    4 </label>
                                                </div>
                                                <input type="radio" name="AnswerTemp[jawapan][4]" class="md-radiobtn" value="Tidak Menjawab" checked="checked" style="display:none">
                                            </div>
                                           <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 4]) ?>
                                            
                                        </div>




                                    </div>
                                </div>
                            </div>

                           <div class="row">
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <p class="title_h7"><?php echo $soalan_5_temp; ?></p>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="md-radio-inline">
                                                <div class="md-radio">
                                                   
                                                    <input type="radio" id="radio28" name="AnswerTemp[jawapan][5]" class="md-radiobtn" value="1" >
                                                    
                                                    <label for="radio28">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    1 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio29" name="AnswerTemp[jawapan][5]" class="md-radiobtn" value="2" >

                                                    <label for="radio29">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    2 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio30" name="AnswerTemp[jawapan][5]" class="md-radiobtn" value="3" >

                                                    <label for="radio30">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    3 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio31" name="AnswerTemp[jawapan][5]" class="md-radiobtn" value="4" >

                                                    <label for="radio31">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    4 </label>
                                                </div>
                                                <input type="radio" name="AnswerTemp[jawapan][5]" class="md-radiobtn" value="Tidak Menjawab" checked="checked" style="display:none">
                                            </div>
                                           <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 5]) ?>
                                            
                                        </div>




                                    </div>
                                </div>
                            </div>

                           <div class="row">
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <p class="title_h7"><?php echo $soalan_6_temp; ?></p>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="md-radio-inline">
                                                <div class="md-radio">
                                                   
                                                    <input type="radio" id="radio32" name="AnswerTemp[jawapan][6]" class="md-radiobtn" value="1" >
                                                    
                                                    <label for="radio32">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    1 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio33" name="AnswerTemp[jawapan][6]" class="md-radiobtn" value="2" >

                                                    <label for="radio33">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    2 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio34" name="AnswerTemp[jawapan][6]" class="md-radiobtn" value="3" >

                                                    <label for="radio34">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    3 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio35" name="AnswerTemp[jawapan][6]" class="md-radiobtn" value="4" >

                                                    <label for="radio35">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    4 </label>
                                                </div>
                                                <input type="radio" name="AnswerTemp[jawapan][6]" class="md-radiobtn" value="Tidak Menjawab" checked="checked" style="display:none">
                                            </div>
                                           <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 6]) ?>
                                            
                                        </div>




                                    </div>
                                </div>
                            </div>

                           <div class="row">
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="col-md-6">
                                            <p class="title_h7"><?php echo $soalan_7_temp; ?></p>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="md-radio-inline">
                                                <div class="md-radio">
                                                   
                                                    <input type="radio" id="radio36" name="AnswerTemp[jawapan][7]" class="md-radiobtn" value="1" >
                                                    
                                                    <label for="radio36">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    1 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio37" name="AnswerTemp[jawapan][7]" class="md-radiobtn" value="2" >

                                                    <label for="radio37">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    2 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio38" name="AnswerTemp[jawapan][7]" class="md-radiobtn" value="3" >

                                                    <label for="radio38">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    3 </label>
                                                </div>
                                                <div class="md-radio">
                                                    
                                                    <input type="radio" id="radio39" name="AnswerTemp[jawapan][7]" class="md-radiobtn" value="4" >

                                                    <label for="radio39">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                    4 </label>
                                                </div>
                                                <input type="radio" name="AnswerTemp[jawapan][7]" class="md-radiobtn" value="Tidak Menjawab" checked="checked" style="display:none">
                                            </div>
                                           <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 7]) ?>
                                            
                                        </div>




                                    </div>
                                </div>
                            </div>




                        </div>


                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="col-md-6">
                                        <p class="title_h5"><?php echo $soalan_8_temp; ?></p>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                               
                                                <input type="radio" id="radio40" name="AnswerTemp[jawapan][8]" class="md-radiobtn" value="1" >
                                                
                                                <label for="radio40">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                1 </label>
                                            </div>
                                            <div class="md-radio">
                                                
                                                <input type="radio" id="radio41" name="AnswerTemp[jawapan][8]" class="md-radiobtn" value="2" >

                                                <label for="radio41">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                2 </label>
                                            </div>
                                            <div class="md-radio">
                                                
                                                <input type="radio" id="radio42" name="AnswerTemp[jawapan][8]" class="md-radiobtn" value="3" >

                                                <label for="radio42">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                3 </label>
                                            </div>
                                            <div class="md-radio">
                                                
                                                <input type="radio" id="radio43" name="AnswerTemp[jawapan][8]" class="md-radiobtn" value="4" >

                                                <label for="radio43">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                4 </label>
                                            </div>
                                            <input type="radio" name="AnswerTemp[jawapan][8]" class="md-radiobtn" value="Tidak Menjawab" checked="checked" style="display:none">
                                        </div>
                                       <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 8]) ?>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>

                       <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="soalan" >
                                        <div class="col-md-6">
                                            <p class="title_h8"><?php echo $soalan_9_temp; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer_temp, 'jawapan[9]',
                                                 [
                                                    'Tidak Menjawab' => '--Sila Pilih--',
                                                    'Sangat Tidak Sokong' => 'Sangat Tidak Sokong',
                                                    'Tidak Sokong' => 'Tidak Sokong',
                                                    'Sokong' => 'Sokong',
                                                    'Sangat Sokong' => 'Sangat Sokong',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 9]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="soalan" >
                                        <div class="col-md-6">
                                            <p class="title_h8"><?php echo $soalan_10_temp; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer_temp, 'jawapan[10]',
                                                 [
                                                    'Tidak Menjawab' => '--Sila Pilih--',
                                                    'Sangat Tidak Berkesan' => 'Sangat Tidak Berkesan',
                                                    'Tidak Berkesan' => 'Tidak Berkesan',
                                                    'Berkesan' => 'Berkesan',
                                                    'Sangat Berkesan' => 'Sangat Berkesan',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 10]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="soalan" >
                                        <div class="col-md-6">
                                            <p class="title_h8"><?php echo $soalan_11_temp; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer_temp, 'jawapan[11]',
                                                 [
                                                    'Tidak Menjawab' => '--Sila Pilih--',
                                                    'Sangat Tidak Suka' => 'Sangat Tidak Suka',
                                                    'Tidak Suka' => 'Tidak Suka',
                                                    'Suka' => 'Suka',
                                                    'Sangat Suka' => 'Sangat Suka',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 11]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="soalan" >
                                        <div class="col-md-6">
                                            <p class="title_h8"><?php echo $soalan_12_temp; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer_temp, 'jawapan[12]',
                                                 [
                                                    'Tidak Menjawab' => '--Sila Pilih--',
                                                    'Sangat Tidak Setuju' => 'Sangat Tidak Setuju',
                                                    'Tidak Setuju' => 'Tidak Setuju',
                                                    'Setuju' => 'Setuju',
                                                    'Sangat Setuju' => 'Sangat Setuju',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 12]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="soalan" >
                                        <div class="col-md-6">
                                            <p class="title_h8"><?php echo $soalan_13_temp; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer_temp, 'jawapan[13]',
                                                 [
                                                    'Tidak Menjawab' => '--Sila Pilih--',
                                                    'Sangat Tidak Setuju' => 'Sangat Tidak Setuju',
                                                    'Tidak Setuju' => 'Tidak Setuju',
                                                    'Setuju' => 'Setuju',
                                                    'Sangat Setuju' => 'Sangat Setuju',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 13]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="soalan" >
                                        <div class="col-md-6">
                                            <p class="title_h8"><?php echo $soalan_14_temp; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer_temp, 'jawapan[14]',
                                                 [
                                                    'Tidak Menjawab' => '--Sila Pilih--',
                                                    'Sangat Tidak Berminat' => 'Sangat Tidak Berminat',
                                                    'Tidak Berminat' => 'Tidak Berminat',
                                                    'Berminat' => 'Berminat',
                                                    'Sangat Berminat' => 'Sangat Berminat',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 14]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="soalan" >
                                        <div class="col-md-6">
                                            <p class="title_h8"><?php echo $soalan_15_temp; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer_temp, 'jawapan[15]',
                                                 [
                                                    'Tidak Menjawab' => '--Sila Pilih--',
                                                    'Sangat Tidak Penting' => 'Sangat Tidak Penting',
                                                    'Tidak Penting' => 'Tidak Penting',
                                                    'Penting' => 'Penting',
                                                    'Sangat Penting' => 'Sangat Penting',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 15]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="soalan" >
                                        <div class="col-md-6">
                                            <p class="title_h8"><?php echo $soalan_16_temp; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer_temp, 'jawapan[16]',
                                                 [
                                                    'Tidak Menjawab' => '--Sila Pilih--',
                                                    'Sangat Tidak Penting' => 'Sangat Tidak Penting',
                                                    'Tidak Penting' => 'Tidak Penting',
                                                    'Penting' => 'Penting',
                                                    'Sangat Penting' => 'Sangat Penting',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 16]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="soalan" >
                                        <div class="col-md-6">
                                            <p class="title_h8"><?php echo $soalan_17_temp; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer_temp, 'jawapan[17]',
                                                 [
                                                    'Tidak Menjawab' => '--Sila Pilih--',
                                                    'Sangat Tidak Sokong' => 'Sangat Tidak Sokong',
                                                    'Tidak Sokong' => 'Tidak Sokong',
                                                    'Sokong' => 'Sokong',
                                                    'Sangat Sokong' => 'Sangat Sokong',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 17]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="soalan" >
                                        <div class="col-md-6">
                                            <p class="title_h8"><?php echo $soalan_18_temp; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer_temp, 'jawapan[18]',
                                                 [
                                                    'Tidak Menjawab' => '--Sila Pilih--',
                                                    'Sangat Tidak Setuju' => 'Sangat Tidak Setuju',
                                                    'Tidak Setuju' => 'Tidak Setuju',
                                                    'Setuju' => 'Setuju',
                                                    'Sangat Setuju' => 'Sangat Setuju',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer_temp, 'question_temp_id', ['value' => 18]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                    </div>



                    <div class="not_sarawak">
                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="col-md-6">
                                        <p class="title_h5"><?php echo $soalan_1; ?></p>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                               
                                                <input type="radio" id="radio1" name="Answer[answer][1]" class="md-radiobtn" value="Ya" >
                                                
                                                <label for="radio1">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Ya </label>
                                            </div>
                                           <div class="md-radio">
                                                
                                                <input type="radio" id="radio2" name="Answer[answer][1]" class="md-radiobtn" value="Tidak" checked="checked">

                                                <label for="radio2">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Tidak </label>
                                            </div>
                           
                                        </div>
                                       <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 1]) ?>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>

                       <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="soalan" style="display:none;">
                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_2; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[2]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 2]) ?>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_3; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[3]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                 <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 3]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_4; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[4]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                 <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 4]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_5; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[5]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                 <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 5]) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_6; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[6]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                 <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 6]) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_7; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[7]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                 <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 7]) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_8; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[8]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                 <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 8]) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_9; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[9]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                 <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 9]) ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                       <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="col-md-6">
                                        <p class="title_h5"><?php echo $soalan_10; ?></p>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                               
                                                <input type="radio" id="radio3" name="Answer[answer][10]" class="md-radiobtn" value="Ya" >
                                                
                                                <label for="radio3">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Ya </label>
                                            </div>
                                           <div class="md-radio">
                                                
                                                <input type="radio" id="radio4" name="Answer[answer][10]" class="md-radiobtn" value="Tidak" checked="checked">

                                                <label for="radio4">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Tidak </label>
                                            </div>
                           
                                        </div>
                                       <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 10]) ?>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>

                       <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="soalan2" style="display:none;">
                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_11; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[11]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 11]) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_12; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[12]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 12]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_13; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[13]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 13]) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_14; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[14]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 14]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_15; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[15]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 15]) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_16; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[16]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 16]) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_17; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[17]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 17]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="col-md-6">
                                        <p class="title_h5"><?php echo $soalan_18; ?></p>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                               
                                                <input type="radio" id="radio5" name="Answer[answer][18]" class="md-radiobtn" value="Ya" >
                                                
                                                <label for="radio5">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Ya </label>
                                            </div>
                                           <div class="md-radio">
                                                
                                                <input type="radio" id="radio6" name="Answer[answer][18]" class="md-radiobtn" value="Tidak" checked="checked">

                                                <label for="radio6">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Tidak </label>
                                            </div>
                           
                                        </div>
                                       <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 18]) ?>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="col-md-6">
                                        <p class="title_h5"><?php echo $soalan_19; ?></p>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                               
                                                <input type="radio" id="radio7" name="Answer[answer][19]" class="md-radiobtn" value="Ya" >
                                                
                                                <label for="radio7">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Ya </label>
                                            </div>
                                           <div class="md-radio">
                                                
                                                <input type="radio" id="radio8" name="Answer[answer][19]" class="md-radiobtn" value="Tidak" checked="checked">

                                                <label for="radio8">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Tidak </label>
                                            </div>
                           
                                        </div>
                                       <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 19]) ?>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="col-md-6">
                                        <p class="title_h5"><?php echo $soalan_20; ?></p>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                               
                                                <input type="radio" id="radio9" name="Answer[answer][20]" class="md-radiobtn" value="Ya" >
                                                
                                                <label for="radio9">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Ya </label>
                                            </div>
                                           <div class="md-radio">
                                                
                                                <input type="radio" id="radio10" name="Answer[answer][20]" class="md-radiobtn" value="Tidak" checked="checked">

                                                <label for="radio10">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Tidak </label>
                                            </div>
                           
                                        </div>
                                       <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 20]) ?>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">

                                    <div class="soalan3" style="display:none;">

                                        <div class="col-md-6">
                                            <div class="col-md-4">
                                            <b>A) ICT</b>
                                            </div>
                                            <p class="title_h6"><?php echo $soalan_21; ?></p>
                                        </div>
    
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[21]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 21]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_22; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[22]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 22]) ?>
                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_23; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[23]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 23]) ?>
                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_24; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[24]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 24]) ?>
                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_25; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[25]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 25]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="col-md-4">
                                            <b>B) KESIHATAN</b>
                                            </div>
                                            <p class="title_h6"><?php echo $soalan_26; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[26]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 26]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_27; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[27]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 27]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_28; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[28]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 28]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_29; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[29]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 29]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_30; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[30]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 30]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="col-md-4">
                                            <b>C) PENDIDIKAN</b>
                                            </div>
                                            <p class="title_h6"><?php echo $soalan_31; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[31]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 31]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_32; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[32]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 32]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_33; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[33]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 33]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_34; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[34]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 34]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_35; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[35]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 35]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_36; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[36]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 36]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_37; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[37]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 37]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="col-md-4">
                                            <b>D) KEUSAHAWANAN</b>
                                            </div>
                                            <p class="title_h6"><?php echo $soalan_38; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[38]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 38]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_39; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[39]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 39]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_40; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[40]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 40]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_41; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[41]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 41]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_42; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[42]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 42]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_43; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[43]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 43]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_44; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[44]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 44]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="col-md-4">
                                            <b>E) RIADAH/REKREASI</b>
                                            </div>
                                            <p class="title_h6"><?php echo $soalan_45; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[45]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 45]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_46; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[46]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 46]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_47; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[47]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 47]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_48; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[48]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 48]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_49; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[49]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 49]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_50; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[50]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 50]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_51; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[51]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 51]) ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="title_h6"><?php echo $soalan_52; ?></p>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_answer, 'answer[52]',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <?= Html::activeHiddenInput($model_answer, 'question_id', ['value' => 52]) ?>
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
                                            <?= Html::activeTextArea($model,'ruang_cadangan',['class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'ruang_cadangan'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'ruang_cadangan'); ?></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                 
                    </div>
                    <div class="tab-pane" id="tab5">
                            <div class="caption font-green-haze">
                                <span class="caption-subject bold uppercase"> Maklumat Tanggungan OKU</span>
                            </div>
                            <br>
                            <div id="pulsate-regular" style="padding:5px;">
                                <span class="hint">* Ruangan ini hanya diisi oleh (OKU) yang berumur 17 tahun ke bawah sahaja.</span>
                            </div>
                            <div class="row">
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <p class="title_h4">Adakah Tanggungan anda tergolong dalam Orang Kelainan Upaya (OKU) ? <span class="required">*</span></p>


                                            <div class="col-md-12">
                                                <div class="md-radio-inline">
                                                    <div class="md-radio">
                                                       
                                                            <input type="radio" id="radio11" name="People[tanggungan_oku]" class="md-radiobtn" value="Ya">
                                                        
                                                        <label for="radio11">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                   <div class="md-radio">
                                                        
                                                            <input type="radio" id="radio12" name="People[tanggungan_oku]" class="md-radiobtn" value="Tidak" checked="checked">

                                                        <label for="radio12">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Tidak </label>
                                                    </div>
                                   
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                         <div class="adddivokutanggungan" style="display:none;">   
                                <br>
                                <?= Html::a('Tambah',FALSE, ['id'=>'addmoreoku','class' => 'btn btn-success']) ?>
                                <br><br>
                            <div class="row" id="tanggugnan_oku" >

                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_tanggunganoku,'nama[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggunganoku,'nama'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggunganoku,'nama'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_tanggunganoku, 'umur[]', $umur, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggunganoku,'umur'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggunganoku,'umur'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_tanggunganoku, 'hubungan[]', $hubungan, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggunganoku,'hubungan'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggunganoku,'hubungan'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_tanggunganoku,'no_pendaftaran[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggunganoku,'no_pendaftaran'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggunganoku,'no_pendaftaran'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_tanggunganoku, 'kategori[]', $kategoriOku, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggunganoku,'kategori'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggunganoku,'kategori'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_tanggunganoku, 'tahap_pendidikan[]', $edu17, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggunganoku,'tahap_pendidikan'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggunganoku,'tahap_pendidikan'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_tanggunganoku,'nama_sekolah[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggunganoku,'nama_sekolah'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggunganoku,'nama_sekolah'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextArea($model_tanggunganoku,'nota[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_tanggunganoku,'nota'); ?></label>
                                                <span class="help-block"><?= Html::error($model_tanggunganoku,'nota'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-1" id="deltanggunganoku"  style="display:none;">
                                            <div class="form-group form-md-line-input">
                                                <input type="button" id="removetanggunganoku" class="btn red-sunglo"  value="Buang">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <hr class="hroku" style="display:none;">
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