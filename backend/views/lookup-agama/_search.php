<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LookupAgamaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-agama-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

     <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'agama',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'agama'); ?></label>
                        <span class="help-block"><?= Html::error($model,'agama'); ?></span>
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
    
</div>