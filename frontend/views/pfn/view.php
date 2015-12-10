<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
$this->title = 'Lihat Rangkaian Fasiliti Awam';
?>
<span id="pfnView" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
  <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Rangkaian Fasiliti Awam</h1>
            </div>
            <!-- END PAGE TITLE -->

        </div>
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                   <?= Html::a('Utama', ['site/index']) ?><i class="fa fa-circle"></i>
                </li>
                <li>
                    <?= Html::a('Rangkaian Fasiliti Awam', ['pfn/index']) ?><i class="fa fa-circle"></i>
                </li>
                <li class="active">Lihat Maklumat Rangkaian Fasiliti Awam : <?= strtoupper($model->pfn_name); ?></li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light" >
                        <div class="portlet-title">
                            <div class="caption font-green-haze">
                                <i class="icon-users font-green-haze"></i>
                                <span class="caption-subject bold uppercase"> Lihat Maklumat Rangkaian Fasiliti Awam </span>
                            </div>
                            <div class="actions">
                            <?= Html::a('Permintaan',FALSE,['value'=>Url::to(['request/create','id'=>$model->pfn_id,'menu_id'=>5]),'class'=>'btn btn-circle btn-default btn-sm request-form']) ?>

                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <?php if(Yii::$app->session->hasFlash('request')):?>
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                 <?php echo  Yii::$app->session->getFlash('request'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="portlet-body">
                            <div class="panel-group accordion" id="accordion3">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
                                        Rangkaian Fasiliti Awam </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_1" class="panel-collapse in">
                                        <div class="panel-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'pfn_code'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->pfn_code;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'date'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->date;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'pfn_name'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->pfn_name;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'lokasi'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->lokasi;?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'cat_id'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->cat_id ? $model->category->cat_name : null ?></span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'alamat'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->alamat;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'poskod'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->poskod;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'state_id'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->state_id ? $model->state->state : null ?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'district_id'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->district_id ? $model->district->district : null ?></span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'mukim_id'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->mukim_id ? $model->mukim->mukim : null ?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'sub_base_id'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->sub_base_id ? $model->subBase->sub_base : null ?></span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'cluster_id'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->cluster_id ? $model->cluster->cluster : null ?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'kampung_id'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->kampung_id ? $model->kampung->kampung : null ?></span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'nama_pengurus'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->nama_pengurus;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'no_kp'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->no_kp ?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'no_kp_old'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->no_kp_old  ?></span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'jantina'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->jantina ?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'mobile'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->mobile  ?></span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'no_tel'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->no_tel ?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'fax'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->fax  ?></span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'email'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->email;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'koordinate'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->koordinate;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'nama_pengurus2'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->nama_pengurus2;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'no_kp2'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->no_kp2 ?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'no_kp_old2'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->no_kp_old2  ?></span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'jantina2'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->jantina2 ?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'mobile2'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->mobile2  ?></span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'no_tel2'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->no_tel2 ?></span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'fax2'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->fax2  ?></span>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'email2'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->email2;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'koordinate'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->koordinate;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2">
                                        Kemudahan Asas </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_2" class="panel-collapse collapse">
                                        <div class="panel-body" style="height:200px; overflow-y:auto;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'elektrik'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->elektrik;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_elektrik'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_elektrik;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'air'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->air;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_air'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_air;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'meja'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->meja;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_meja'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_meja;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'jumlah_meja'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->jumlah_meja;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'kerusi'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->kerusi;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_kerusi'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_kerusi;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'jumlah_kerusi'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->jumlah_kerusi;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'papan_putih'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->papan_putih;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_papan_putih'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_papan_putih;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'bilik_mesyuarat'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->bilik_mesyuarat;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_bilik_mesyuarat'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_bilik_mesyuarat;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'keaktifan_bilik_mesyuarat'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->keaktifan_bilik_mesyuarat;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keluasan_bilik_mesyuarat'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keluasan_bilik_mesyuarat;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'kawasan_lapang'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->kawasan_lapang;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keluasan_kawasan_lapang'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keluasan_kawasan_lapang;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'tandas'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->tandas;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_tandas'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_tandas;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'bilik_mandi'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->bilik_mandi;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_bilik_mandi'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_bilik_mandi;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'ruang_solat'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->ruang_solat;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_ruang_solat'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_ruang_solat;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'rating_kemudahan_asas'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->rating_kemudahan_asas;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3">
                                        Kemudahan ICT </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'komputer'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->komputer;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_komputer'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_komputer;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'bilangan_komputer'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->bilangan_komputer;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'projektor'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->projektor;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_projektor'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_projektor;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'bilangan_projektor'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->bilangan_projektor;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'mesin_pencetak'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->mesin_pencetak;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_mesin_pencetak'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_mesin_pencetak;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'bilangan_mesin_pencetak'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->bilangan_mesin_pencetak;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'mesin_faks'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->mesin_faks;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_mesin_faks'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_mesin_faks;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'bilangan_mesin_faks'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->bilangan_mesin_faks;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'pa_system'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->pa_system;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'keadaan_pa_system'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->keadaan_pa_system;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'unifi'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->unifi;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'streamyx'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->streamyx;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'lain_internet'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->lain_internet;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'maxis'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->maxis;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'digi'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->digi;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'celcom'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->celcom;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'p1wimax'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->p1wimax;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'yes4g'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->yes4g;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'lain_broadband'); ?> : </label>
                                                        <div class="col-md-6">
                                                            <span class="view"><?= $model->lain_broadband;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-5"><?= Html::activeLabel($model,'rating_kemudahan_ict'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->rating_kemudahan_ict;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_4">
                                        Bilik Latihan </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_4" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'kerusi_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->kerusi_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'keadaan_kerusi_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-4">
                                                            <span class="view"><?= $model->keadaan_kerusi_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'bil_kerusi_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->bil_kerusi_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'meja_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->meja_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'keadaan_meja_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-4">
                                                            <span class="view"><?= $model->keadaan_meja_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'bil_meja_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->bil_meja_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'keluasan_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->keluasan_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'penghawa_dingin_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->penghawa_dingin_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'keadaan_penghawa_dingin_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-4">
                                                            <span class="view"><?= $model->keadaan_penghawa_dingin_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'bilangan_penghawa_dingin_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->bilangan_penghawa_dingin_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'papan_putih_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->papan_putih_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'keadaan_papan_putih_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-4">
                                                            <span class="view"><?= $model->keadaan_papan_putih_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'bilangan_papan_putih_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->bilangan_papan_putih_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                     
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'rating_bilik_latihan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->rating_bilik_latihan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_5">
                                        Peralatan Sukan</a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_5" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php foreach ($model_equip as $key => $value) { ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Nama Peralatan : </label>
                                                                <div class="col-md-6">
                                                                    <span class="view"><?= $value['equip_name']; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Bilangan : </label>
                                                                <div class="col-md-6">
                                                                    <span class="view"><?= $value['quantity']; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Keadaan : </label>
                                                                <div class="col-md-6">
                                                                    <span class="view"><?= $value['condition']; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <?php } ?>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model,'rating_equip'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->rating_equip;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_6">
                                        Mesra OKU</a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_6" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'tempat_letak_kereta_oku'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->tempat_letak_kereta_oku;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'tandas_khas_oku'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->tandas_khas_oku;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'laluan_khas_oku'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->laluan_khas_oku;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'tangga_handrail_oku'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->tangga_handrail_oku;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'papan_tanda_khas_oku'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->papan_tanda_khas_oku;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'rating_mesra_oku'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->rating_mesra_oku;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_7">
                                        Capaian</a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_7" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'jarak_pfn_komuniti'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->jarak_pfn_komuniti;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'tempat_letak_kenderaan_capaian'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->tempat_letak_kenderaan_capaian;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'jarak_tempat_letak_kenderaan_capaian'); ?> : </label>
                                                        <div class="col-md-4">
                                                            <span class="view"><?= $model->jarak_tempat_letak_kenderaan_capaian;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'kedai_runcit'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->kedai_runcit;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'jarak_kedai_runcit'); ?> : </label>
                                                        <div class="col-md-4">
                                                            <span class="view"><?= $model->jarak_kedai_runcit;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'kedai_makan'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->kedai_makan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'jarak_kedai_makan'); ?> : </label>
                                                        <div class="col-md-4">
                                                            <span class="view"><?= $model->jarak_kedai_makan;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'stesen_minyak'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->stesen_minyak;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'jarak_stesen_minyak'); ?> : </label>
                                                        <div class="col-md-4">
                                                            <span class="view"><?= $model->jarak_stesen_minyak;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'hentian_bas'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->hentian_bas;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'jarak_hentian_bas'); ?> : </label>
                                                        <div class="col-md-4">
                                                            <span class="view"><?= $model->jarak_hentian_bas;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'isyarat_telekomunikasi'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->isyarat_telekomunikasi;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'rating_capaian'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->rating_capaian;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_8">
                                        Ulasan & Pengesahan</a>
                                        </h4>
                                    </div>
                                    <div id="collapse_3_8" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'ulasan_keadaan_fizikal'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->ulasan_keadaan_fizikal;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'kerjasama_pengurus'); ?> : </label>
                                                        <div class="col-md-4">
                                                            <span class="view"><?= $model->kerjasama_pengurus;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'rating_keseluruhan_pfn'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->rating_keseluruhan_pfn;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'tarikh_daftar'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->tarikh_daftar;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'didaftarkan_oleh'); ?> : </label>
                                                        <div class="col-md-4">
                                                            <span class="view"><?= $model->didaftarkan_oleh;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'tarikh_audit'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->tarikh_audit;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'diaudit_oleh'); ?> : </label>
                                                        <div class="col-md-4">
                                                            <span class="view"><?= $model->diaudit_oleh;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-7"><?= Html::activeLabel($model,'nota'); ?> : </label>
                                                        <div class="col-md-5">
                                                            <span class="view"><?= $model->nota;?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTENT -->
            
