<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PeopleOku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="people-oku-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_pendaftaran')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'kategori_oku')->textInput() ?>

    <?= $form->field($model, 'nota')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'people_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
