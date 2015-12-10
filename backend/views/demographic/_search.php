<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;


$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
$subbase = ArrayHelper::map(LookupSubBase::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_id])->asArray()->all(),'cluster_id','cluster');
$kampung = ArrayHelper::map(LookupKampung::find()->where(['cluster_id'=>$model->cluster_id])->asArray()->all(),'kampung_id','kampung');
/* @var $this yii\web\View */
/* @var $model common\models\VolunteerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">

                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                       
                        <?= Html::activeDropDownList($model, 'state_id', $state, 
                        [
                        'prompt'=>'(Sila Pilih)','id'=>'state',
                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listdistrictsearch','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});',

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
                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listsubbasesearch','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase" ).html( data );});',

                            'class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> </label>
                        <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                       
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        
                        <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                        [
                            'prompt'=>'','id'=>'subbase',
                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listclustersearch','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster" ).html( data );});',
                            'class'=>'form-control',

                        ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_id'); ?></label>
                        <span class="help-block"><?= Html::error($model,'sub_base_id'); ?></span>
                        
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
                        
                       <?= Html::activeDropDownList($model, 'cluster_id', $cluster, 
                        [
                            'prompt'=>'','id'=>'cluster',
                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listkampungsearch','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung" ).html( data );});',
                            'class'=>'form-control',

                        ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'cluster_id'); ?> </label>
                        <span class="help-block"><?= Html::error($model,'cluster_id'); ?></span>
                        
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        
                        <?= Html::activeDropDownList($model, 'kampung_id', $kampung, 
                        [
                            'prompt'=>'','id'=>'kampung',
                            'class'=>'form-control',

                        ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?> </label>
                        <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                        
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