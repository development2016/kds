<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
//echo Yii::getVersion();
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
    <?= Html::submitButton('Login',Yii::$app->session->hasFlash('errorLogin') ? ['class' => 'btn blue', 'name' => 'login-button','disabled'=>'disabled'] : ['class' => 'btn blue', 'name' => 'login-button']) ?>
</div>
<div class="forget-password">
    <h4>Lupa Kata Laluan ?</h4>
    <p>
        Klik <b><?= Html::a('Di Sini', ['user/reset']) ?></b> Untuk Reset Kata Laluan
    </p>
</div>
<div class="create-account">
<p>
     Belum Mempunyai Akaun ? <b><?= Html::a('Daftar Sekarang', ['user/signup'],['target' => '_blank']) ?></b>
</p>
<p>
     Permohonan Akses ? <b><?= Html::a('Mohon', ['user/mohon'],['target' => '_blank']) ?></b>
</p>
</div>

<?php ActiveForm::end(); ?>