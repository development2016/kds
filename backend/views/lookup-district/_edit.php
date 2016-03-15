<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupBahagian;


$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan' => 'Ya'])->asArray()->all(), 'state_id', 'state');
$bahagian = ArrayHelper::map(LookupBahagian::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'bahagian_id', 'bahagian');


/* @var $this yii\web\View */
/* @var $model common\models\LookupAgama */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-district-form">

    <?php $form = ActiveForm::begin(); ?>

     <div class="row">
            <div class="portlet-body form">
                <div class="form-body">
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeDropDownList($model, 'state_id', $state, 
                            [
                            'prompt'=>'(Sila Pilih)','id'=>'state_district',
                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-district/listbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#bahagian" ).html( data );});',
                            'class'=>'form-control state_district']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'state'); ?> </label>
                            <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                        </div>
                    </div>

                    <div style="display:none;" class="bahagian_district">

                        <div class="col-md-3">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeDropDownList($model, 'bahagian_id', $bahagian, 
                                [
                                    'prompt'=>'(Sila Pilih)','id'=>'bahagian',   
                                    'class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'bahagian_id'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'bahagian_id'); ?></span>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeTextInput($model,'district',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'district'); ?></label>
                            <span class="help-block"><?= Html::error($model,'district'); ?></span>
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

