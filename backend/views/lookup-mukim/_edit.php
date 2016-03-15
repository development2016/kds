<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupState;
use common\models\LookupDistrict;


//$negara = ArrayHelper::map(LookupCountry::find()->asArray()->all(), 'country_id', 'country');
$state = ArrayHelper::map(LookupState::find()->where(['state_id' => 22])->asArray()->all(), 'state_id', 'state');

//$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$bahagian = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'bahagian_id', 'bahagian');
//$district = ArrayHelper::map(LookupDistrict::find()->where(['bahagian_id'=>$model->bahagian_id])->asArray()->all(), 'district_id', 'district');


$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>22])->asArray()->all(), 'district_id', 'district');


/* @var $this yii\web\View */
/* @var $model common\models\LookupAgama */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-district-form">

    <?php $form = ActiveForm::begin(); ?>

     <div class="row">
            <div class="portlet-body form">
                <div class="form-body">
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeDropDownList($model, 'state_id', $state, 
                            [
                            //'prompt'=>'(Sila Pilih)','id'=>'state_mukim',
                            //'onchange'=>
                             //   'JS: var id = (this.value);
                             //   if (id == 22) {
                             //       $.post( "'.Yii::$app->urlManager->createUrl(['lookup-mukim/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district " ).html( data );});
                             //   };',

                            'class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'state'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                        </div>
                    </div>

                    <div class="mukim"> <!-- Johor Section -->
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeDropDownList($model, 'district_id', $district, 
                                [
                                    'prompt'=>'(Sila Pilih)','id'=>'district',
                                    'class'=>'form-control',

                                ]); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?></label>
                                <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
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
    </div>
        <div class="form-actions">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>                  
    </div>

        <?php ActiveForm::end(); ?>


