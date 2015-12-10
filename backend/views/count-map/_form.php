<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CountStateTmp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="count-state-tmp-form">

    <?php $form = ActiveForm::begin(); ?>


<?php

foreach ($countState as $key => $value) { 

	echo Html::activeTextInput($model,'count_state[]',['class'=>'form-control','value'=>$value['total']]);
	echo Html::activeTextInput($model,'state_id[]',['class'=>'form-control','value'=>$value['state_id']]);
	
}

 ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
