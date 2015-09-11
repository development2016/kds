<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
//echo Yii::getVersion();
$this->title = 'Harap Maaf !';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3 class="form-title"><?= Html::encode($this->title) ?></h3>
<?php $form = ActiveForm::begin(); ?>

<p>
    No Kad Pengenalan <b><?= $ic_no; ?></b> Yang Anda Masukkan Tidak Wujud Dalam Pangkalan Data <b>Kami</b>. Sila Masukkan No Kad Pengenalan Yang Di Daftarkan
</p>
<br>
<p>
	<?= Html::a('Kembali', ['user/reset']) ?>

	<?= Html::a('Utama', ['site/login'],['class'=>'utama']) ?>
</p>

<?php ActiveForm::end(); ?>