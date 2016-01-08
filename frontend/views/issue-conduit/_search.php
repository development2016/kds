<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupKampung;
use common\models\LookupDistrict;
use common\models\LookupState;

$role_id = Yii::$app->user->identity->role;
$user_id =  Yii::$app->user->identity->id;

$connection = \Yii::$app->db;
$sql = $connection->createCommand("SELECT * FROM acl  WHERE user_id = '".$user_id."' AND role_id = '".$role_id."' ");
$data = $sql->queryAll();

foreach ($data as $key => $value) {
    $state_id = $value['state_id'];
    $district_id = $value['district_id'];

}

if ($role_id == 4) {
    $district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$state_id])->asArray()->all(), 'district_id', 'district');
    $kampung = ArrayHelper::map(LookupKampung::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'kampung_id','kampung');

} elseif ($role_id == 3){
    $kampung = ArrayHelper::map(LookupKampung::find()->where(['district_id'=>$district_id])->asArray()->all(), 'kampung_id', 'kampung');

} else {
    $state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
    $district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
    $kampung = ArrayHelper::map(LookupKampung::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'kampung_id','kampung');
}


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
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'no_kp',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'no_kp'); ?></label>
                        <span class="help-block"><?= Html::error($model,'no_kp'); ?></span>
                    </div>
                </div>

                <?php if ($role_id == 1) { ?>


                <?php } else if ($role_id == 4 ) { ?>

                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                       <?= Html::activeDropDownList($model, 'district_id', $district, 
                        [
                            'prompt'=>'','id'=>'district',
                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['issue-conduit/getkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung" ).html( data );});',
                            'class'=>'form-control select2me',

                        ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?></label>
                        <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                    </div>
                </div>
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeDropDownList($model, 'kampung_id', $kampung, 
                            [
                                'prompt'=>'','id'=>'kampung',
                                'class'=>'form-control select2me',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?></label>
                            <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                        </div>
                    </div>
                <?php } elseif ($role_id == 3) { ?>

                    <div class="col-md-4">
                        <div class="form-group form-md-line-input">
                            <?= Html::activeDropDownList($model, 'kampung_id', $kampung, 
                            [
                                'prompt'=>'','id'=>'kampung',
                                'class'=>'form-control select2me',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?></label>
                            <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                        </div>
                    </div>
                <?php } else { ?>

                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                       
                        <?= Html::activeDropDownList($model, 'state_id', $state, 
                        [
                        'prompt'=>'(Sila Pilih)','id'=>'state',
                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['issue-conduit/getdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});',

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
                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['issue-conduit/getkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung" ).html( data );});',

                            'class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> </label>
                        <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                       
                    </div>
                </div>

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
                <?php } ?>


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

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
