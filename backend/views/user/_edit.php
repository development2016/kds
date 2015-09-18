<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;

use common\models\LookupKampung;
use common\models\LookupMukim;
use common\models\LookupAgama;
use common\models\LookupBangsa;
use common\models\LookupPerkahwinan;
use common\models\LookupIncome;


$state = ArrayHelper::map(LookupState::find()->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');


$kampung = ArrayHelper::map(LookupKampung::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'kampung_id','kampung');


$citizen = array('Warganegara'=>'Warganegara','Bukan Warganegara'=>'Bukan Warganegara','Penduduk Tetap'=>'Penduduk Tetap');


$agama = ArrayHelper::map(LookupAgama::find()->asArray()->all(), 'id', 'agama');
$bangsa = ArrayHelper::map(LookupBangsa::find()->asArray()->all(), 'id', 'bangsa');
$perkahwinan = ArrayHelper::map(LookupPerkahwinan::find()->asArray()->all(), 'id', 'status_perkahwinan');
$pendapatan = ArrayHelper::map(LookupIncome::find()->asArray()->all(), 'id', 'income');

$state_area = ArrayHelper::map(LookupState::find()->asArray()->all(), 'state_id', 'state');
$district_area = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_area_id])->asArray()->all(), 'district_id', 'district');
$subbase_area = ArrayHelper::map(LookupSubBase::find()->where(['district_id'=>$model->district_area_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster_area = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_area_id])->asArray()->all(),'cluster_id','cluster');
$kampung_area = ArrayHelper::map(LookupKampung::find()->where(['cluster_id'=>$model->cluster_area_id])->asArray()->all(),'kampung_id','kampung');



/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

<?php $form = ActiveForm::begin(); ?>


    <div class="form-wizard">
        <div class="form-body">


            <div class="caption font-green-haze">
                <span class="caption-subject bold uppercase"> Maklumat Peribadi</span>
            </div>
            <br>

            <div class="row">
                <div class="portlet-body form">
                    <div class="form-body">

                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'nama',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'nama'); ?> <span class="required">*</span></label>
                                <span class="help-block"><?= Html::error($model,'nama'); ?></span>

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
                                <?= Html::activeTextInput($model,'ic_no',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'ic_no'); ?> <span class="required">*</span></label>
                                <span class="help-block"><?= Html::error($model,'ic_no'); ?></span>
                                                                        
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'ic_no_old',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'ic_no_old'); ?></label>
                                <span class="help-block"><?= Html::error($model,'ic_no_old'); ?></span>
                                                                        
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="portlet-body form">
                    <div class="form-body">

                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'address',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'address'); ?></label>
                                <span class="help-block"><?= Html::error($model,'address'); ?></span>
                                                                      
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
                                <?= Html::activeTextInput($model,'poskod',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'poskod'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'poskod'); ?></span>
                                                                      
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
                                    <?= Html::activeDropDownList($model, 'state_id', $state, 
                                    [
                                    'prompt'=>'(Sila Pilih)','id'=>'state',
                                    'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});',

                                    'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'district_id', $district, 
                                    [
                                        'prompt'=>'(Sila Pilih)','id'=>'district',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase" ).html( data );});',

                                        'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'mukim',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'mukim'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'mukim'); ?></span>
                                                                        
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeDropDownList($model, 'kampung_id', $kampung, 
                                            [
                                                'prompt'=>'(Sila Pilih)','id'=>'district',
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung" ).html( data );});',

                                           'class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?> </label>
                                            <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
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
                                    <?= Html::activeDropDownList($model, 'bangsa', $bangsa, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'bangsa'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'bangsa'); ?></span>
                                </div>
                            </div>

                        
                        <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'agama', $agama, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'agama'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'agama'); ?></span>
                                </div>
                        </div>
                        
                        <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeDropDownList($model, 'kewarganegaraan', $citizen, 
                                            [
                                                'prompt'=>'(Sila Pilih)',
                                                'class'=>'form-control',

                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'kewarganegaraan'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'kewarganegaraan'); ?></span>
                                        </div>
                                    </div>
                        <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'jantina',
                                     [
                                        'Lelaki' => 'Lelaki',
                                        'Perempuan' => 'Perempuan',
                                     ], 
                                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'jantina'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'jantina'); ?></span>
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
                                    <?= Html::activeDropDownList($model, 'status_perkahwinan', $perkahwinan, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'status_perkahwinan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'status_perkahwinan'); ?></span>
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'tarikh_lahir',['class'=>'form-control date-picker','data-date-format'=>'dd/mm/yyyy']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_lahir'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'tarikh_lahir'); ?></span>
                                                                      
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="portlet-body form">
                    <div class="form-body">

                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'email',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'email'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'email'); ?></span>
                                                                      
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
                                <?= Html::activeTextInput($model,'mobile_no',['class'=>'form-control','id'=>'mask_mobile']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'mobile_no'); ?></label>
                                <span class="help-block"><?= Html::error($model,'mobile_no'); ?></span>
                                                                      
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'home_no',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'home_no'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'home_no'); ?></span>
                                                                      
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'no_tel_pej',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'no_tel_pej'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'no_tel_pej'); ?></span>
                                                                      
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'no_akaun',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'no_akaun'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'no_akaun'); ?></span>
                                                                      
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="portlet-body form">
                    <div class="form-body">
                        
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'pekerjaan',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'pekerjaan'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'pekerjaan'); ?></span>
                                                                      
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
                                <?= Html::activeTextInput($model,'jawatan',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'jawatan'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'jawatan'); ?></span>
                                                                      
                            </div>
                        </div>
                        <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'pendapatan', $pendapatan, 
                                    [
                                        'prompt'=>'(Sila Pilih)',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'pendapatan'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'pendapatan'); ?></span>
                                </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="caption font-green-haze">
                <span class="caption-subject bold uppercase"> Maklumat Tugasan (Kawasan Kerja)</span>
            </div>
            <br>

            <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'state_area_id', $state_area, 
                                    [
                                    'prompt'=>'(Sila Pilih)','id'=>'state_area',
                                    'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listdistrictarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district_area" ).html( data );});',

                                    'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'state_area_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'district_area_id', $district_area, 
                                    [
                                        'prompt'=>'(Sila Pilih)','id'=>'district_area',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listsubbasearea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#sub_base_area" ).html( data );});',

                                        'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'district_area_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'sub_base_area_id', $subbase_area, 
                                    [
                                        'prompt'=>'(Sila Pilih)','id'=>'sub_base_area',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listclusterarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster_area" ).html( data );});',

                                        'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_area_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($model,'sub_base_id'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'cluster_area_id', $cluster_area, 
                                    [
                                        'prompt'=>'(Sila Pilih)','id'=>'cluster_area',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listkampungarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung_area" ).html( data );});',

                                        'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'cluster_area_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($model,'cluster_id'); ?></span>
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
                                    <?= Html::activeDropDownList($model, 'kampung_area_id', $kampung_area, 
                                    [
                                        'prompt'=>'(Sila Pilih)','id'=>'kampung_area',
    
                                        'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'kampung_area_id'); ?> </label>
                                    <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeDropDownList($model, 'status_area',
                                     [
                                        'Microworker Train' => 'Microworker Train',
                                        'Microworker Train & Task' => 'Microworker Train & Task',
                                     ], 
                                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'status_area'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'status_area'); ?></span>
                                </div>
                            </div>
                

                        </div>
                    </div>
            </div>


        </div>

    </div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


