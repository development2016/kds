<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
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
use common\models\LookupEduLevel;
use common\models\LookupBahagian;
use common\models\LookupMukim;

$agama = ArrayHelper::map(LookupAgama::find()->asArray()->all(), 'id', 'agama');
$bangsa = ArrayHelper::map(LookupBangsa::find()->asArray()->all(), 'id', 'bangsa');
$perkahwinan = ArrayHelper::map(LookupPerkahwinan::find()->asArray()->all(), 'id', 'status_perkahwinan');
$citizen = array('Warganegara'=>'Warganegara','Bukan Warganegara'=>'Bukan Warganegara','Penduduk Tetap'=>'Penduduk Tetap');

//$negara = ArrayHelper::map(LookupCountry::find()->asArray()->all(), 'country_id', 'country');
$state = ArrayHelper::map(LookupState::find()->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');

$kampung = ArrayHelper::map(LookupKampung::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'kampung_id','kampung');
$income = ArrayHelper::map(LookupIncome::find()->asArray()->all(), 'id', 'income');

/*$negara_area = ArrayHelper::map(LookupCountry::find()->asArray()->all(), 'country_id', 'country');
$state_area = ArrayHelper::map(LookupState::find()->asArray()->all(), 'state_id', 'state');
$district_area = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_area_id])->asArray()->all(), 'district_id', 'district');
$subbase_area = ArrayHelper::map(LookupSubBase::find()->where(['district_id'=>$model->district_area_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster_area = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_area_id])->asArray()->all(),'cluster_id','cluster');
$kampung_area = ArrayHelper::map(LookupKampung::find()->where(['cluster_id'=>$model->cluster_area_id])->asArray()->all(),'kampung_id','kampung');
*/
$state_area = ArrayHelper::map(LookupState::find()->asArray()->all(), 'state_id', 'state');
$district_area = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_area_id])->asArray()->all(), 'district_id', 'district');
$subbase_area = ArrayHelper::map(LookupSubBase::find()->where(['district_id'=>$model->district_area_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster_area = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_area_id])->asArray()->all(),'cluster_id','cluster');
$kampung_area = ArrayHelper::map(LookupKampung::find()->where(['cluster_id'=>$model->cluster_area_id])->asArray()->all(),'kampung_id','kampung');
$mukim = ArrayHelper::map(LookupMukim::find()->where(['district_id'=>$model->district_area_id])->asArray()->all(),'mukim_id','mukim');
$bahagian = ArrayHelper::map(LookupBahagian::find()->where(['state_id'=>$model->state_area_id])->asArray()->all(), 'bahagian_id', 'bahagian');

