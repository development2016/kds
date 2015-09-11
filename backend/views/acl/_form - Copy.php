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
$user = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'nama');
$role = ArrayHelper::map(LookupRole::find()->asArray()->all(), 'role_id', 'role');


?>


<?php $form = ActiveForm::begin(); ?>
 <?=$form->errorSummary($model);?>
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

				<div class="form-group form-md-checkboxes">
					<label for="form_control_1"><?= Html::activeLabel($model,'data_state'); ?></label>
					<div class="md-checkbox-list">
						<?php $i=0; foreach ($model_menu as $key => $val) { $i++; ?>
						<div class="md-checkbox">
							<input type="checkbox" id="checkbox_menu_<?php echo $val['menu_id']; ?>" name="Acl[menu_id][<?php echo $i; ?>]" class="md-check menu_<?php echo $val['menu_id']; ?>" value="<?php echo $val['menu_id'] ?>">
							<label for="checkbox_menu_<?php echo $val['menu_id']; ?>">
							<span></span>
							<span class="check"></span>
							<span class="box"></span>
							<?php echo $val['menu']; ?> </label>
							

								<div id="menu_state">
									<?php $model_state = LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->all(); 
										 $e=0; foreach ($model_state as $key => $value) { $e++; ?>
										 <div class="md-checkbox">
										 	<input type="checkbox" id="checkbox<?php echo $value['state_id'] ?><?php echo $val['menu_id'] ?>" name="Acl[data_state][<?php echo $i; ?>][<?php echo $e; ?>]" class="md-check state_<?php echo $value['state_id']; ?><?php echo $i; ?>" value="<?php echo $value['state_id'] ?>">
										 	<label for="checkbox<?php echo $value['state_id'] ?><?php echo $val['menu_id'] ?>">
	                                                <span></span>
	                                                <span class="check"></span>
	                                                <span class="box"></span>
	                                                <?php echo $value['state']; ?> </label>
	                                                
	                                                <div id="menu_district">
	                                                		<?php $model_district = LookupDistrict::find()->where(['state_id'=>$value['state_id']])->all(); 
										 					 foreach ($model_district as $key => $valueD) {?>
										 					<div class="md-checkbox">
											 					<input type="checkbox" id="checkboxD" name="" class="md-check">
											 					<label for="checkboxD">
				                                                <span></span>
				                                                <span class="check"></span>
				                                                <span class="box"></span>
				                                                <?php echo $valueD['district']; ?> </label>

				                                                <div id="menu_kampung">
				                                                	<?php $model_kampung = LookupKampung::find()->where(['district_id'=>$valueD['district_id']])->all(); 
										 					 		foreach ($model_kampung as $key => $valueK) {?>
										 					 		<div class="md-checkbox">
													 					<input type="checkbox" id="checkboxK" name="" class="md-check">
													 					<label for="checkboxK">
						                                                <span></span>
						                                                <span class="check"></span>
						                                                <span class="box"></span>
						                                                <?php echo $valueK['kampung']; ?> </label>
						                                            </div>

										 					 		<?php } ?>

				                                                </div>
										 					</div>
										 					 <?php } ?>
	                                                </div>
										 </div>
									<?php } ?>
								</div>
						
								
						</div>
						<?php } ?>

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

</div>
