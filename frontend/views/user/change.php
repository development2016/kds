<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
//echo Yii::getVersion();
$this->title = 'Maklumat Anda';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3 class="form-title"><?= Html::encode($this->title) ?></h3>
<?php $form = ActiveForm::begin(); ?>



<p>
    <b>Nama Pengguna : </b><?= $model->username ?>
    <br>
    <br>
    <b>Nama : </b><?= $model->nama ?>
    <br>
    <b>E-mail : </b><?= $model->email ?>
    <br>
    <b>No Kad Pengenalan : </b><?= $model->ic_no ?>
    <br>

</p>
<br>
Adakah Ini Maklumat Anda ? <input type="checkbox" id="check"> <span style="display:none;" class="ya">Ya</span>
<br><br>
<div class="form-group form-md-line-input has-error" id="pass" style="display:none;">
    <div class="input-icon right">
        <?= Html::activePasswordInput($model,'password_hash',['id'=>'password','class'=>'form-control']); ?>
        <label for="password"><?= Html::activeLabel($model,'password_hash'); ?></label>
        <span class="help-block"><?= Html::error($model,'password_hash'); ?></span>
            <i class="icon-key"></i>
    </div>
</div>
<div class="form-group" style="display:none;" id="btn">
    <?= Html::submitButton('Reset', ['id'=>'btnreset','class' => 'btn blue', 'name' => 'login-button','disabled'=>'disabled']) ?>
</div>
<span class="newpass" style="display:none;">*Sila Masukkan Kata Laluan Yang Baru Untuk Menggunakan Sistem Ini</span>
<br><br>
<p>
	<?= Html::a('Kembali', ['user/reset']) ?>

	<?= Html::a('Utama', ['site/login'],['class'=>'utama']) ?>
</p>
<?php ActiveForm::end(); ?>