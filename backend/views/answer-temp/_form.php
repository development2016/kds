<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AnswerTemp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answer-temp-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $model->question->soalan_temp;?>
	<br><br>
    <?= $form->field($model, 'jawapan')->textInput(['maxlength' => true]) ?>
    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
