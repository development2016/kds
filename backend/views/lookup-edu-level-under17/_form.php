<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LookupAgama */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-edu-level-under17-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-12">
        			<div class="form-group form-md-line-input">
            			<?= Html::activeTextInput($model,'edu_level_under_17',['class'=>'form-control']); ?>
            			<label for="form_control_1"><?= Html::activeLabel($model,'edu_level_under_17'); ?></label>
            			<span class="help-block"><?= Html::error($model,'edu_level_under_17'); ?></span>
       				</div>
    			</div>    
            </div>
        </div>
    </div>

	<div class="form-actions">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>                  
    </div>

		<?php ActiveForm::end(); ?>

</div>


