<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tanggungan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'country',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'country'); ?></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'country_code',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'country_code'); ?></label>
                    </div>
                </div>
            </div>
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'desc',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'desc'); ?></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'flag',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'flag'); ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>


</div>
