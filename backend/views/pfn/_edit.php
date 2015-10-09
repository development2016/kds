<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="lookup-manager-train-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="portlet-body form">
        <div class="form-body">
            <div class="col-md-3">
                <div class="form-group form-md-line-input">
                    <?= Html::activeDropDownList($model, 'status_pfn',
                     [
                        'Audit' => 'Audit',
                        'Rangkaian' => 'Rangkaian',
                     ], 
                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'status_pfn'); ?></label>
                    <span class="help-block"><?= Html::error($model,'status_pfn'); ?></span>
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