<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StatusHarian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-harian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pahang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kedah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perlis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'terengganu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'johor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'selangor')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'sarawak')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
