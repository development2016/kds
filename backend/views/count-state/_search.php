<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CountStateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="count-state-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ict') ?>

    <?= $form->field($model, 'kesihatan') ?>

    <?= $form->field($model, 'pendidikan') ?>

    <?= $form->field($model, 'keusahawanan') ?>

    <?php // echo $form->field($model, 'riadah') ?>

    <?php // echo $form->field($model, 'state_id') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
