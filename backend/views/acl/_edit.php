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



 

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

    <?php ActiveForm::end(); ?>

</div>
