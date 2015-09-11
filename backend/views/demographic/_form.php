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

$state = ArrayHelper::map(LookupState::find()->where(['kawasan_perlaksanaan'=>'Ya'])->asArray()->all(), 'state_id', 'state');
$district = ArrayHelper::map(LookupDistrict::find()->where(['state_id'=>$model->state_id])->asArray()->all(), 'district_id', 'district');
$mukim = ArrayHelper::map(LookupMukim::find()->where(['district_id'=>$model->district_id])->asArray()->all(), 'mukim_id', 'mukim');
$subbase = ArrayHelper::map(LookupSubBase::find()->where(['mukim_id'=>$model->mukim_id])->asArray()->all(),'sub_base_id','sub_base');
$cluster = ArrayHelper::map(LookupCluster::find()->where(['sub_base_id'=>$model->sub_base_id])->asArray()->all(),'cluster_id','cluster');
$kampung = ArrayHelper::map(LookupKampung::find()->where(['cluster_id'=>$model->cluster_id])->asArray()->all(),'kampung_id','kampung');

$jeniskg = ArrayHelper::map(LookupJenisKampung::find()->asArray()->all(), 'id', 'jenis_kampung');
$corak = ArrayHelper::map(LookupCorakPenempatan::find()->asArray()->all(), 'id', 'corak_penempatan');
$bilrumah = ArrayHelper::map(LookupBilanganRumah::find()->asArray()->all(), 'id', 'bil_rumah');
$jenisrmh = ArrayHelper::map(LookupJenisPerumahan::find()->asArray()->all(), 'id', 'jenis_perumahan');
?>

<?php $form = ActiveForm::begin(); ?>

<div class="form-wizard">
    <div class="form-body">
        <ul class="nav nav-pills nav-justified steps">
            <li>
                <a href="#tab1" data-toggle="tab" class="step">
                <span class="number">
                1 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Maklumat Demographic </span>
                </a>
            </li>
            <li>
                <a href="#tab2" data-toggle="tab" class="step">
                <span class="number">
                2 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Info </span>
                </a>
            </li>

        </ul>
        <div id="bar" class="progress progress-striped" role="progressbar">
            <div class="progress-bar progress-bar-success">
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <?=$form->errorSummary($model);?>
                <div class="caption font-green-haze">
                    <span class="caption-subject bold uppercase"> Maklumat Demographic</span>
                </div>
                <br>
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
                                    'prompt'=>'(Sila Pilih)','id'=>'state',
                                    'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listdistrict','id'=>'']).'"+$(this).val(), function( data ) {$( "select#district" ).html( data );});',

                                    'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'state_id'); ?> <span class="required">*</span></label>
                                    <span class="help-block"><?= Html::error($model,'state_id'); ?></span>
                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeDropDownList($model, 'district_id', $district, 
                                    [
                                        'prompt'=>'','id'=>'district',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listmukim','id'=>'']).'"+$(this).val(), function( data ) {$( "select#mukim" ).html( data );});',

                                        'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'district_id'); ?> <span class="required">*</span></label>
                                    <span class="help-block"><?= Html::error($model,'district_id'); ?></span>
                                   
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    
                                    <?= Html::activeDropDownList($model, 'mukim_id', $mukim, 
                                    [
                                        'prompt'=>'','id'=>'mukim',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listsubbase','id'=>'']).'"+$(this).val(), function( data ) {$( "select#subbase" ).html( data );});',

                                        'class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'mukim_id'); ?> <span class="required">*</span></label>
                                    <span class="help-block"><?= Html::error($model,'mukim_id'); ?></span>
                                   
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
                                    
                                    <?= Html::activeDropDownList($model, 'sub_base_id', $subbase, 
                                    [
                                        'prompt'=>'','id'=>'subbase',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listcluster','id'=>'']).'"+$(this).val(), function( data ) {$( "select#cluster" ).html( data );});',
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
                                        'prompt'=>'','id'=>'cluster',
                                        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['demographic/listkampung','id'=>'']).'"+$(this).val(), function( data ) {$( "select#kampung" ).html( data );});',
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
                                        'prompt'=>'','id'=>'kampung',
                                        'class'=>'form-control',

                                    ]); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'kampung_id'); ?> <span class="required">*</span></label>
                                    <span class="help-block"><?= Html::error($model,'kampung_id'); ?></span>
                                    
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




            </div>

            <div class="tab-pane" id="tab2">
                <div class="caption font-green-haze">
                    <span class="caption-subject bold uppercase"> Info</span>
                </div>
                <br>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Bil</th>
                            <th>Kemudahan</th>
                            <th>Bilangan</th>
                            <th>Aktif</th>
                            <th>Nama</th>
                            <th>Catatan</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php $i =0; foreach ($kemudahan as $key => $value) {  $i++ ;?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['kemudahan_awam']; ?></td>
                            <td>
                                 
                                <?= Html::activeTextInput($info,'bilangan['.$value['id'].']',['class'=>'form-control input-xsmall']); ?>
                                   
                            </td>
                            <td>
                                <?= Html::activeDropDownList($info, 'status_kemudahan['.$value['id'].']',
                                     [
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                     ], 
                                     ['prompt'=>'(Sila Pilih)','id'=>'form_control_1','class'=>'form-control']); ?>
                            </td>
                            <td><?= Html::activeTextArea($info,'nama['.$value['id'].']',['class'=>'form-control','cols'=>30,'rows'=>4]); ?></td>
                            <td><?= Html::activeTextArea($info,'catatan['.$value['id'].']',['class'=>'form-control','cols'=>30,'rows'=>4]); ?></td>
                        </tr>
                        
                        <?php } ?>

                    </tbody>
                    
                </table>





            </div>
        </div>
    </div>
        <div class="form-actions">
            
            <a href="javascript:;" class="btn default button-previous">
            Kembali </a>
            <a href="javascript:;" class="btn blue button-next">
            Seterusnya 
            </a>
            <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['id'=>'button-submit','class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>         

        </div>
</div>
<?php ActiveForm::end(); ?>