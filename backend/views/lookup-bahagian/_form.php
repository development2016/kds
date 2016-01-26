<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupState;


//$negara = ArrayHelper::map(LookupCountry::find()->asArray()->all(), 'country_id', 'country');
$state = ArrayHelper::map(LookupState::find()->where(['state_id' => 21])->asArray()->all(), 'state_id', 'state');

/* @var $this yii\web\View */
/* @var $model common\models\LookupBangsa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-bahagian-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeDropDownList($model, 'state_id', $state, 
                        [
                        //'prompt'=>'(Sila Pilih)','id'=>'state',
                        //'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['lookup-district/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});',

                        'class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'state'); ?> <span class="required">*</span></label>
                        <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                    </div>
                </div>
                
                <div class="col-md-12">
        			<div class="form-group form-md-line-input">
            			<?= Html::activeTextInput($model,'bahagian',['class'=>'form-control']); ?>
            			<label for="form_control_1"><?= Html::activeLabel($model,'bahagian'); ?></label>
            			<span class="help-block"><?= Html::error($model,'bahagian'); ?></span>
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