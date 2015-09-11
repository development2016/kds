<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ic_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_tel_pej')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->textInput() ?>

    <?= $form->field($model, 'pendapatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jawatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mukim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kampung_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kewarganegaraan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_perkahwinan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bangsa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jantina')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_akaun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tarikh_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ic_no_old')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'poskod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'negara_area_id')->textInput() ?>

    <?= $form->field($model, 'state_area_id')->textInput() ?>

    <?= $form->field($model, 'district_area_id')->textInput() ?>

    <?= $form->field($model, 'sub_base_area_id')->textInput() ?>

    <?= $form->field($model, 'cluster_area_id')->textInput() ?>

    <?= $form->field($model, 'kampung_area_id')->textInput() ?>

    <?= $form->field($model, 'status_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tarikh_daftar_kerja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
