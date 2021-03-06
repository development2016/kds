<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupState;
use common\models\LookupDistrict;

$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');


/* @var $this yii\web\View */
/* @var $model common\models\LookupMukimSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-mukim-search">

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
                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-mukim/listdistrictsearch','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});',

                            'class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?> </label>
                            <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeDropDownList($model, 'district_id', $district, 
                            [
                                'prompt'=>'','id'=>'district',
                                'class'=>'form-control',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> </label>
                            <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeTextInput($model,'mukim',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'mukim'); ?></label>
                            <span class="help-block"><?= Html::error($model,'mukim'); ?></span>
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
