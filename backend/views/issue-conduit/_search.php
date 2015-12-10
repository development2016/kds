<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupState;
use frontend\models\LookupRole;
use common\models\LookupDistrict;
use common\models\LookupKampung;
use common\models\LookupMukim;
use common\models\LookupKategoriIsu;
/* @var $this yii\web\View */
/* @var $model common\models\IssueConduitSearch */
/* @var $form yii\widgets\ActiveForm */
$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
$kampung = ArrayHelper::map(LookupKampung::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'kampung_id','kampung');

$kategori_isu = ArrayHelper::map(LookupKategoriIsu::find()->asArray()->all(), 'kategori_id', 'kategori_isu');

$start_year = '2012';
$current_year = date('Y');
$range = range($start_year, $current_year);
$years = array_combine($range, $range);

?>

<div class="issue-conduit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

     <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'name',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'name'); ?></label>
                        <span class="help-block"><?= Html::error($model,'name'); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'issue_code',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'issue_code'); ?></label>
                        <span class="help-block"><?= Html::error($model,'issue_code'); ?></span>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'no_kp',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'no_kp'); ?></label>
                        <span class="help-block"><?= Html::error($model,'no_kp'); ?></span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeDropDownList($model, 'date', $years, 
                        [
                            'prompt'=>'(Sila Pilih)','id'=>'year',
                            'class'=>'form-control',

                        ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'date'); ?></label>
                        <span class="help-block"><?= Html::error($model,'date'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">

                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                       
                        <?= Html::activeDropDownList($model, 'state_id', $state, 
                        [
                        'prompt'=>'(Sila Pilih)','id'=>'state',
                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['issue-conduit/listdistrictsearch','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});',

                        'class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?> </label>
                        <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                        
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        
                        <?= Html::activeDropDownList($model, 'district_id', $district, 
                        [
                            'prompt'=>'','id'=>'district',
                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['issue-conduit/listkampungsearch','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung" ).html( data );});',

                            'class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> </label>
                        <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                       
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">

                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        
                        <?= Html::activeDropDownList($model, 'kampung_id', $kampung, 
                        [
                            'prompt'=>'','id'=>'kampung',
                            'class'=>'form-control select2me',

                        ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?> </label>
                        <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                        
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                       
                        <?= Html::activeDropDownList($model, 'issue_category', $kategori_isu, 
                        [
                        'prompt'=>'(Sila Pilih)','id'=>'kategori',

                        'class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'issue_category'); ?> </label>
                        <span class="help-block"><?= Html::error($model,'issue_category'); ?></span>
                        
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeDropDownList($model, 'status',
                         [
                            'Aktif' => 'Aktif',
                            'Telah Selesai' => 'Telah Selesai',
                            'Menafikan' => 'Menafikan',

                         ], 

                         ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'status'); ?></label>
                        <span class="help-block"><?= Html::error($model,'status'); ?></span>
                    </div>
                </div>



            </div>
        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton('Carian', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
