<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-form">



    <?php 


    foreach ($people as $key => $value) {
        echo $value['name'];
    }
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'menu_id')->textInput() ?>

    <?= $form->field($model, 'catatan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enter_by')->textInput() ?>

    <?= $form->field($model, 'enter_date')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
