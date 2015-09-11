<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WifeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wife-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'wife_id') ?>

    <?= $form->field($model, 'wife_name') ?>

    <?= $form->field($model, 'wife_ic') ?>

    <?= $form->field($model, 'wife_work') ?>

    <?= $form->field($model, 'wife_oku') ?>

    <?php // echo $form->field($model, 'people_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
