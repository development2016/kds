<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserPengalaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-pengalaman-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="portlet-body form">

            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'nama_organisasi',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'nama_organisasi'); ?></label>
                    </div>
                </div>
            </div>

            <div class="form-body">
                <div class="col-md-6">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'jawatan',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'jawatan'); ?></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'bidang',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'bidang'); ?></label>
                    </div>
                </div>
            </div>
        
            <div class="form-body">
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'tarikh_mula',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_mula'); ?></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'tarikh_tamat',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_tamat'); ?></label>
                    </div>
                </div>
            </div>
            
                             

        </div>
    </div>





    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


