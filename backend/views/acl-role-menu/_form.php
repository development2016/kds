<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\User;
use yii\helpers\ArrayHelper;
use backend\models\LookupRole;

/* @var $this yii\web\View */
/* @var $model backend\models\AclRoleMenu */
/* @var $form yii\widgets\ActiveForm */
$user = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'nama');
$role = ArrayHelper::map(LookupRole::find()->asArray()->all(), 'role_id', 'role');


?>


    <?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="portlet-body form">
        <div class="form-body">
			<div class="col-md-12">
		        <div class="form-group form-md-line-input">
		            <?= Html::activeDropDownList($model, 'user_id', $user, 
		            [
		                'prompt'=>'(Sila Pilih)',
		                'class'=>'form-control',

		            ]); ?>
		            <label for="form_control_1"><?= Html::activeLabel($model,'user_id'); ?></label>
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
								<label><?= Html::activeLabel($model,'menu_id'); ?></label>
											<div class="md-checkbox-list">
												<?php foreach ($model_menu as $key => $value) { ?>
												<div class="md-checkbox">
													<input type="checkbox" id="checkbox<?php echo $value['menu_id'] ?>" name="AclRoleMenu[menu_id][]" class="md-check menu_<?php echo $value['menu_id'] ?>" value="<?php echo $value['menu_id'] ?>">
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


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

