<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Komuniti Development System';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3 class="form-title"><?= Html::encode($this->title) ?></h3>
<?php $form = ActiveForm::begin(); ?>
<div class="form-group form-md-line-input has-error">
    <div class="input-icon right">
        <?= Html::activeTextInput($model,'username',['id'=>'form_control_1','class'=>'form-control']); ?>
        <label for="form_control_1"><?= Html::activeLabel($model,'username'); ?></label>
        <span class="help-block"><?= Html::error($model,'username'); ?></span>
            <i class="icon-user"></i>
    </div>
</div>
<div class="form-group form-md-line-input has-error">
    <div class="input-icon right">
        <?= Html::activePasswordInput($model,'password',['id'=>'form_control_1','class'=>'form-control']); ?>
        <label for="form_control_1"><?= Html::activeLabel($model,'password'); ?></label>
        <span class="help-block"><?= Html::error($model,'password'); ?></span>
         <i class="icon-key"></i>
    </div>   
</div>
<div class="form-group">
    <?= Html::submitButton('Login', ['class' => 'btn blue', 'name' => 'login-button']) ?>
</div>


<?php ActiveForm::end(); ?>