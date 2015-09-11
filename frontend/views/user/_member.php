<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupState;
use frontend\models\LookupRole;
use common\models\LookupDistrict;
use common\models\LookupKampung;
use common\models\LookupMukim;
$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$role = ArrayHelper::map(LookupRole::find()->where(['NOT IN','role_id',[2,5,6,7,8,9,10,12]])->asArray()->all(), 'role_id', 'role');

$state = ArrayHelper::map(LookupState::find()->asArray()->all(), 'state_id', 'state');



// for ketua kampung
$state_ketua_kampung = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district_ketua_kampung = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$member->state_id])->asArray()->all(), 'district_id', 'district');
$mukim_ketua_kampung = ArrayHelper::map(LookupMukim::find()->where(['district_id'=>$member->district_id])->asArray()->all(), 'mukim_id', 'mukim');
$kampung_ketua_kampung = ArrayHelper::map(LookupKampung::find()->where(['mukim_id'=>$member->mukim_id])->asArray()->all(),'kampung_id','kampung');

//for pejabat daerah
$state_pejabat_daerah = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district_pejabat_daerah = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$member->state_id])->asArray()->all(), 'district_id', 'district');

// for upen 
$state_upen = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');

// for penghulu
$state_penghulu = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district_penghulu = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$member->state_id])->asArray()->all(), 'district_id', 'district');
$mukim_penghulu = ArrayHelper::map(LookupMukim::find()->where(['district_id'=>$member->district_id])->asArray()->all(), 'mukim_id', 'mukim');
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
                <i class="fa fa-check"></i> Maklumat Pemohon </span>
                </a>
            </li>
            <li>
                <a href="#tab2" data-toggle="tab" class="step">
                <span class="number">
                2 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Maklumat Majikan / Organisasi </span>
                </a>
            </li>
            <li>
                <a href="#tab3" data-toggle="tab" class="step">
                <span class="number">
                3 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Akses </span>
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
                                    <?= Html::activeDropDownList($model, 'state_id', $state, 
                                    [
                                    'prompt'=>'(Sila Pilih)','id'=>'state',
                                    'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
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
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($member,'nama_majikan',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'nama_majikan'); ?> </label>
                                    <span class="help-block"><?= Html::error($member,'nama_majikan'); ?></span>
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
                                    <?= Html::activeTextArea($member,'alamat_majikan',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'alamat_majikan'); ?> </label>
                                    <span class="help-block"><?= Html::error($member,'alamat_majikan'); ?></span>
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
                                    <?= Html::activeTextInput($member,'bandar',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'bandar'); ?></label>
                                    <span class="help-block"><?= Html::error($member,'bandar'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($member, 'state_id_majikan', $state, 
                                    [
                                    'prompt'=>'(Sila Pilih)','id'=>'state',
                                    'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'state_id_majikan'); ?></label>
                                    <span class="help-block"><?= Html::error($member,'state_id_majikan'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($member,'poskod',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'poskod'); ?></label>
                                    <span class="help-block"><?= Html::error($member,'poskod'); ?></span>
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
                                    <?= Html::activeTextInput($member,'no_tel',['class'=>'form-control','id'=>'mask_mobile']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'no_tel'); ?></label>
                                    <span class="help-block"><?= Html::error($member,'no_tel'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($member,'fax',['class'=>'form-control','id'=>'mask_home']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'fax'); ?></label>
                                    <span class="help-block"><?= Html::error($member,'fax'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($member,'email_majikan',['class'=>'form-control','placeholder'=>'Eg. cypress@gmail.com']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'email_majikan'); ?></label>
                                    <span class="help-block"><?= Html::error($member,'email_majikan'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="tab-pane" id="tab3">

                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                   <?= Html::activeDropDownList($member, 'tujuan_akses', $role, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control role_member',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'tujuan_akses'); ?></label>
                                    <span class="help-block"><?= Html::error($member,'tujuan_akses'); ?></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="row ketua_kampung" style="display:none;">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                   
                                    <?= Html::activeDropDownList($member, 'state_id', $state_ketua_kampung, 
                                    [
                                    'prompt'=>'(Sila Pilih)','id'=>'state_ketua_kampung',
                                    'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listdistrictketuakampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district_ketua_kampung" ).html( data );});',

                                    'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'state_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($member,'state_id'); ?></span>
                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeDropDownList($member, 'district_id', $district_ketua_kampung, 
                                    [
                                        'prompt'=>'','id'=>'district_ketua_kampung',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listmukimketuakampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#mukim_ketua_kampung" ).html( data );});',

                                        'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'district_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($member,'district_id'); ?></span>
                                   
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeDropDownList($member, 'mukim_id', $mukim_ketua_kampung, 
                                    [
                                        'prompt'=>'','id'=>'mukim_ketua_kampung',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listkampungketuakampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung_ketua_kampung" ).html( data );});',

                                        'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'mukim_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($member,'mukim_id'); ?></span>
                                   
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="row ketua_kampung" style="display:none;">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeDropDownList($member, 'kampung_id', $kampung_ketua_kampung, 
                                    [
                                        'prompt'=>'','id'=>'kampung_ketua_kampung',
                                        'class'=>'form-control select2me',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'kampung_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($member,'kampung_id'); ?></span>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row pejabat_daerah" style="display:none;">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                   
                                    <?= Html::activeDropDownList($member, 'state_id', $state_pejabat_daerah, 
                                    [
                                    'prompt'=>'(Sila Pilih)','id'=>'state_pejabat_daerah',
                                    'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listdistrictpejabat_daerah','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district_pejabat_daerah" ).html( data );});',

                                    'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'state_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($member,'state_id'); ?></span>
                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeDropDownList($member, 'district_id', $district_pejabat_daerah, 
                                    [
                                        'prompt'=>'','id'=>'district_pejabat_daerah',

                                        'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'district_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($member,'district_id'); ?></span>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row upen" style="display:none;">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                   
                                    <?= Html::activeDropDownList($member, 'state_id', $state_upen, 
                                    [
                                    'prompt'=>'(Sila Pilih)','id'=>'state_upen',

                                    'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'state_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($member,'state_id'); ?></span>
                                    
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="row penghulu" style="display:none;">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                   
                                    <?= Html::activeDropDownList($member, 'state_id', $state_penghulu, 
                                    [
                                    'prompt'=>'(Sila Pilih)','id'=>'state_penghulu',
                                    'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listdistrictpenghulu','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district_penghulu" ).html( data );});',

                                    'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'state_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($member,'state_id'); ?></span>
                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeDropDownList($member, 'district_id', $district_penghulu, 
                                    [
                                        'prompt'=>'','id'=>'district_penghulu',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listmukimpenghulu','id'=>'']).'"+$(this).val(), function( data ) {$( "select#mukim_penghulu" ).html( data );});',

                                        'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'district_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($member,'district_id'); ?></span>
                                   
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeDropDownList($member, 'mukim_id', $mukim_penghulu, 
                                    [
                                        'prompt'=>'','id'=>'mukim_penghulu',

                                        'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($member,'mukim_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($member,'mukim_id'); ?></span>
                                   
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