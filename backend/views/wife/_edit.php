<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Wife */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wife-form">

    <?php $form = ActiveForm::begin(); ?>

    						<div class="row">
                                <div class="portlet-body form">
 
                                    <div class="form-body">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'wife_name',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'wife_name'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'wife_ic',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'wife_ic'); ?></label> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'wife_work',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'wife_work'); ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'wife_oku',
                                                 [
                                                    'Tidak' => 'Tidak',
                                                    'Ya' => 'Ya',
                                                 ], 
                                                 [FALSE,'id'=>'form_control_1','class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'wife_oku'); ?></label>
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
