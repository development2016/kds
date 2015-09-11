<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CountMukim */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="count-mukim-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ict')->textInput() ?>

    <?= $form->field($model, 'kesihatan')->textInput() ?>

    <?= $form->field($model, 'pendidikan')->textInput() ?>

    <?= $form->field($model, 'keusahawanan')->textInput() ?>

    <?= $form->field($model, 'riadah')->textInput() ?>

    <?= $form->field($model, 'mukim_id')->textInput() ?>

    <?= $form->field($model, 'district_id')->textInput() ?>

    <?= $form->field($model, 'state_id')->textInput() ?>

    <?= $form->field($model, 'last_update')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
