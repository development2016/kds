<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PeopleOkuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="people-oku-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_pendaftaran') ?>

    <?= $form->field($model, 'kategori_oku') ?>

    <?= $form->field($model, 'nota') ?>

    <?= $form->field($model, 'people_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
