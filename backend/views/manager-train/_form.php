<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ManagerTrain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manager-train-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rangkaian_fasiliti_awam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_id')->textInput() ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state_id')->textInput() ?>

    <?= $form->field($model, 'district_id')->textInput() ?>

    <?= $form->field($model, 'mukim_id')->textInput() ?>

    <?= $form->field($model, 'sub_base_id')->textInput() ?>

    <?= $form->field($model, 'cluster_id')->textInput() ?>

    <?= $form->field($model, 'kampung_id')->textInput() ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'poskod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pengurus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jantina')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_fon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_enter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enter_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
