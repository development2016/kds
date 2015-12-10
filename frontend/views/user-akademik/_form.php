<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserAkademik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-akademik-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="portlet-body form">
 
            <div class="form-body">
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'tahap_pendidikan',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'tahap_pendidikan'); ?></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'sijil',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'sijil'); ?></label>
                    </div>
                </div>
            </div>
            
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'nama_institusi',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'nama_institusi'); ?></label>
                    </div>
                </div>
            </div>

            <div class="form-body">
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'bidang_pengkhususan',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'bidang_pengkhususan'); ?></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'gred_keseluruhan',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'gred_keseluruhan'); ?></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'tarikh_anugerah',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_anugerah'); ?></label>
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

