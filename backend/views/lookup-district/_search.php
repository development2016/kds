<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupState;

$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');

/* @var $this yii\web\View */
/* @var $model common\models\LookupBangsaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-district-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeDropDownList($model, 'state_id', $state, 
                        [
                            'prompt'=>'(Sila Pilih)','id'=>'state',
                            'class'=>'form-control',

                        ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?> </label>
                        <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'district',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'district'); ?></label>
                        <span class="help-block"><?= Html::error($model,'district'); ?></span>
                    </div>
                </div>

                
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
