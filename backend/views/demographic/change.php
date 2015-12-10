<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="portlet-body form">
        <div class="form-body">

            <div class="col-md-2">
                <div class="form-group form-md-line-input">
                    
                    <?= Html::activeTextInput($model,'bilangan',['class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'bilangan'); ?> </label>
                    <span class="help-block"><?= Html::error($model,'bilangan'); ?></span>
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-md-line-input">
                    <?= Html::activeDropDownList($model, 'status_kemudahan',
                     [
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                     ], 
                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'status_kemudahan'); ?> </label>
                    <span class="help-block"><?= Html::error($model,'status_kemudahan'); ?></span>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="portlet-body form">
        <div class="form-body">

            <div class="col-md-5">
                <div class="form-group form-md-line-input">
                    
                    <?= Html::activeTextArea($model,'nama',['class'=>'form-control','cols'=>30,'rows'=>4]); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'nama'); ?> </label>
                    <span class="help-block"><?= Html::error($model,'nama'); ?></span>
                    
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group form-md-line-input">
                    <?= Html::activeTextArea($model,'catatan',['class'=>'form-control','cols'=>30,'rows'=>4]); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'catatan'); ?> </label>
                    <span class="help-block"><?= Html::error($model,'catatan'); ?></span>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['id'=>'button-submit','class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>  
<?php ActiveForm::end(); ?>