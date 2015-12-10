<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">

                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextArea($model,'catatan',['class'=>'form-control','rows'=>5]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'catatan'); ?></label>
                        <span class="help-block"><?= Html::error($model,'catatan'); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>