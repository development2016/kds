<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;
use common\models\LookupMukim;
use common\models\LookupAgama;
use common\models\LookupBangsa;
use common\models\LookupPerkahwinan;
use common\models\LookupKategoriIsu;
use common\models\LookupKategoriOku;


$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
$subbase = ArrayHelper::map(LookupSubBase::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_id])->asArray()->all(),'cluster_id','cluster');
$kampung = ArrayHelper::map(LookupKampung::find()->where(['cluster_id'=>$model->cluster_id])->asArray()->all(),'kampung_id','kampung');

$agama = ArrayHelper::map(LookupAgama::find()->asArray()->all(), 'id', 'agama');
$bangsa = ArrayHelper::map(LookupBangsa::find()->asArray()->all(), 'id', 'bangsa');
$perkahwinan = ArrayHelper::map(LookupPerkahwinan::find()->asArray()->all(), 'id', 'status_perkahwinan');
$kategoriIsu = ArrayHelper::map(LookupKategoriIsu::find()->asArray()->all(), 'kategori_id', 'kategori_isu');
$kategoriOku = ArrayHelper::map(LookupKategoriOku::find()->asArray()->all(), 'id', 'kategori_oku');
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
                <i class="fa fa-check"></i> Maklumat Pengadu </span>
                </a>
            </li>
            <li>
                <a href="#tab2" data-toggle="tab" class="step">
                <span class="number">
                2 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Isu </span>
                </a>
            </li>

        </ul>
        <div id="bar" class="progress progress-striped" role="progressbar">
            <div class="progress-bar progress-bar-success">
            </div>
        </div>
        <div class="tab-content">
            <p>Ruangan Yang Bertanda <span class="required">*</span> Adalah Wajib Diisi.</p>

            <div class="tab-pane active" id="tab1">
                <?=$form->errorSummary($model);?>
                <div class="caption font-green-haze">
                    <span class="caption-subject bold uppercase"> Maklumat Pengadu</span>
                </div>
                <br>
                
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'issue_code',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'issue_code'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'issue_code'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'area_code',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'area_code'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'area_code'); ?></span>
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
                                    <?= Html::activeTextInput($model,'date',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'date'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'date'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'day',
                                     [
                                        'Isnin' => 'Isnin',
                                        'Selasa' => 'Selasa',
                                        'Rabu' => 'Rabu',
                                        'Khamis' => 'Khamis',
                                        'Jumaat' => 'Jumaat',
                                        'Sabtu' => 'Sabtu',
                                        'Ahad' => 'Ahad',

                                     ], 

                                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'day'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'day'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'time',['class'=>'form-control','placeholder'=>'12.00AM']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'time'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'time'); ?></span>
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
                                    
                                    <?= Html::activeTextInput($model,'no_kp',['class'=>'form-control','placeholder'=>'Eg. 900907105331']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'no_kp'); ?> <span class="required">*</span></label>
                                    <span class="help-block"><?= Html::error($model,'no_kp'); ?></span>
                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'no_kp_old',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'no_kp_old'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'no_kp_old'); ?></span>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-1">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'age',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'age'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'age'); ?></span>
                                    
                                </div>
                            </div>

                            <div class="col-md-2">
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


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <p class="title_h4">Adakah anda tergolong dalam Orang Kelainan Upaya (OKU) ? </p>


                                <div class="col-md-12">
                                    <div class="md-radio-inline">
                                        <div class="md-radio">
                                           
                                            <input type="radio" id="radio1" name="IssueConduit[kategori_oku]" class="md-radiobtn" value="Ya">
                                            
                                            <label for="radio1">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            Ya </label>
                                        </div>
                                       <div class="md-radio">
                                            
                                            <input type="radio" id="radio2" name="IssueConduit[kategori_oku]" class="md-radiobtn" value="Tidak" checked="checked">

                                            <label for="radio2">
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
                                    <?= Html::activeDropDownList($model, 'kategori_oku_id', $kategoriOku, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'kategori_oku_id'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'kategori_oku_id'); ?></span>
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
                                    <?= Html::activeTextArea($model,'address',['class'=>'form-control','rows'=>8]); ?>
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

                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'no_tel',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'no_tel'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'no_tel'); ?></span>
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
                                    'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['issue-conduit/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});',

                                    'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?> <span class="required">*</span></label>
                                    <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'district_id', $district, 
                                    [
                                        'prompt'=>'','id'=>'district',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['issue-conduit/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase" ).html( data );});',

                                        'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> <span class="required">*</span></label>
                                    <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
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
                                    <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                    [
                                        'prompt'=>'','id'=>'subbase',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['issue-conduit/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster" ).html( data );});',
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
                                        'prompt'=>'','id'=>'cluster',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['issue-conduit/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung" ).html( data );});',
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
                                        'prompt'=>'','id'=>'kampung',
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

            <div class="tab-pane" id="tab2">

                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'issue_category', $kategoriIsu, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'issue_category'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'issue_category'); ?></span>
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
                                    <?= Html::activeTextArea($model,'issue_report',['class'=>'form-control','rows'=>8]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'issue_report'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'issue_report'); ?></span>
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
                                    <?= Html::activeTextArea($model,'analisis_isu',['class'=>'form-control','rows'=>8]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'analisis_isu'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'analisis_isu'); ?></span>
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
                                    <?= Html::activeTextArea($model,'cadangan',['class'=>'form-control','rows'=>8]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'cadangan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'cadangan'); ?></span>
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
                                    <?= Html::activeTextInput($model,'report_by',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'report_by'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'report_by'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'witness_by',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'witness_by'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'witness_by'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'received_by',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'received_by'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'received_by'); ?></span>
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
