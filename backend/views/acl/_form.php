<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\User;
use yii\helpers\ArrayHelper;
use backend\models\LookupRole;
use common\models\LookupState;
use common\models\LookupDistrict;

use common\models\LookupKampung;
/* @var $this yii\web\View */
/* @var $model backend\models\AclRoleMenu */
/* @var $form yii\widgets\ActiveForm */

$role = ArrayHelper::map(LookupRole::find()->asArray()->all(), 'role_id', 'role');

$state = ArrayHelper::map(LookupState::find()->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
$kampung = ArrayHelper::map(LookupKampung::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'kampung_id','kampung');
?>

<div class="acl-form">

    <?php $form = ActiveForm::begin(); ?>



<div class="row">
    <div class="portlet-body form">
        <div class="form-body">
			<div class="col-md-12">
		        <div class="form-group form-md-line-input">
		            <?= Html::activeDropDownList($model, 'role_id', $role, 
		            [
		                'prompt'=>'(Sila Pilih)',
		                'class'=>'form-control',

		            ]); ?>
		            <label for="form_control_1"><?= Html::activeLabel($model,'role_id'); ?></label>
		        </div>
		    </div>
		</div>
	</div>
</div>

<div class="row">
    <div class="portlet-body form">
        <div class="form-body">
            <div class="col-md-12">
                <div class="form-group form-md-line-input">
  
                      <div class="col-md-4">
							<div class="form-group form-md-checkboxes">
								<label><?= Html::activeLabel($model_acl,'menu_id'); ?></label>
									<div class="md-checkbox-list">
										<?php foreach ($model_menu as $key => $value) { ?>
										<div class="md-checkbox">
											<input type="checkbox" id="checkbox<?php echo $value['menu_id'] ?>" name="AclMenu[menu_id][]" class="md-check menu_<?php echo $value['menu_id'] ?>" value="<?php echo $value['menu_id'] ?>">
											<label for="checkbox<?php echo $value['menu_id'] ?>">
											<span></span>
											<span class="check"></span>
											<span class="box"></span>
											<?php echo $value['menu']; ?> </label>
											
										
										</div>

										<?php } ?>
									</div>

							</div>

                        </div>
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
                    <?= Html::activeDropDownList($model, 'state_id', $state, 
                    [
                    'prompt'=>'(Sila Pilih)','id'=>'state',
                    'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});',

                    'class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?> <span class="required">*</span></label>
                    <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group form-md-line-input">
                    <?= Html::activeDropDownList($model, 'district_id', $district, 
                    [
                        'prompt'=>'','id'=>'district',
                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase" ).html( data );});',

                        'class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> <span class="required">*</span></label>
                    <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
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
