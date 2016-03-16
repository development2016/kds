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
use common\models\LookupMukim;

$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
//$district = ArrayHelper::map(LookupDistrict::find()->where(['bahagian_id'=>$model->bahagian_id])->asArray()->all(), 'district_id', 'district');

$mukim = ArrayHelper::map(LookupMukim::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'mukim_id','mukim');
$subbase = ArrayHelper::map(LookupSubBase::find()->where(['mukim_id'=>$model->mukim_id])->asArray()->all(),'sub_base_id','sub_base');
$subbase = ArrayHelper::map(LookupSubBase::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'sub_base_id','sub_base');

$cluster = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_id])->asArray()->all(),'cluster_id','cluster');
$bahagian = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'bahagian_id', 'bahagian');

/* @var $this yii\web\View */
/* @var $model common\models\LookupAgama */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-kampung-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeDropDownList($model, 'state_id', $state, 
                            [
                                'prompt'=>'(Sila Pilih)','id'=>'state_kg',
                                'onchange'=>
                                'JS: var id = (this.value);
                                if (id == 21) {
                                    $.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#bahagian " ).html( data );});
                                }
                                else if(id == 22){
                                    $.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#johordistrict " ).html( data );});
                                } else {
                                    $.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district " ).html( data );});
                                };',
                                'class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'state'); ?> <span class="required">*</span></label>
                                <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                    </div>
                </div>
                <div style="display:none;" class="bahagian_sarawak"> <!-- SARAWAK SECTION -->
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeDropDownList($model, 'bahagian_id', $bahagian, 
                                [
                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listdistrictbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district_bahagian" ).html( data );});',
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
                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbasesarawak" ).html( data );});',
                                    'prompt'=>'','id'=>'district_bahagian',   
                                    'class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                [
                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#clustersarawak" ).html( data );});',
                                    'prompt'=>'','id'=>'subbasesarawak',
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
                                    'prompt'=>'','id'=>'clustersarawak',
                                    'class'=>'form-control',
                                ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'cluster_id'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'cluster_id'); ?></span>
                        </div>
                    </div>
                </div><!-- END SARAWAK SECTION -->
                <div style="display:none;" class="johor"> <!-- Johor SECTION -->
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input">
                                <?= Html::activeDropDownList($model, 'district_id', $district, 
                                [
                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listmukim','id'=>'']).'"+$(this).val(), function( data ) {$( "select#mukim_johor" ).html( data );});',
                                    'prompt'=>'','id'=>'johordistrict',   
                                    'class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeDropDownList($model, 'mukim_id', $mukim, 
                                [
                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listsubbasesearch','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase_johor" ).html( data );});',
                                    'prompt'=>'','id'=>'mukim_johor',   
                                    'class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'mukim_id'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'mukim_id'); ?></span>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                [
                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster_johor" ).html( data );});',
                                    'prompt'=>'','id'=>'subbasejohor',
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
                                    'prompt'=>'','id'=>'clusterjohor',
                                    'class'=>'form-control',
                                ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'cluster_id'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'cluster_id'); ?></span>
                        </div>
                    </div>
                </div> <!-- END JOHOR SECTION -->
                <div style="display:none;" class="lainState"> <!-- Other State SECTION -->
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeDropDownList($model, 'district_id', $district, 
                                [
                                    'prompt'=>'','id'=>'district',
                                    'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listsubbaseother','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase_other" ).html( data );});',
                                    'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> <span class="required">*</span></label>
                                    <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                [
                                    'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster_other" ).html( data );});',
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
                                    'prompt'=>'','id'=>'cluster_other',
                                    'class'=>'form-control',
                                ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'cluster_id'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'cluster_id'); ?></span>
                        </div>
                    </div>
                </div><!-- END OTHER STATE SECTION -->
                <div class="col-md-6">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'kampung',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'kampung'); ?></label>
                        <span class="help-block"><?= Html::error($model,'kampung'); ?></span>
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