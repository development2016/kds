<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LookupBangsa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-kategori-isu-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-12">
        			<div class="form-group form-md-line-input">
            			<?= Html::activeTextInput($model,'kategori_isu',['class'=>'form-control']); ?>
            			<label for="form_control_1"><?= Html::activeLabel($model,'kategori_isu'); ?></label>
            			<span class="help-block"><?= Html::error($model,'kategori_isu'); ?></span>
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