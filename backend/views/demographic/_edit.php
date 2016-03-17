<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\LookupState;
use common\models\LookupDistrict;
use common\models\LookupSubBase;
use common\models\LookupCluster;
use common\models\LookupKampung;
use common\models\LookupJenisKampung;
use common\models\LookupCorakPenempatan;
use common\models\LookupBilanganRumah;
use common\models\LookupJenisPerumahan;
use common\models\LookupMukim;
use common\models\LookupBahagian;
use yii\helpers\Url;

$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
$subbase = ArrayHelper::map(LookupSubBase::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'sub_base_id','sub_base');
$subbase1 = ArrayHelper::map(LookupSubBase::find()->where(['mukim_id'=>$model->mukim_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_id])->asArray()->all(),'cluster_id','cluster');
$kampung = ArrayHelper::map(LookupKampung::find()->where(['cluster_id'=>$model->cluster_id])->asArray()->all(),'kampung_id','kampung');
$mukim = ArrayHelper::map(LookupMukim::find()->where(['district_id'=>$model->district_id])->asArray()->all(),'mukim_id','mukim');
$bahagian = ArrayHelper::map(LookupBahagian::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'bahagian_id', 'bahagian');

$jeniskg = ArrayHelper::map(LookupJenisKampung::find()->asArray()->all(), 'id', 'jenis_kampung');
$corak = ArrayHelper::map(LookupCorakPenempatan::find()->asArray()->all(), 'id', 'corak_penempatan');
$bilrumah = ArrayHelper::map(LookupBilanganRumah::find()->asArray()->all(), 'id', 'bil_rumah');
$jenisrmh = ArrayHelper::map(LookupJenisPerumahan::find()->asArray()->all(), 'id', 'jenis_perumahan');
?>

