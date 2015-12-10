<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
//echo Yii::getVersion();
$this->title = 'Kemaskini Kata Laluan';
?>
<h3 class="form-title"><?= Html::encode($this->title) ?></h3>
<?php $form = ActiveForm::begin(); ?>
<p><span>Nama Pengguna : <?= $model->username; ?></span></p>
<br>
<div class="form-group form-md-line-input has-error">
    <div class="input-icon right">
        <?= Html::activePasswordInput($model,'password_hash',['id'=>'form_control_1','class'=>'form-control']); ?>
        <label for="form_control_1"><?= Html::activeLabel($model,'password_hash'); ?></label>
        <span class="help-block"><?= Html::error($model,'password_hash'); ?></span>
            <i class="icon-key"></i>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton('Kemaskini', ['class' => 'btn blue', 'name' => 'login-button']) ?>
</div>
<br>
<p>
<?= Html::a('Kembali', ['site/login']) ?>
</p>
<?php ActiveForm::end(); ?>