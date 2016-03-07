<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AnswerTemp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answer-temp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jawapan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'question_temp_id')->textInput() ?>

    <?= $form->field($model, 'people_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
