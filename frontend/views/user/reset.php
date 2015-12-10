<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
//echo Yii::getVersion();
$this->title = 'Reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3 class="form-title"><?= Html::encode($this->title) ?></h3>
<?php $form = ActiveForm::begin(); ?>
<div class="form-group form-md-line-input has-error">
    <div class="input-icon right">
        <?= Html::activeTextInput($model,'ic_no',['id'=>'ic_no','class'=>'form-control']); ?>
        <label for="ic_no"><?= Html::activeLabel($model,'ic_no'); ?></label>
        <span class="help-block"><?= Html::error($model,'ic_no'); ?></span>
            <i class="icon-credit-card"></i>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Hantar', ['id'=>'btn','class' => 'btn blue', 'name' => 'login-button','disabled'=>'disabled']) ?>
</div>
<div class="create-account">
<p>
    Jika Anda Lupa Maklumat Anda , Sila Berjumpa Dengan Penyelia Yang Bertugas.
</p>
</div>
<br>
<p>
<?= Html::a('Kembali', ['site/login']) ?>
</p>
<?php ActiveForm::end(); ?>