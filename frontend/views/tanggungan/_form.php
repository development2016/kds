<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupEduLevel;
use common\models\LookupHubungan;
/* @var $this yii\web\View */
/* @var $model common\models\Tanggungan */
/* @var $form yii\widgets\ActiveForm */
$edu = ArrayHelper::map(LookupEduLevel::find()->asArray()->all(), 'id', 'edu_level');
$hubungan = ArrayHelper::map(LookupHubungan::find()->asArray()->all(), 'id', 'hubungan');
?>


<div class="tanggungan-form">

    <?php $form = ActiveForm::begin(); ?>
    
                        <div class="row">
                                <div class="portlet-body form">
 
                                    <div class="form-body">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'nama_tanggungan',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'nama_tanggungan'); ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'no_ic_tanggungan',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'no_ic_tanggungan'); ?></label> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'tarikh_lahir',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_lahir'); ?></label>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'edu_level', $edu, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
           
                                                <label for="form_control_1"><?= Html::activeLabel($model,'edu_level'); ?></label> 
                                            </div>
                                        </div>
                                     </div>

                                     <div class="form-body">
                                       
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'tanggungan_kerja',
                                                 [
                                                    'Ya' => 'Ya',
                                                    'Tidak' => 'Tidak',
                                                 ], 
                                                 ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'tanggungan_kerja'); ?></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'hubungan', $hubungan, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                
                                                <label for="form_control_1"><?= Html::activeLabel($model,'hubungan'); ?></label> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'tanggungan_oku',
                                                 [
                                                    'Ya' => 'Ya',
                                                    'Tidak' => 'Tidak',
                                                 ], 
                                                 ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'tanggungan_oku'); ?></label>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="form-body">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'note',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'note'); ?></label>
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
