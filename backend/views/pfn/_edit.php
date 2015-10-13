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
                    <?= Html::activeDropDownList($model, 'status_audit',
                     [
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                     ], 
                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'status_audit'); ?></label>
                    <span class="help-block"><?= Html::error($model,'status_audit'); ?></span>
                </div>
            </div>
                                <div class="col-md-3">
                <div class="form-group form-md-line-input">
                    <?= Html::activeDropDownList($model, 'status_rangkaian',
                     [
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                     ], 
                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'status_rangkaian'); ?></label>
                    <span class="help-block"><?= Html::error($model,'status_rangkaian'); ?></span>
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