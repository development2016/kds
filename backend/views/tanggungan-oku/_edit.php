<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TanggunganOku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tanggungan-oku-form">

    <?php $form = ActiveForm::begin(); ?>

                            <div class="row">
                                <div class="portlet-body form">
 
                                    <div class="form-body">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'nama',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'nama'); ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'umur',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'umur'); ?></label> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'hubungan',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'hubungan'); ?></label> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'no_pendaftaran',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'no_pendaftaran'); ?></label> 
                                            </div>
                                        </div>
                                     </div>

                                     <div class="form-body">
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'kategori',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'kategori'); ?></label> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'tahap_pendidikan',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'tahap_pendidikan'); ?></label> 
                                            </div>
                                        </div>
                                        
                                     </div>

                                     <div class="form-body">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'nama_sekolah',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'nama_sekolah'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'nota',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'nota'); ?></label>
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
