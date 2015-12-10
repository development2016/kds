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

$state = ArrayHelper::map(LookupState::find()->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
//$mukim = ArrayHelper::map(LookupMukim::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'mukim_id','mukim');
$subbase = ArrayHelper::map(LookupSubBase::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_id])->asArray()->all(),'cluster_id','cluster');

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
                                                'prompt'=>'(Sila Pilih)','id'=>'state',
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});',

                                                'class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'state'); ?> <span class="required">*</span></label>
                                                <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'district_id', $district, 
                                                [
                                                    'prompt'=>'','id'=>'district',
                                                    'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase" ).html( data );});',
   
                                                    'class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> <span class="required">*</span></label>
                                                <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                            </div>
                                        </div>



            
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                                [
                                                    'prompt'=>'','id'=>'subbase',
                                                    'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-kampung/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster" ).html( data );});',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'sub_base'); ?> <span class="required">*</span></label>
                                                <span class="help-block"><?= Html::error($model,'sub_base_id'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'cluster_id', $cluster, 
                                                [
                                                    'prompt'=>'','id'=>'cluster',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'cluster_id'); ?> <span class="required">*</span></label>
                                                <span class="help-block"><?= Html::error($model,'cluster_id'); ?></span>
                                            </div>
                                        </div>

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