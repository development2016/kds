<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupHubungan;
use common\models\LookupEduLevelUnder17;
use common\models\LookupKategoriOku;
/* @var $this yii\web\View */
/* @var $model common\models\TanggunganOku */
/* @var $form yii\widgets\ActiveForm */
$umur = array('1 Tahun'=>'1 Tahun','2 Tahun'=>'2 Tahun','3 Tahun'=>'3 Tahun','4 Tahun'=>'4 Tahun','5 Tahun'=>'5 Tahun','6 Tahun'=>'6 Tahun','7 Tahun'=>'7 Tahun','8 Tahun'=>'8 Tahun','9 Tahun'=>'9 Tahun','10 Tahun'=>'10 Tahun','11 Tahun'=>'11 Tahun','12 Tahun'=>'12 Tahun','13 Tahun'=>'13 Tahun','14 Tahun'=>'14 Tahun','15 Tahun'=>'15 Tahun','16 Tahun'=>'16 Tahun','17 Tahun'=>'17 Tahun');
$hubungan = ArrayHelper::map(LookupHubungan::find()->asArray()->all(), 'id', 'hubungan');
$edu17 = ArrayHelper::map(LookupEduLevelUnder17::find()->asArray()->all(), 'id', 'edu_level_under_17');
$kategoriOku = ArrayHelper::map(LookupKategoriOku::find()->asArray()->all(), 'id', 'kategori_oku');
?>

<div class="tanggungan-oku-form">

  <?php $form = ActiveForm::begin(); ?>

                            <div class="row">
                                <div class="portlet-body form">
 
                                    <div class="form-body">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'nama',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'nama'); ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'umur', $umur, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                        
                                                <label for="form_control_1"><?= Html::activeLabel($model,'umur'); ?></label> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'hubungan', $hubungan, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                                
                                                <label for="form_control_1"><?= Html::activeLabel($model,'hubungan'); ?></label> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'no_pendaftaran',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'no_pendaftaran'); ?></label> 
                                            </div>
                                        </div>
                                     </div>

                                     <div class="form-body">
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'kategori', $kategoriOku, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                 
                                                <label for="form_control_1"><?= Html::activeLabel($model,'kategori'); ?></label> 
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'tahap_pendidikan', $edu17, 
                                                [
                                                    'prompt'=>'(Sila Pilih)',
                                                    'class'=>'form-control',

                                                ]); ?>
                                      
                                                <label for="form_control_1"><?= Html::activeLabel($model,'tahap_pendidikan'); ?></label> 
                                            </div>
                                        </div>
                                        
                                     </div>

                                     <div class="form-body">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'nama_sekolah',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'nama_sekolah'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeTextInput($model,'nota',['class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'nota'); ?></label>
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



