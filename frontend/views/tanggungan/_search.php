<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TanggunganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tanggungan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tanggungan_id') ?>

    <?= $form->field($model, 'nama_tanggungan') ?>

    <?= $form->field($model, 'no_ic_tanggungan') ?>

    <?= $form->field($model, 'tarikh_lahir') ?>

    <?= $form->field($model, 'edu_level') ?>

    <?php // echo $form->field($model, 'tanggungan_kerja') ?>

    <?php // echo $form->field($model, 'hubungan') ?>

    <?php // echo $form->field($model, 'tanggungan_oku') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'people_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
