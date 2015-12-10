<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupKampung;
use common\models\LookupDistrict;

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
    $district = ArrayHelper::map(LookupDistrict::find()->joinWith('statejoin')->orderBy('lookup_state.state_id, lookup_district.state_id')->all(),'district_id','district','statejoin.state');
    $kampung = ArrayHelper::map(LookupKampung::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'kampung_id','kampung');
}


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
                        <?= Html::activeTextInput($model,'nama',['class'=>'form-control']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'nama'); ?></label>
                        <span class="help-block"><?= Html::error($model,'nama'); ?></span>
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
                            'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['volunteer/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung" ).html( data );});',
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
                           <?= Html::activeDropDownList($model, 'district_id', $district, 
                            [
                                'prompt'=>'','id'=>'district',
                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['volunteer/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung" ).html( data );});',
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
                <?php } ?>



            </div>
        </div>
    </div>
    

    <div class="form-group">
        <?= Html::submitButton('Carian', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
