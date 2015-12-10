<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'ic_no') ?>

    <?= $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'home_no') ?>

    <?php // echo $form->field($model, 'no_tel_pej') ?>

    <?php // echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'tarikh_daftar') ?>

    <?php // echo $form->field($model, 'pendapatan') ?>

    <?php // echo $form->field($model, 'pekerjaan') ?>

    <?php // echo $form->field($model, 'jawatan') ?>

    <?php // echo $form->field($model, 'mukim') ?>

    <?php // echo $form->field($model, 'kampung') ?>

    <?php // echo $form->field($model, 'negara') ?>

    <?php // echo $form->field($model, 'negeri') ?>

    <?php // echo $form->field($model, 'daerah') ?>

    <?php // echo $form->field($model, 'kewarganegaraan') ?>

    <?php // echo $form->field($model, 'status_perkahwinan') ?>

    <?php // echo $form->field($model, 'bangsa') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'jantina') ?>

    <?php // echo $form->field($model, 'bank') ?>

    <?php // echo $form->field($model, 'no_akaun') ?>

    <?php // echo $form->field($model, 'tarikh_lahir') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'last_login') ?>

    <?php // echo $form->field($model, 'ic_no_old') ?>

    <?php // echo $form->field($model, 'bandar') ?>

    <?php // echo $form->field($model, 'poskod') ?>

    <?php // echo $form->field($model, 'negara_area_id') ?>

    <?php // echo $form->field($model, 'state_area_id') ?>

    <?php // echo $form->field($model, 'district_area_id') ?>

    <?php // echo $form->field($model, 'sub_base_area_id') ?>

    <?php // echo $form->field($model, 'cluster_area_id') ?>

    <?php // echo $form->field($model, 'kampong_area_id') ?>

    <?php // echo $form->field($model, 'status_area') ?>

    <?php // echo $form->field($model, 'tarikh_daftar_kerja') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
