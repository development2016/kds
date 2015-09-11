<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;
use common\models\LookupState;
use common\models\LookupKampung;
$user = ArrayHelper::map(User::find()->where(['role'=>5])->asArray()->all(), 'id', 'nama','ic_no');
$user_verified = ArrayHelper::map(User::find()->where(['role'=>6])->asArray()->all(), 'id', 'nama','ic_no');
$status_data = array('Sah'=>'Sah','Separa Sah'=>'Separa Sah');

$kampung = ArrayHelper::map(LookupKampung::find()->joinWith('statejoin')->orderBy('lookup_state.state_id, lookup_kampung.state_id')->all(),'kampung_id','kampung','statejoin.state');


/* @var $this yii\web\View */
/* @var $model common\models\VolunteerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'name',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'name'); ?></label>
                        <span class="help-block"><?= Html::error($model,'name'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'ic_no',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'ic_no'); ?></label>
                        <span class="help-block"><?= Html::error($model,'ic_no'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'ic_no_old',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'ic_no_old'); ?></label>
                        <span class="help-block"><?= Html::error($model,'ic_no_old'); ?></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeDropDownList($model, 'kampung_id', $kampung, 
                        [
                            'prompt'=>'(Sila Pilih)',
                            'class'=>'form-control select2me',

                        ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?></label>
                        <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeDropDownList($model, 'enter_by', $user, 
                        [
                            'prompt'=>'(Sila Pilih)',
                            'class'=>'form-control select2me',

                        ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'enter_by'); ?></label>
                        <span class="help-block"><?= Html::error($model,'enter_by'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'enter_date',['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'enter_date'); ?></label>
                        <span class="help-block"><?= Html::error($model,'enter_date'); ?></span>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeDropDownList($model, 'verified_by', $user_verified, 
                        [
                            'prompt'=>'(Sila Pilih)',
                            'class'=>'form-control select2me',

                        ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'verified_by'); ?></label>
                        <span class="help-block"><?= Html::error($model,'verified_by'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'verified_date',['class'=>'form-control date-picker','data-date-format'=>'yyyy-mm-dd']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'verified_date'); ?></label>
                        <span class="help-block"><?= Html::error($model,'verified_date'); ?></span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeDropDownList($model, 'data_status', $status_data, 
                        [
                            'prompt'=>'(Sila Pilih)',
                            'class'=>'form-control',

                        ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'data_status'); ?></label>
                        <span class="help-block"><?= Html::error($model,'data_status'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Carian', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
