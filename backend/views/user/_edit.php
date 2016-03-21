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
use common\models\LookupBahagian;

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
$subbase_area1 = ArrayHelper::map(LookupSubBase::find()->where(['mukim_id'=>$model->mukim_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster_area = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_area_id])->asArray()->all(),'cluster_id','cluster');
$kampung_area = ArrayHelper::map(LookupKampung::find()->where(['cluster_id'=>$model->cluster_area_id])->asArray()->all(),'kampung_id','kampung');
$mukim = ArrayHelper::map(LookupMukim::find()->where(['district_id'=>$model->district_area_id])->asArray()->all(),'mukim_id','mukim');
$bahagian = ArrayHelper::map(LookupBahagian::find()->where(['state_id'=>$model->state_area_id])->asArray()->all(), 'bahagian_id', 'bahagian');



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

                        <div class="col-md-4">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'poskod',['class'=>'form-control']); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'poskod'); ?> </label>
                                <span class="help-block"><?= Html::error($model,'poskod'); ?></span>
                                                                      
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'mukim',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'mukim'); ?></label>
                                    <span class="help-block"><?= Html::error($model,'mukim'); ?></span>
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
                                        'prompt'=>'(Sila Pilih)','id'=>'',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#daerah" ).html( data );});',

                                        'class'=>'form-control']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?></label>
                                        <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input">
                                <?= Html::activeDropDownList($model, 'district_id', $district, 
                                    [
                                        'prompt'=>'','id'=>'daerah',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung" ).html( data );});',

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
                                        'class'=>'form-control',

                                    ]); ?>
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

                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <?= Html::activeDropDownList($model, 'state_area_id', $state_area, 
                                                [
                                                    'prompt'=>'(Sila Pilih)','id'=>'state_mikroworker',
                                                    'onchange'=>
                                                    'JS: var id = (this.value);
                                                    if (id == 21) {
                                                        $.post( "'.Yii::$app->urlManager->createUrl(['user/listbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#bahagian " ).html( data );});
                                                    }
                                                    else if(id == 22){
                                                        $.post( "'.Yii::$app->urlManager->createUrl(['user/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#johordistrict " ).html( data );});
                                                    } else {
                                                        $.post( "'.Yii::$app->urlManager->createUrl(['user/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district " ).html( data );});
                                                    };',
                                                        /*'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});*',*/

                                                    'class'=>'form-control state_drilldown']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'state_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'state_area_id'); ?></span>
                                        </div>
                                    </div>
                                    <div style="display:none;" class="johor_mikro"> <!-- Johor SECTION -->
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'district_area_id', $district_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listmukim','id'=>'']).'"+$(this).val(), function( data ) {$( "select#mukim_johor" ).html( data );});',
                                                        'prompt'=>'','id'=>'johordistrict',
                               
                                                        'class'=>'form-control']); ?>
                                                        <label for="form_control_1"><?= Html::activeLabel($model,'district_area_id'); ?> <span class="required">*</span></label>
                                                        <span class="help-block"><?= Html::error($model,'district_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'mukim_id', $mukim, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listjohorsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbasejohor" ).html( data );});',
                                                        'prompt'=>'','id'=>'mukim_johor',
                                                        'class'=>'form-control',

                                                    ]); ?>
                                                <label for="form_control_1"><?= Html::activeLabel($model,'mukim_id'); ?></label>
                                                <span class="help-block"><?= Html::error($model,'mukim_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'sub_base_area_id', $subbase_area1, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listclusterarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#clusterjohor" ).html( data );});',
                                                        'prompt'=>'','id'=>'subbasejohor',   
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_area_id'); ?> </label>
                                                    <span class="help-block"><?= Html::error($model,'sub_base_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'cluster_area_id', $cluster_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listkampungarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampungjohor" ).html( data );});',
                                                        'prompt'=>'','id'=>'clusterjohor',   
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'cluster_area_id'); ?> </label>
                                                    <span class="help-block"><?= Html::error($model,'cluster_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'kampung_area_id', $kampung_area, 
                                                    [
                                                        'prompt'=>'','id'=>'kampungjohor',
                                                        'class'=>'form-control',

                                                    ]); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'kampung_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'kampung_area_id'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display:none;" class="sarawak_mikro"> <!-- SARAWAK SECTION -->
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'bahagian_id', $bahagian, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listdistrictbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district_bahagian" ).html( data );});',
                                                        'prompt'=>'','id'=>'bahagian',   
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'bahagian_id'); ?> </label>
                                                    <span class="help-block"><?= Html::error($model,'bahagian_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'district_area_id', $district_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listsubbasearea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbasesarawak" ).html( data );});',
                                                        'prompt'=>'','id'=>'district_bahagian',   
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'district_area_id'); ?> </label>
                                                    <span class="help-block"><?= Html::error($model,'district_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'sub_base_area_id', $subbase_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listclusterarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#clustersarawak" ).html( data );});',
                                                        'prompt'=>'','id'=>'subbasesarawak',   
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_area_id'); ?> </label>
                                                    <span class="help-block"><?= Html::error($model,'sub_base_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'cluster_area_id', $cluster_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listkampungarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampungsarawak" ).html( data );});',
                                                        'prompt'=>'','id'=>'clustersarawak',   
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'cluster_area_id'); ?> </label>
                                                    <span class="help-block"><?= Html::error($model,'cluster_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'kampung_area_id', $kampung_area, 
                                                    [
                                                        'prompt'=>'','id'=>'kampungsarawak',
                                                        'class'=>'form-control',

                                                    ]); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'kampung_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'kampung_area_id'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display:none;" class="other_state_mikro"> <!-- Other State SECTION -->
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'district_area_id', $district_area, 
                                                    [
                                                        'prompt'=>'','id'=>'district',
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listsubbasearea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase_other" ).html( data );});',
                                                        'class'=>'form-control']); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'district_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'district_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'sub_base_area_id', $subbase_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listclusterarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster_other" ).html( data );});',
                                                        'prompt'=>'','id'=>'subbase_other',
                                                        'class'=>'form-control',
                                                    ]); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'sub_base_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'cluster_area_id', $cluster_area, 
                                                    [
                                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['user/listkampungarea','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung_other" ).html( data );});',
                                                        'prompt'=>'','id'=>'cluster_other',
                                                        'class'=>'form-control',
                                                    ]); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'cluster_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'cluster_area_id'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-md-line-input">
                                                <?= Html::activeDropDownList($model, 'kampung_area_id', $kampung_area, 
                                                    [
                                                        'prompt'=>'','id'=>'kampung_other',
                                                        'class'=>'form-control',
                                                    ]); ?>
                                                    <label for="form_control_1"><?= Html::activeLabel($model,'kampung_area_id'); ?> <span class="required">*</span></label>
                                                    <span class="help-block"><?= Html::error($model,'kampung_area_id'); ?></span>
                                            </div>
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