$status = array('Microworker Train'=>'Microworker Train','Microworker Train & Task'=>'Microworker Train & Task');
$edu = ArrayHelper::map(LookupEduLevel::find()->asArray()->all(), 'id', 'edu_level');
$bank = ArrayHelper::map(LookupBank::find()->asArray()->all(), 'id', 'bank');

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
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
                        <i class="fa fa-check"></i> Peribadi </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab" class="step">
                        <span class="number">
                        2 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Tugasan </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab3" data-toggle="tab" class="step">
                        <span class="number">
                        3 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Akademik </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab4" data-toggle="tab" class="step">
                        <span class="number">
                        4 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Pengalaman </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab5" data-toggle="tab" class="step">
                        <span class="number">
                        5 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Bahasa/Kemahiran </span>
                        </a>
                    </li>
                    <li>
                        <a href="#tab6" data-toggle="tab" class="step">
                        <span class="number">
                        6 </span>
                        <span class="desc">
                        <i class="fa fa-check"></i> Minat </span>
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
                        <?=$form->errorSummary($model,['id'=>'error-signup']);?>
                        <div class="caption font-green-haze">
                            <span class="caption-subject bold uppercase"> Maklumat Responden</span>
                        </div>
                        <br>
                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">

                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeTextInput($model,'nama',['class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'nama'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'nama'); ?></span>
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
                                            <?= Html::activeTextInput($model,'ic_no',['class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'ic_no'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'ic_no'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeTextInput($model,'ic_no_old',['class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'ic_no_old'); ?> </label>
                                            <span class="help-block"><?= Html::error($model,'ic_no_old'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeTextInput($model,'tarikh_lahir',['class'=>'form-control date-picker' ,'data-date-format'=>'dd/mm/yyyy']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_lahir'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'tarikh_lahir'); ?></span>
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
                                            <?= Html::activeTextArea($model,'tempat_lahir',['class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'tempat_lahir'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'tempat_lahir'); ?></span>
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
                                            <?= Html::activeDropDownList($model, 'bank', $bank, 
                                            [
                                                'prompt'=>'(Sila Pilih)',
                                                'class'=>'form-control',

                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'bank'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'bank'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeTextInput($model,'no_akaun',['class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'no_akaun'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'no_akaun'); ?></span>
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
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeDropDownList($model, 'agama', $agama, 
                                            [
                                                'prompt'=>'(Sila Pilih)',
                                                'class'=>'form-control',

                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'agama'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'agama'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeDropDownList($model, 'bangsa', $bangsa, 
                                            [
                                                'prompt'=>'(Sila Pilih)',
                                                'class'=>'form-control',

                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'bangsa'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'bangsa'); ?></span>
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
                                            <?= Html::activeDropDownList($model, 'status_perkahwinan', $perkahwinan, 
                                             [
                                                'prompt'=>'(Sila Pilih)',
                                                'class'=>'form-control',
                                             ], 
                                             ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'status_perkahwinan'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'status_perkahwinan'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeDropDownList($model, 'kewarganegaraan', $citizen, 
                                            [
                                                'prompt'=>'(Sila Pilih)',
                                                'class'=>'form-control',

                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'kewarganegaraan'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'kewarganegaraan'); ?></span>
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
                                            <?= Html::activeTextInput($model,'poskod',['class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'poskod'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'poskod'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeTextInput($model,'mukim',['class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'mukim'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'mukim'); ?></span>
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
                                            'prompt'=>'(Sila Pilih)',
                                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#daerah" ).html( data );});',

                                            'class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeDropDownList($model, 'district_id', $district, 
                                            [
                                            'prompt'=>'','id'=>'daerah',
                                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung" ).html( data );});',

                                            'class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> </label>
                                            <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeDropDownList($model, 'kampung_id', $kampung, 
                                            [
                                                'prompt'=>'','id'=>'kampung',
                                                'class'=>'form-control',

                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?> </label>
                                            <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
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
                                            <?= Html::activeTextInput($model,'mobile_no',['class'=>'form-control','id'=>'mask_mobile']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'mobile_no'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'mobile_no'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeTextInput($model,'home_no',['class'=>'form-control','id'=>'mask_home']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'home_no'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'home_no'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeTextInput($model,'no_tel_pej',['class'=>'form-control','id'=>'mask_pjb']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'no_tel_pej'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'no_tel_pej'); ?></span>
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

                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeTextInput($model,'pekerjaan',['class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'pekerjaan'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'pekerjaan'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeTextInput($model,'jawatan',['class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'jawatan'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'jawatan'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeDropDownList($model, 'pendapatan', $income, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'pendapatan'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'pendapatan'); ?></span>
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
                                            <?= Html::activeTextInput($model,'username',['class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'username'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'username'); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activePasswordInput($model,'password_hash',['class'=>'form-control','id'=>'password_hash_signup']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'password_hash'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'password_hash'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  



                    </div>
                    <div class="tab-pane" id="tab2">
                        <div class="caption font-green-haze">
                            <span class="caption-subject bold uppercase"> Maklumat Tugasan (Kawasan Kerja)</span>
                        </div>
                        <br>
                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">

                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeDropDownList($model, 'state_area_id', $state_area, 
                                                [
                                                    'prompt'=>'(Sila Pilih)','id'=>'state_mikroworker',
                                                    'onchange'=>
                                                    'JS: var id = (this.value);
                                                    if (id == 21) {
                                                        $.post( "'.Yii::$app->urlManager->createUrl(['user/listbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#bahagian " ).html( data );});
                                                    }
                                                    else if(id == 22){
                                                        $.post( "'.Yii::$app->urlManager->createUrl(['user/listdistrictarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#johordistrict " ).html( data );});
                                                    } else {
                                                        $.post( "'.Yii::$app->urlManager->createUrl(['user/listdistrictarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district " ).html( data );});
                                                    };',
                                                        /*'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});*',*/

                                                    'class'=>'form-control state_drilldown']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'state_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'state_area_id'); ?></span>
                                        </div>
                                    </div>
                                    <div style="display:none;" class="johor_mikro"> <!-- Johor SECTION -->
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'district_area_id', $district_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listmukim','id'=>'']).'"+$(this).val(), function( data ) {$( "select#mukim_johor" ).html( data );});',
                                                        'prompt'=>'','id'=>'johordistrict',
                               
                                                        'class'=>'form-control']); ?>
                                                        <label for="form_control_1"><?= Html::activeLabel($model,'district_area_id'); ?> <span class="required">*</span></label>
                                                        <span class="help-block"><?= Html::error($model,'district_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'mukim_id', $mukim, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listjohorsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbasejohor" ).html( data );});',
                                                        'prompt'=>'','id'=>'mukim_johor',
                                                        'class'=>'form-control',

                                                    ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'mukim_id'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'mukim_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'sub_base_area_id', $subbase_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listclusterarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#clusterjohor" ).html( data );});',
                                                        'prompt'=>'','id'=>'subbasejohor',   
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_area_id'); ?> </label>
                                                    <span class="help-block"><?= Html::error($model,'sub_base_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'cluster_area_id', $cluster_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listkampungarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampungjohor" ).html( data );});',
                                                        'prompt'=>'','id'=>'clusterjohor',   
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'cluster_area_id'); ?> </label>
                                                    <span class="help-block"><?= Html::error($model,'cluster_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'kampung_area_id', $kampung_area, 
                                                    [
                                                        'prompt'=>'','id'=>'kampungjohor',
                                                        'class'=>'form-control',

                                                    ]); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'kampung_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'kampung_area_id'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display:none;" class="sarawak_mikro"> <!-- SARAWAK SECTION -->
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'bahagian_id', $bahagian, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listdistrictbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district_bahagian" ).html( data );});',
                                                        'prompt'=>'','id'=>'bahagian',   
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'bahagian_id'); ?> </label>
                                                    <span class="help-block"><?= Html::error($model,'bahagian_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'district_area_id', $district_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listsubbasearea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbasesarawak" ).html( data );});',
                                                        'prompt'=>'','id'=>'district_bahagian',   
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'district_area_id'); ?> </label>
                                                    <span class="help-block"><?= Html::error($model,'district_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'sub_base_area_id', $subbase_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listclusterarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#clustersarawak" ).html( data );});',
                                                        'prompt'=>'','id'=>'subbasesarawak',   
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_area_id'); ?> </label>
                                                    <span class="help-block"><?= Html::error($model,'sub_base_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'cluster_area_id', $cluster_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listkampungarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampungsarawak" ).html( data );});',
                                                        'prompt'=>'','id'=>'clustersarawak',   
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'cluster_area_id'); ?> </label>
                                                    <span class="help-block"><?= Html::error($model,'cluster_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'kampung_area_id', $kampung_area, 
                                                    [
                                                        'prompt'=>'','id'=>'kampungsarawak',
                                                        'class'=>'form-control',

                                                    ]); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'kampung_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'kampung_area_id'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display:none;" class="other_state_mikro"> <!-- Other State SECTION -->
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'district_area_id', $district_area, 
                                                    [
                                                        'prompt'=>'','id'=>'district',
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listsubbasearea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase_other" ).html( data );});',
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'district_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'district_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'sub_base_area_id', $subbase_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listclusterarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster_other" ).html( data );});',
                                                        'prompt'=>'','id'=>'subbase_other',
                                                        'class'=>'form-control',
                                                    ]); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'sub_base_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'cluster_area_id', $cluster_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listkampungarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung_other" ).html( data );});',
                                                        'prompt'=>'','id'=>'cluster_other',
                                                        'class'=>'form-control',
                                                    ]); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'cluster_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'cluster_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'kampung_area_id', $kampung_area, 
                                                    [
                                                        'prompt'=>'','id'=>'kampung_other',
                                                        'class'=>'form-control',
                                                    ]); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'kampung_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'kampung_area_id'); ?></span>
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
                                           <?= Html::activeDropDownList($model, 'status_area', $status, 
                                            [
                                                'prompt'=>'(Sila Pilih)',
                                                'class'=>'form-control',

                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'status_area'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'status_area'); ?></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="tab3">
                        <div class="caption font-green-haze">
                            <span class="caption-subject bold uppercase"> Maklumat Akademik</span>
                        </div>
                        <br>
                        <?= Html::a('Tambah',FALSE, ['id'=>'addmoreakademik','class' => 'btn btn-success']) ?>
                        <br><br>

                        <div class="addakademik">
                            <div class="row" id="akademik">
                                <div class="portlet-body form">
                                    <div class="form-body">

                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model_akademik, 'tahap_pendidikan[]', $edu, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                              
                                                <label for="form_control_1"><?= Html::activeLabel($model_akademik,'tahap_pendidikan'); ?></label>
                                                <span class="help-block"><?= Html::error($model_akademik,'tahap_pendidikan'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_akademik,'sijil[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_akademik,'sijil'); ?></label>
                                                <span class="help-block"><?= Html::error($model_akademik,'sijil'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-5">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_akademik,'nama_institusi[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_akademik,'nama_institusi'); ?></label>
                                                <span class="help-block"><?= Html::error($model_akademik,'nama_institusi'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_akademik,'bidang_pengkhususan[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_akademik,'bidang_pengkhususan'); ?></label>
                                                <span class="help-block"><?= Html::error($model_akademik,'bidang_pengkhususan'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_akademik,'gred_keseluruhan[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_akademik,'gred_keseluruhan'); ?></label>
                                                <span class="help-block"><?= Html::error($model_akademik,'gred_keseluruhan'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_akademik,'tarikh_anugerah[]',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_akademik,'tarikh_anugerah'); ?></label>
                                                <span class="help-block"><?= Html::error($model_akademik,'tarikh_anugerah'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-1" id="delaka"  style="display:none;">
                                            <div class="form-group form-md-line-input">
                                                <input type="button" id="remove" class="btn red-sunglo"  value="Buang">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <hr class="hrakademik" style="display:none;">
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="tab-pane" id="tab4">
                        <div class="caption font-green-haze">
                            <span class="caption-subject bold uppercase"> Maklumat Pengalaman Keja</span>
                        </div>
                        <br>

                        <?= Html::a('Tambah',FALSE, ['id'=>'addmorepengalaman','class' => 'btn btn-success']) ?>
                        <br><br>

                        <div class="addpengalaman">
                            <div class="row" id="pengalaman">
                                <div class="portlet-body form">
                                    <div class="form-body">

                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_pengalaman,'nama_organisasi[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_pengalaman,'nama_organisasi'); ?></label>
                                                <span class="help-block"><?= Html::error($model_pengalaman,'nama_organisasi'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_pengalaman,'jawatan[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_pengalaman,'jawatan'); ?></label>
                                                <span class="help-block"><?= Html::error($model_pengalaman,'jawatan'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_pengalaman,'bidang[]',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_pengalaman,'bidang'); ?></label>
                                                <span class="help-block"><?= Html::error($model_pengalaman,'bidang'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_pengalaman,'tarikh_mula[]',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_pengalaman,'tarikh_mula'); ?></label>
                                                <span class="help-block"><?= Html::error($model_pengalaman,'tarikh_mula'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model_pengalaman,'tarikh_tamat[]',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model_pengalaman,'tarikh_tamat'); ?></label>
                                                <span class="help-block"><?= Html::error($model_pengalaman,'tarikh_tamat'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-1" id="delpengalaman"  style="display:none;">
                                            <div class="form-group form-md-line-input">
                                                <input type="button" id="remove" class="btn red-sunglo"  value="Buang">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <hr class="hrpengalaman" style="display:none;">
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="tab-pane" id="tab5">
                        <div class="caption font-green-haze">
                            <span class="caption-subject bold uppercase"> Maklumat Bahasa/Kemahiran</span>
                        </div>
                        <br>

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

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input">
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_bahasa,'bahasa_melayu_menulis'); ?></label>

                                                <div class="col-md-4">
                                                    <div class="md-radio-inline">
                                                        <div class="md-radio">
                                                            <input type="radio" id="radio53" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="1">
                                                            <label for="radio53">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span>
                                                            1 </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="radio54" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="2">
                                                            <label for="radio54">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span>
                                                            2 </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="radio55" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="3">
                                                            <label for="radio55">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span>
                                                            3 </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="radio56" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="4">
                                                            <label for="radio56">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span>
                                                            4 </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="radio57" name="UserBahasa[bahasa_melayu_menulis]" class="md-radiobtn" value="5">
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
                                                            <input type="radio" id="radio58" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="1">
                                                            <label for="radio58">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span>
                                                            1 </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="radio59" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="2">
                                                            <label for="radio59">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span>
                                                            2 </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="radio60" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="3">
                                                            <label for="radio60">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span>
                                                            3 </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="radio61" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="4">
                                                            <label for="radio61">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span>
                                                            4 </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="radio62" name="UserBahasa[bahasa_melayu_lisan]" class="md-radiobtn" value="5">
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
                         <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">                                   
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_bahasa,'bahasa_inggeris_menulis'); ?></label>

                                    <div class="col-md-4">
                                        <div class="md-radio-inline">
                                            <div class="md-radio">
                                                <input type="radio" id="radio63" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="1">
                                                <label for="radio63">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                1 </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="radio64" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="2">
                                                <label for="radio64">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                2 </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="radio65" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="3">
                                                <label for="radio65">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                3 </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="radio66" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="4">
                                                <label for="radio66">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                4 </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="radio67" name="UserBahasa[bahasa_inggeris_menulis]" class="md-radiobtn" value="5">
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
                                                <input type="radio" id="radio68" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="1">
                                                <label for="radio68">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                1 </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="radio69" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="2">
                                                <label for="radio69">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                2 </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="radio70" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="3">
                                                <label for="radio70">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                3 </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="radio71" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="4">
                                                <label for="radio71">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                4 </label>
                                            </div>
                                            <div class="md-radio">
                                                <input type="radio" id="radio72" name="UserBahasa[bahasa_inggeris_lisan]" class="md-radiobtn" value="5">
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
                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_bahasa,'lain_lain'); ?></label>
                                <div class="col-md-2">
                                    <?= Html::activeTextInput($model_bahasa,'lain_lain',['class'=>'form-control']); ?>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio73" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="1">
                                            <label for="radio73">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio74" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="2">
                                            <label for="radio74">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio75" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="3">
                                            <label for="radio75">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio76" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="4">
                                            <label for="radio76">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio77" name="UserBahasa[lain_lain_menulis]" class="md-radiobtn" value="5">
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
                                            <input type="radio" id="radio78" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="1">
                                            <label for="radio78">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio79" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="2">
                                            <label for="radio79">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio80" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="3">
                                            <label for="radio80">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio81" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="4">
                                            <label for="radio81">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio82" name="UserBahasa[lain_lain_lisan]" class="md-radiobtn" value="5">
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
                                <label class="col-md-8 control-label" for="form_control_1"><b>Petunjuk : </b> <b>1</b> - Mahir  <b>2</b> - Kurang Mahir <b>3</b> - Sederhana <b>4</b> - Lemah <b>5</b> - Sangat lemah</label>
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
                                <label class="col-md-4 control-label" for="form_control_1"></label>
                                <div class="col-md-3">
                                   
                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-2">
                                    Tahap Pencapaian
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
                                <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'word'); ?></label>

                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio83" name="UserKemahiran[word]" class="md-radiobtn" value="1">
                                            <label for="radio83">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio84" name="UserKemahiran[word]" class="md-radiobtn" value="2">
                                            <label for="radio84">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio85" name="UserKemahiran[word]" class="md-radiobtn" value="3">
                                            <label for="radio85">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio86" name="UserKemahiran[word]" class="md-radiobtn" value="4">
                                            <label for="radio86">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio87" name="UserKemahiran[word]" class="md-radiobtn" value="5">
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
                                                <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'excel'); ?></label>

                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio88" name="UserKemahiran[excel]" class="md-radiobtn" value="1">
                                            <label for="radio88">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio89" name="UserKemahiran[excel]" class="md-radiobtn" value="2">
                                            <label for="radio89">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio90" name="UserKemahiran[excel]" class="md-radiobtn" value="3">
                                            <label for="radio90">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio91" name="UserKemahiran[excel]" class="md-radiobtn" value="4">
                                            <label for="radio91">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio92" name="UserKemahiran[excel]" class="md-radiobtn" value="5">
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
                                                <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">

                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'power_point'); ?></label>

                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio93" name="UserKemahiran[power_point]" class="md-radiobtn" value="1">
                                            <label for="radio93">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio94" name="UserKemahiran[power_point]" class="md-radiobtn" value="2">
                                            <label for="radio94">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio95" name="UserKemahiran[power_point]" class="md-radiobtn" value="3">
                                            <label for="radio95">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio96" name="UserKemahiran[power_point]" class="md-radiobtn" value="4">
                                            <label for="radio96">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio97" name="UserKemahiran[power_point]" class="md-radiobtn" value="5">
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

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">

                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'menaip'); ?></label>
                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio98" name="UserKemahiran[menaip]" class="md-radiobtn" value="1">
                                            <label for="radio98">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio99" name="UserKemahiran[menaip]" class="md-radiobtn" value="2">
                                            <label for="radio99">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio100" name="UserKemahiran[menaip]" class="md-radiobtn" value="3">
                                            <label for="radio100">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio101" name="UserKemahiran[menaip]" class="md-radiobtn" value="4">
                                            <label for="radio101">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio102" name="UserKemahiran[menaip]" class="md-radiobtn" value="5">
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

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'internet'); ?></label>
                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio103" name="UserKemahiran[internet]" class="md-radiobtn" value="1">
                                            <label for="radio103">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio104" name="UserKemahiran[internet]" class="md-radiobtn" value="2">
                                            <label for="radio104">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio105" name="UserKemahiran[internet]" class="md-radiobtn" value="3">
                                            <label for="radio105">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio106" name="UserKemahiran[internet]" class="md-radiobtn" value="4">
                                            <label for="radio106">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio107" name="UserKemahiran[internet]" class="md-radiobtn" value="5">
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

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'youtube'); ?></label>
                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio108" name="UserKemahiran[youtube]" class="md-radiobtn" value="1">
                                            <label for="radio108">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio109" name="UserKemahiran[youtube]" class="md-radiobtn" value="2">
                                            <label for="radio109">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio110" name="UserKemahiran[youtube]" class="md-radiobtn" value="3">
                                            <label for="radio110">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio111" name="UserKemahiran[youtube]" class="md-radiobtn" value="4">
                                            <label for="radio111">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio112" name="UserKemahiran[youtube]" class="md-radiobtn" value="5">
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

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">

                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'perbankan'); ?></label>
                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio113" name="UserKemahiran[perbankan]" class="md-radiobtn" value="1">
                                            <label for="radio113">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio114" name="UserKemahiran[perbankan]" class="md-radiobtn" value="2">
                                            <label for="radio114">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio115" name="UserKemahiran[perbankan]" class="md-radiobtn" value="3">
                                            <label for="radio115">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio116" name="UserKemahiran[perbankan]" class="md-radiobtn" value="4">
                                            <label for="radio116">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio117" name="UserKemahiran[perbankan]" class="md-radiobtn" value="5">
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

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'belian'); ?></label>
                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio118" name="UserKemahiran[belian]" class="md-radiobtn" value="1">
                                            <label for="radio118">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio119" name="UserKemahiran[belian]" class="md-radiobtn" value="2">
                                            <label for="radio119">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio120" name="UserKemahiran[belian]" class="md-radiobtn" value="3">
                                            <label for="radio120">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio121" name="UserKemahiran[belian]" class="md-radiobtn" value="4">
                                            <label for="radio121">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio122" name="UserKemahiran[belian]" class="md-radiobtn" value="5">
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

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-8 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'jualan'); ?></label>
                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio123" name="UserKemahiran[jualan]" class="md-radiobtn" value="1">
                                            <label for="radio123">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio124" name="UserKemahiran[jualan]" class="md-radiobtn" value="2">
                                            <label for="radio124">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio125" name="UserKemahiran[jualan]" class="md-radiobtn" value="3">
                                            <label for="radio125">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio126" name="UserKemahiran[jualan]" class="md-radiobtn" value="4">
                                            <label for="radio126">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio127" name="UserKemahiran[jualan]" class="md-radiobtn" value="5">
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

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">

                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-8 control-label" for="form_control_1"><b>Media Sosial :</b></label>
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
                                <div class="col-md-1">
                                </div>
                                <label class="col-md-7 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'facebook'); ?></label>
                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio128" name="UserKemahiran[facebook]" class="md-radiobtn" value="1">
                                            <label for="radio128">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio129" name="UserKemahiran[facebook]" class="md-radiobtn" value="2">
                                            <label for="radio129">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio130" name="UserKemahiran[facebook]" class="md-radiobtn" value="3">
                                            <label for="radio130">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio131" name="UserKemahiran[facebook]" class="md-radiobtn" value="4">
                                            <label for="radio131">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio132" name="UserKemahiran[facebook]" class="md-radiobtn" value="5">
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

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <div class="col-md-1">
                                </div>
                                <label class="col-md-7 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'twitter'); ?></label>
                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio133" name="UserKemahiran[twitter]" class="md-radiobtn" value="1">
                                            <label for="radio133">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio134" name="UserKemahiran[twitter]" class="md-radiobtn" value="2">
                                            <label for="radio134">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio135" name="UserKemahiran[twitter]" class="md-radiobtn" value="3">
                                            <label for="radio135">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio136" name="UserKemahiran[twitter]" class="md-radiobtn" value="4">
                                            <label for="radio136">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio137" name="UserKemahiran[twitter]" class="md-radiobtn" value="5">
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

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <div class="col-md-1">
                                </div>
                                <label class="col-md-7 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'instagram'); ?></label>
                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio138" name="UserKemahiran[instagram]" class="md-radiobtn" value="1">
                                            <label for="radio138">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio139" name="UserKemahiran[instagram]" class="md-radiobtn" value="2">
                                            <label for="radio139">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio140" name="UserKemahiran[instagram]" class="md-radiobtn" value="3">
                                            <label for="radio140">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio141" name="UserKemahiran[instagram]" class="md-radiobtn" value="4">
                                            <label for="radio141">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio142" name="UserKemahiran[instagram]" class="md-radiobtn" value="5">
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

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">

                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'lain_lain_nyatakan'); ?></label>
                                <div class="col-md-2">
                                    <?= Html::activeTextInput($model_kemahiran,'lain_lain_nyatakan',['class'=>'form-control']); ?>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                            <input type="radio" id="radio143" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="1">
                                            <label for="radio143">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            1 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio144" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="2">
                                            <label for="radio144">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            2 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio145" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="3">
                                            <label for="radio145">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            3 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio146" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="4">
                                            <label for="radio146">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            4 </label>
                                        </div>
                                        <div class="md-radio">
                                            <input type="radio" id="radio147" name="UserKemahiran[lain_lain]" class="md-radiobtn" value="5">
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

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">



                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-8 control-label" for="form_control_1"><b>Petunjuk : </b> <b>1</b> - Mahir  <b>2</b> - Kurang Mahir <b>3</b> - Sederhana <b>4</b> - Lemah <b>5</b> - Sangat lemah</label>
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
                                <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'perkakasan_ict'); ?></label>
                                <div class="col-md-6">
                                    <div class="md-checkbox-inline">
                                        <div class="md-checkbox">
                                            <input type="hidden" name="UserKemahiran[perkakasan_ict][1]" value="0">
                                            <input type="checkbox" id="checkbox6" name="UserKemahiran[perkakasan_ict][1]" class="md-check" value="PC">
                                            <label for="checkbox6">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            PC </label>
                                        </div>
                                        <div class="md-checkbox">
                                            <input type="hidden" name="UserKemahiran[perkakasan_ict][2]" value="0">
                                            <input type="checkbox" id="checkbox7" name="UserKemahiran[perkakasan_ict][2]" class="md-check" value="Komputer Riba">
                                            <label for="checkbox7">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            Komputer Riba </label>
                                        </div>
                                        <div class="md-checkbox">
                                            <input type="hidden" name="UserKemahiran[perkakasan_ict][3]" value="0">
                                            <input type="checkbox" id="checkbox8" name="UserKemahiran[perkakasan_ict][3]" class="md-check" value="Telefon Pintar">
                                            <label for="checkbox8">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            Telefon Pintar </label>
                                        </div>
                                        <div class="md-checkbox">
                                            <input type="hidden" name="UserKemahiran[perkakasan_ict][4]" value="0">
                                            <input type="checkbox" id="checkbox9" name="UserKemahiran[perkakasan_ict][4]" class="md-check" value="Tablet">
                                            <label for="checkbox9">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            Tablet </label>
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
                                <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_kemahiran,'lain_lain_1'); ?></label>
                                <div class="col-md-4">
                                    <?= Html::activeTextInput($model_kemahiran,'lain_lain_1',['class'=>'form-control']); ?>
                                </div>
                            </div>
                        </div>
                            </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="tab6">
                        <div class="caption font-green-haze">
                            <span class="caption-subject bold uppercase"> Maklumat Minat Dan Kecenderungan</span>
                        </div>
                        <br>

                        <div class="row">
                            <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="col-md-12">

                                        <div class="form-group form-md-line-input">
                                             <label for="form_control_1"><b>1.  Profesional Pengkomputeran</b></span></label>
                                             <br>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'pengatur_program_multimedia'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox10" name="UserMinat[pengatur_program_multimedia]" class="md-check" value="Ya">
                                                        <label for="checkbox10">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'pereka_laman_sesawang'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox11" name="UserMinat[pereka_laman_sesawang]" class="md-check" value="Ya">
                                                        <label for="checkbox11">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'pereka_grafik'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox12" name="UserMinat[pereka_grafik]" class="md-check" value="Ya">
                                                        <label for="checkbox12">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'pengaturcara_komputer'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox13" name="UserMinat[pengaturcara_komputer]" class="md-check" value="Ya">
                                                        <label for="checkbox13">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'pemaju_perisian'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox14" name="UserMinat[pemaju_perisian]" class="md-check" value="Ya">
                                                        <label for="checkbox14">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'lain_lain_1'); ?></label>
                                            <div class="col-md-4">
                                                <?= Html::activeTextInput($model_minat,'lain_lain_1',['class'=>'form-control']); ?>
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
                                             <label for="form_control_1"><b>2.  Perniagaan dan Keusahawanan</b></span></label>
                                             <br>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'pereka_bentuk_produk'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox15" name="UserMinat[pereka_bentuk_produk]" class="md-check" value="Ya">
                                                        <label for="checkbox15">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'penghias_dalaman'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox16" name="UserMinat[penghias_dalaman]" class="md-check" value="Ya">
                                                        <label for="checkbox16">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'tukang_masak'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox17" name="UserMinat[tukang_masak]" class="md-check" value="Ya">
                                                        <label for="checkbox17">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'andaman'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox18" name="UserMinat[andaman]" class="md-check" value="Ya">
                                                        <label for="checkbox18">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'jahitan'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox19" name="UserMinat[jahitan]" class="md-check" value="Ya">
                                                        <label for="checkbox19">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'lain_lain_2'); ?></label>
                                            <div class="col-md-4">
                                                <?= Html::activeTextInput($model_minat,'lain_lain_2',['class'=>'form-control']); ?>
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
                                             <label for="form_control_1"><b>3.  Pertanian</b></span></label>
                                             <br>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'landskap'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox20" name="UserMinat[landskap]" class="md-check" value="Ya">
                                                        <label for="checkbox20">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'pengusaha_hidroponik'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox21" name="UserMinat[pengusaha_hidroponik]" class="md-check" value="Ya">
                                                        <label for="checkbox21">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'akuakultur'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox22" name="UserMinat[akuakultur]" class="md-check" value="Ya">
                                                        <label for="checkbox22">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'penternak'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox23" name="UserMinat[penternak]" class="md-check" value="Ya">
                                                        <label for="checkbox23">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'penaman_hortikultur'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox24" name="UserMinat[penaman_hortikultur]" class="md-check" value="Ya">
                                                        <label for="checkbox24">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'lain_lain_3'); ?></label>
                                            <div class="col-md-4">
                                                <?= Html::activeTextInput($model_minat,'lain_lain_3',['class'=>'form-control']); ?>
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
                                             <label for="form_control_1"><b>4.  Perkhidmatan</b></span></label>
                                             <br>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'fasilitator'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox25" name="UserMinat[fasilitator]" class="md-check" value="Ya">
                                                        <label for="checkbox25">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'fotografer'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox26" name="UserMinat[fotografer]" class="md-check" value="Ya">
                                                        <label for="checkbox26">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'operator_kemasukan_data'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox27" name="UserMinat[operator_kemasukan_data]" class="md-check" value="Ya">
                                                        <label for="checkbox27">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'editor'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox28" name="UserMinat[editor]" class="md-check" value="Ya">
                                                        <label for="checkbox28">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'khidmat_sosial'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox29" name="UserMinat[khidmat_sosial]" class="md-check" value="Ya">
                                                        <label for="checkbox29">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'lain_lain_4'); ?></label>
                                            <div class="col-md-4">
                                                <?= Html::activeTextInput($model_minat,'lain_lain_4',['class'=>'form-control']); ?>
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
                                             <label for="form_control_1"><b>5.  Bidang Elektrik / Elektronik / Mekanikal</b></span></label>
                                             <br>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'pelukis_pelan'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox30" name="UserMinat[pelukis_pelan]" class="md-check" value="Ya">
                                                        <label for="checkbox30">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'automasi'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox31" name="UserMinat[automasi]" class="md-check" value="Ya">
                                                        <label for="checkbox31">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'mekanik'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox32" name="UserMinat[mekanik]" class="md-check" value="Ya">
                                                        <label for="checkbox32">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'pembaik_alat_elektrik'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox33" name="UserMinat[pembaik_alat_elektrik]" class="md-check" value="Ya">
                                                        <label for="checkbox33">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'penservis'); ?></label>
                                            <div class="col-md-2">
                                                <div class="md-checkbox-inline">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox34" name="UserMinat[penservis]" class="md-check" value="Ya">
                                                        <label for="checkbox34">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span>
                                                        Ya </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-2 control-label" id="inlineradio" for="form_control_1"><?= Html::activeLabel($model_minat,'lain_lain_5'); ?></label>
                                            <div class="col-md-4">
                                                <?= Html::activeTextInput($model_minat,'lain_lain_5',['class'=>'form-control']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="form_control_1"><b>PERAKUAN</b></span></label>
                                    <br>
                                    <br>
                                    <div class="md-checkbox">
                                            <input type="checkbox" id="checkbox_perakuan" class="md-check">
                                            <label for="checkbox_perakuan">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            Saya mengaku bahawa semua maklumat yang diberikan dalam dokumen ini adalah betul dan benar mengikut pengetahuan saya.Saya faham bahawa sebarang kenyataan yang palsu boleh menyebabkan data dan profil peribadi saya di dalam sistem ditolak untuk pengesahan. </label>
                                        </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'tarikh_daftar_kerja',['class'=>'form-control date-picker' ,'data-date-format'=>'dd/mm/yyyy']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_daftar_kerja'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'tarikh_daftar_kerja'); ?></span>
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
                <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['id'=>'button-submit','class' => $model->isNewRecord ? 'btn btn-success submit_perakuan' : 'btn btn-success','disabled'=>'disabled']) ?>         
  
            </div>

            
        </div>

    <?php ActiveForm::end(); ?>
