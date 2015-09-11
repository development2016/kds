<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TanggunganOkuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tanggungan-oku-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'umur') ?>

    <?= $form->field($model, 'hubungan') ?>

    <?= $form->field($model, 'no_pendaftaran') ?>

    <?php // echo $form->field($model, 'kategori') ?>

    <?php // echo $form->field($model, 'nota') ?>

    <?php // echo $form->field($model, 'tahap_pendidikan') ?>

    <?php // echo $form->field($model, 'nama_sekolah') ?>

    <?php // echo $form->field($model, 'people_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
