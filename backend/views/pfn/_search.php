<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupState;
use frontend\models\LookupRole;
use common\models\LookupDistrict;
use common\models\LookupKampung;
use common\models\LookupMukim;
use common\models\LookupBahagian;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupPfnCategory;

$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
$subbase = ArrayHelper::map(LookupSubBase::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_id])->asArray()->all(),'cluster_id','cluster');
$kampung = ArrayHelper::map(LookupKampung::find()->where(['cluster_id'=>$model->cluster_id])->asArray()->all(),'kampung_id','kampung');
$mukim = ArrayHelper::map(LookupMukim::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'mukim_id','mukim');
$bahagian = ArrayHelper::map(LookupBahagian::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'bahagian_id', 'bahagian');

$negara = ArrayHelper::map(LookupPfnCategory::find()->asArray()->all(), 'cat_id', 'cat_name');
?>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

     <div class="row">
        <div class="portlet-body form">
            <div class="form-body">

                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'pfn_name',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'pfn_name'); ?></label>
                        <span class="help-block"><?= Html::error($model,'pfn_name'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeDropDownList($model, 'cat_id', $negara, 
                        [
                            'prompt'=>'(Sila Pilih)','id'=>'category',
                            'class'=>'form-control',

                        ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'cat_id'); ?></label>
                        <span class="help-block"><?= Html::error($model,'cat_id'); ?></span>
                    </div>
                </div>
            <div class="col-md-3">
                <div class="form-group form-md-line-input">
                    <?= Html::activeDropDownList($model, 'status_audit',
                     [
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                     ], 
                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'status_audit'); ?></label>
                    <span class="help-block"><?= Html::error($model,'status_audit'); ?></span>
                </div>
            </div>
                                <div class="col-md-3">
                <div class="form-group form-md-line-input">
                    <?= Html::activeDropDownList($model, 'status_rangkaian',
                     [
                        'Ya' => 'Ya',
                        'Tidak' => 'Tidak',
                     ], 
                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'status_rangkaian'); ?></label>
                    <span class="help-block"><?= Html::error($model,'status_rangkaian'); ?></span>
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
                                            'prompt'=>'(Sila Pilih)','id'=>'state_pfn',
                                                'onchange'=>
                                                'JS: var id = (this.value);
                                                if (id == 21) {
                                                    $.post( "'.Yii::$app->urlManager->createUrl(['pfn/listbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#bahagian " ).html( data );});
                                                }
                                                else if(id == 22){
                                                    $.post( "'.Yii::$app->urlManager->createUrl(['pfn/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#johordistrict " ).html( data );});
                                                } else {
                                                    $.post( "'.Yii::$app->urlManager->createUrl(['pfn/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district " ).html( data );});
                                                };',
                                                    /*'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});*',*/
                                            'class'=>'form-control state_drilldown']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                                </div>
                            </div>
                            <div style="display:none;" class="johor_pfn"> <!-- Johor SECTION -->
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'district_id', $district, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listmukim','id'=>'']).'"+$(this).val(), function( data ) {$( "select#mukim_johor" ).html( data );});',
                                                'prompt'=>'','id'=>'johordistrict',
                               
                                                'class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'mukim_id', $mukim, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listjohorsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbasejohor" ).html( data );});',
                                                'prompt'=>'','id'=>'mukim_johor',
                                                'class'=>'form-control',

                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'mukim_id'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'mukim_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#clusterjohor" ).html( data );});',
                                                'prompt'=>'','id'=>'subbasejohor',   
                                                'class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_id'); ?> </label>
                                            <span class="help-block"><?= Html::error($model,'sub_base_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'cluster_id', $cluster, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampungjohor" ).html( data );});',
                                                'prompt'=>'','id'=>'clusterjohor',   
                                                'class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'cluster_id'); ?> </label>
                                                <span class="help-block"><?= Html::error($model,'cluster_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'kampung_id', $kampung, 
                                            [
                                                'prompt'=>'','id'=>'kampungjohor',
                                                'class'=>'form-control',

                                            ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none;" class="sarawak_pfn"> <!-- SARAWAK SECTION -->
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'bahagian_id', $bahagian, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listdistrictbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district_bahagian" ).html( data );});',
                                                'prompt'=>'','id'=>'bahagian',   
                                                'class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'bahagian_id'); ?> </label>
                                                <span class="help-block"><?= Html::error($model,'bahagian_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'district_id', $district, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbasesarawak" ).html( data );});',
                                                'prompt'=>'','id'=>'district_bahagian',   
                                                'class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> </label>
                                                <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#clustersarawak" ).html( data );});',
                                                'prompt'=>'','id'=>'subbasesarawak',   
                                                'class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_id'); ?> </label>
                                                <span class="help-block"><?= Html::error($model,'sub_base_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'cluster_id', $cluster, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampungsarawak" ).html( data );});',
                                                'prompt'=>'','id'=>'clustersarawak',   
                                                'class'=>'form-control']); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'cluster_id'); ?> </label>
                                                <span class="help-block"><?= Html::error($model,'cluster_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'kampung_id', $kampung, 
                                            [
                                                'prompt'=>'','id'=>'kampungsarawak',
                                                'class'=>'form-control',

                                            ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none;" class="other_state_pfn"> <!-- Other State SECTION -->
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'district_id', $district, 
                                            [
                                                'prompt'=>'','id'=>'district',
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase_other" ).html( data );});',
                                                'class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster_other" ).html( data );});',
                                                'prompt'=>'','id'=>'subbase_other',
                                                'class'=>'form-control',
                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_id'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'sub_base_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'cluster_id', $cluster, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['pfn/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung_other" ).html( data );});',
                                                'prompt'=>'','id'=>'cluster_other',
                                                'class'=>'form-control',
                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'cluster_id'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'cluster_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'kampung_id', $kampung, 
                                            [
                                                'prompt'=>'','id'=>'kampung_other',
                                                'class'=>'form-control',
                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                                    </div>
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





