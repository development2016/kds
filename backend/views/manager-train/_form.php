<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupPfnCategory;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupMukim;
use common\models\LookupKampung;
/* @var $this yii\web\View */
/* @var $model common\models\ManagerTrain */
/* @var $form yii\widgets\ActiveForm */
$pfnCat = ArrayHelper::map(LookupPfnCategory::find()->asArray()->all(), 'cat_id', 'cat_name');
$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
$mukim = ArrayHelper::map(LookupMukim::find()->where(['district_id'=>$model->district_id])->asArray()->all(), 'mukim_id', 'mukim');
$subbase = ArrayHelper::map(LookupSubBase::find()->where(['mukim_id'=>$model->mukim_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_id])->asArray()->all(),'cluster_id','cluster');
$kampung = ArrayHelper::map(LookupKampung::find()->where(['cluster_id'=>$model->cluster_id])->asArray()->all(),'kampung_id','kampung');
?>

<div class="lookup-manager-train-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        
                        <?= Html::activeTextInput($model,'rangkaian_fasiliti_awam',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'rangkaian_fasiliti_awam'); ?></label>
                        <span class="help-block"><?= Html::error($model,'rangkaian_fasiliti_awam'); ?></span>
                        
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
                                    <?= Html::activeDropDownList($model, 'location',
                                     [
                                        'Bandar' => 'Bandar',
                                        'Luar Bandar' => 'Luar Bandar',
                                     ], 
                                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'location'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'location'); ?></span>
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
                                    'prompt'=>'(Sila Pilih)','id'=>'state',
                                    'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['manager-train/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});',

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
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['manager-train/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase" ).html( data );});',

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
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['manager-train/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster" ).html( data );});',
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
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['manager-train/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung" ).html( data );});',
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
                                    
                                    <?= Html::activeTextInput($model,'ic',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'ic'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'ic'); ?></span>
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'no_fon',['id'=>'mask_mobile','class'=>'form-control','placeholder'=>'011-*********']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'no_fon'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'no_fon'); ?></span>
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


    <div class="form-actions">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>                  
    </div>

        <?php ActiveForm::end(); ?>

</div>
