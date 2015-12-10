<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LookupEduLevel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-edu-level-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'edu_level')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
