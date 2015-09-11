<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupMukim;

//$negara = ArrayHelper::map(LookupCountry::find()->asArray()->all(), 'country_id', 'country');
$state = ArrayHelper::map(LookupState::find()->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
//$mukim = ArrayHelper::map(LookupMukim::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'mukim_id','mukim');
/* @var $this yii\web\View */
/* @var $model common\models\LookupAgama */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-sub_base-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
                                <div class="portlet-body form">
                                    <div class="form-body">

                                        
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'state_id', $state, 
                                                [
                                                'prompt'=>'(Sila Pilih)','id'=>'state',
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-sub-base/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});',

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
                                                    'class'=>'form-control',
                                                    //'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-sub-base/listmukim','id'=>'']).'"+$(this).val(), function( data ) {$( "select#mukim" ).html( data );});',
   
                                                    'class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> <span class="required">*</span></label>
                                                <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'sub_base',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'sub_base'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'sub_base'); ?></span>
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