<div class="tabbable-line">
    <ul class="nav nav-tabs ">
        <li class="active">
            <a href="#tab_1" data-toggle="tab">
             Maklumat Demographic </a>
        </li>
        <li>
            <a href="#tab_2" data-toggle="tab">
            Info </a>
        </li>

    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php $form = ActiveForm::begin(); ?>
            <?=$form->errorSummary($model);?>

            <p>Ruangan Yang Bertanda <span class="required">*</span> Adalah Wajib Diisi.</p>
                <?php if(Yii::$app->session->hasFlash('update')):?>
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert"></button>
                         <?php echo  Yii::$app->session->getFlash('update'); ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'nama_ketua_kampung',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'nama_ketua_kampung'); ?> <span class="required">*</span></label>
                                    <span class="help-block"><?= Html::error($model,'nama_ketua_kampung'); ?></span>
                                    
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
                                    
                                    <?= Html::activeTextInput($model,'no_tel',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'no_tel'); ?> </span></label>
                                    <span class="help-block"><?= Html::error($model,'no_tel'); ?></span>
                                    
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
                                            'prompt'=>'(Sila Pilih)','id'=>'state_demografic',
                                                'onchange'=>
                                                'JS: var id = (this.value);
                                                if (id == 21) {
                                                    $.post( "'.Yii::$app->urlManager->createUrl(['demographic/listbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#bahagian " ).html( data );});
                                                }
                                                else if(id == 22){
                                                    $.post( "'.Yii::$app->urlManager->createUrl(['demographic/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#johordistrict " ).html( data );});
                                                } else {
                                                    $.post( "'.Yii::$app->urlManager->createUrl(['demographic/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district " ).html( data );});
                                                };',
                                                    /*'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['people/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});*',*/
                                            'class'=>'form-control state_drilldown']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                                </div>
                            </div>
                            <div style="display:none;" class="johor_demografic"> <!-- Johor SECTION -->
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'district_id', $district, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listmukim','id'=>'']).'"+$(this).val(), function( data ) {$( "select#mukim_johor" ).html( data );});',
                                                'prompt'=>'','id'=>'johordistrict',
                               
                                                'class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'mukim_id', $mukim, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listjohorsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbasejohor" ).html( data );});',
                                                'prompt'=>'','id'=>'mukim_johor',
                                                'class'=>'form-control',

                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'mukim_id'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'mukim_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'sub_base_id', $subbase1, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#clusterjohor" ).html( data );});',
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
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampungjohor" ).html( data );});',
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
                                                <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?> <span class="required">*</span></label>
                                                <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none;" class="sarawak_demografic"> <!-- SARAWAK SECTION -->
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'bahagian_id', $bahagian, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listdistrictbahagian','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district_bahagian" ).html( data );});',
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
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbasesarawak" ).html( data );});',
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
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#clustersarawak" ).html( data );});',
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
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampungsarawak" ).html( data );});',
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
                                                <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?> <span class="required">*</span></label>
                                                <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none;" class="other_state_demografic"> <!-- Other State SECTION -->
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'district_id', $district, 
                                            [
                                                'prompt'=>'','id'=>'district',
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase_other" ).html( data );});',
                                                'class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster_other" ).html( data );});',
                                                'prompt'=>'','id'=>'subbase_other',
                                                'class'=>'form-control',
                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'sub_base_id'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'sub_base_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeDropDownList($model, 'cluster_id', $cluster, 
                                            [
                                                'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung_other" ).html( data );});',
                                                'prompt'=>'','id'=>'cluster_other',
                                                'class'=>'form-control',
                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'cluster_id'); ?> <span class="required">*</span></label>
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
                                            <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?> <span class="required">*</span></label>
                                            <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input">
                            
                            <?= Html::activeDropDownList($model, 'jenis_kampung_id', $jeniskg, 
                            [
                                'prompt'=>'(Sila Pilih)','id'=>'jenis_kampung_id',
                                'class'=>'form-control',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'jenis_kampung_id'); ?> </label>
                            <span class="help-block"><?= Html::error($model,'jenis_kampung_id'); ?></span>
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input">
                            
                            <?= Html::activeDropDownList($model, 'corak_penempatan_id', $corak, 
                            [
                                'prompt'=>'(Sila Pilih)','id'=>'corak_penempatan_id',
                                'class'=>'form-control',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'corak_penempatan_id'); ?> </label>
                            <span class="help-block"><?= Html::error($model,'corak_penempatan_id'); ?></span>
                            
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-md-line-input">
                            
                            <?= Html::activeDropDownList($model, 'jenis_perumahan_id', $jenisrmh, 
                            [
                                'prompt'=>'(Sila Pilih)','id'=>'jenis_perumahan_id',
                                'class'=>'form-control',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'jenis_perumahan_id'); ?> </label>
                            <span class="help-block"><?= Html::error($model,'jenis_perumahan_id'); ?></span>
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input">
                            
                            <?= Html::activeDropDownList($model, 'bilangan_rumah', $bilrumah, 
                            [
                                'prompt'=>'(Sila Pilih)','id'=>'bilangan_rumah',
                                'class'=>'form-control',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'bilangan_rumah'); ?> </label>
                            <span class="help-block"><?= Html::error($model,'bilangan_rumah'); ?></span>
                            
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="col-md-5">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'aktiviti_penduduk_kampung',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'aktiviti_penduduk_kampung'); ?> </span></label>
                                    <span class="help-block"><?= Html::error($model,'aktiviti_penduduk_kampung'); ?></span>
                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeTextInput($model,'koordinate',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'koordinate'); ?> </span></label>
                                    <span class="help-block"><?= Html::error($model,'koordinate'); ?></span>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['id'=>'button-submit','class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>  
                <?php ActiveForm::end(); ?>
        </div>
        <div class="tab-pane" id="tab_2">
            <br>
                <?php if(Yii::$app->session->hasFlash('change')):?>
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert"></button>
                         <?php echo  Yii::$app->session->getFlash('change'); ?>
                    </div>
                <?php endif; ?>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Bil</th>
                            <th>Kemudahan</th>
                            <th>Bilangan</th>
                            <th>Aktif</th>
                            <th>Nama</th>
                            <th>Catatan</th>
                            <th>Tindakan</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php $i =0; foreach ($kemudahan as $key => $value) {  $i++ ;?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['kemudahan_awam']; ?></td>
                            <td><?php echo $value['bilangan']; ?></td>
                            <td><?php echo $value['status_kemudahan']; ?></td>
                            <td><?php echo $value['nama']; ?></td>
                            <td><?php echo $value['catatan']; ?></td>
                            <td><?= Html::a('<span class="btn default btn-xs red-stripe">Kemaskini</span>', FALSE, ['value'=>Url::to(['demographic/change','id'=>$value['ids']]),'class' => 'demographicUpdate']) ?>
                                
                                </td>
 
                        </tr>
                        
                        <?php } ?>

                    </tbody>
                    
                </table>


        </div>
    </div>
</div>