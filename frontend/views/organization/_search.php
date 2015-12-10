<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VolunteerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

     <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'org_name',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'org_name'); ?></label>
                        <span class="help-block"><?= Html::error($model,'org_name'); ?></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'reg_no',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'reg_no'); ?></label>
                        <span class="help-block"><?= Html::error($model,'reg_no'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'sector_id',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'sector_name'); ?></label>
                        <span class="help-block"><?= Html::error($model,'sector_id'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'field_id',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'field_name'); ?></label>
                        <span class="help-block"><?= Html::error($model,'field_id'); ?></span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    

    <div class="form-group">
        <?= Html::submitButton('Carian', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>