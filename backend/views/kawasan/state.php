<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Komuniti Development System';
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Kawasan Perlaksanaan</h1>
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
                    <a href="#">Utama</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Kawasan Perlaksanaan
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
                            <div class="caption font-green-haze">
                                <i class="icon-flag font-green-haze"></i>
                                <span class="caption-subject bold uppercase"> Ringkasan Bagi :
                                <?php 
                                    echo "Negeri " .$model->state;
                                ?></span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
                            </div>
						</div>
						<div class="portlet-body">
                            <div class="row">

                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet white-cascade box">
                                        <div class="portlet-body">
                                            <br>

                                            
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Jumlah Daerah : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><b><?= $count_district ?></b></span>
                                                            </div>
                                                        </div> 
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Jumlah Sub Base : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><b><?= $count_sub_base ?></b></span>
                                                            </div>
                                                        </div> 
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Jumlah Cluster : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><b><?= $count_cluster ?></b.</span>
                                                            </div>
                                                        </div> 
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Jumlah Kampung : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><b><?= $count_kampung ?></b></span>
                                                            </div>
                                                        </div> 
                                                    </div>

                                                </div>
                                         

                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Jumlah Profil Komuniti : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><b><?= $count_profil ?></b></span>
                                                            </div>
                                                        </div> 
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Jumlah Sukarelawan : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><b><?= $count_sukarelawan ?></b></span>
                                                            </div>
                                                        </div> 
                                                    </div>

                                                </div>   
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Jumlah Pekerja Mikro : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><b><?= $count_microworker ?></b></span>
                                                            </div>
                                                        </div> 
                                                    </div>

                                                </div> 
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Jumlah Pekerja Mikro (Data Collection): </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><b><?= $count_microworker_collection ?></b></span>
                                                            </div>
                                                        </div> 
                                                    </div>

                                                </div> 
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Jumlah Pekerja Mikro (Train) : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><b><?= $count_microworker_task ?></b></span>
                                                            </div>
                                                        </div> 
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Jumlah Pekerja Mikro (Microworker Train & Task) : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><b><?= $count_microworker_tasktrain ?></b></span>
                                                            </div>
                                                        </div> 
                                                    </div>

                                                </div>  

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet white-cascade box">
                                        <div class="portlet-title">
                                            <div class="caption bold font-blue uppercase">
                                                Padanan Profil Mengikut Minat
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model_count,'ict'); ?> : </label>
                                                        <div class="col-md-2">
                                                            <span class="view"><b><?= $model_count->ict;?></b></span>
                                                        </div>
                                                    </div> 
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model_count,'kesihatan'); ?> : </label>
                                                        <div class="col-md-2">
                                                            <span class="view"><b><?= $model_count->kesihatan;?></b></span>
                                                        </div>
                                                    </div> 
                                                </div>

                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model_count,'pendidikan'); ?> : </label>
                                                        <div class="col-md-2">
                                                            <span class="view"><b><?= $model_count->pendidikan;?></b></span>
                                                        </div>
                                                    </div> 
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model_count,'keusahawanan'); ?> : </label>
                                                        <div class="col-md-2">
                                                            <span class="view"><b><?= $model_count->keusahawanan;?></b></span>
                                                        </div>
                                                    </div> 
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-6"><?= Html::activeLabel($model_count,'riadah'); ?> : </label>
                                                        <div class="col-md-2">
                                                            <span class="view"><b><?= $model_count->riadah;?></b></span>
                                                        </div>
                                                    </div> 
                                                </div>

                                            </div>


                                                <span class="last_update">Last Update : <?= $model_count->last_update ?></span>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="portlet white-cascade box">
                                        <div class="portlet-title">
                                            <div class="caption bold font-blue uppercase">
                                                ISU
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <?php foreach ($countIssue as $key => $value) { ?>
                                               
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-9"><?php echo $value['kategori_isu'] ?> : </label>
                                                        <div class="col-md-2">
                                                            <span class="view"><b><?php echo $value['isu'] ?></b></span>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>

                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            

                            </div>

                            <?php

    $premis_perniagaan = $bengkel = $premise_industri =$balairaya = $dewan_orang_ramai = $dewan_serbaguna =$tele_center = $pusat_ict = $klinik_desa = $klinik_kesihatan = $klinik_swasta = $sek_rendah = $sek_menengah = $sek_agama = $kolej_voka = $kolej = $tadika_kemas = $tadika_swasta = $perpustakaan_desa = $perpustakaan_gerak = $surau = $masjid = $ibadah_lain = $tp_kanak = $tp_gelanggang = $tp_p_bola = $homestay = 0;

   /* foreach ($countDemographic as $key => $value_d) {
        $premis_perniagaan = $value_d['premis_perniagaan'];
        $bengkel = $value_d['bengkel'];
        $premise_industri = $value_d['premise_industri'];

        $balairaya = $value_d['balairaya'];
        $dewan_orang_ramai = $value_d['dewan_orang_ramai'];
        $dewan_serbaguna = $value_d['dewan_serbaguna'];

        $tele_center = $value_d['tele_center'];
        $pusat_ict = $value_d['pusat_ict'];
        $klinik_desa = $value_d['klinik_desa'];

        $klinik_kesihatan = $value_d['klinik_kesihatan'];
        $klinik_swasta = $value_d['klinik_swasta'];
        $sek_rendah = $value_d['sek_rendah'];

        $sek_menengah = $value_d['sek_menengah'];
        $sek_agama = $value_d['sek_agama'];
        $kolej_voka = $value_d['kolej_voka'];

        $kolej = $value_d['kolej'];
        $tadika_kemas = $value_d['tadika_kemas'];
        $tadika_swasta = $value_d['tadika_swasta'];

        $perpustakaan_desa = $value_d['perpustakaan_desa'];
        $perpustakaan_gerak = $value_d['perpustakaan_gerak'];
        $surau = $value_d['surau'];

        $masjid = $value_d['masjid'];
        $ibadah_lain = $value_d['ibadah_lain'];
        $tp_kanak = $value_d['tp_kanak'];

        $tp_gelanggang = $value_d['tp_gelanggang'];
        $tp_p_bola = $value_d['tp_p_bola'];
        $homestay = $value_d['homestay'];
    }*/
                            ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet white-cascade box">
                                        <div class="portlet-title">
                                            <div class="caption bold font-blue uppercase">
                                                DEMOGRAPHIC
                                            </div>
                                        </div>
                                        <div class="portlet-body">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9"><b>Asas Ekonomi</b></label>
                                                            <div class="col-md-2">
                                                                <span class="view"></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9"><b>Kemudahan Masyarakat</b></label>
                                                            <div class="col-md-2">
                                                                <span class="view"></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Premis Perniagaan : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $premis_perniagaan ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Balai Raya : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $balairaya ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Bengkel : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $bengkel ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Dewan Orang Ramai : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $dewan_orang_ramai ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Premis Industri : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $premise_industri ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Dewan Serbaguna : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $dewan_serbaguna ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9"></label>
                                                            <div class="col-md-2">
                                                                <span class="view"></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Tele Centre : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $tele_center ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9"></label>
                                                            <div class="col-md-2">
                                                                <span class="view"></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Pusat ICT : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $pusat_ict ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9"></label>
                                                            <div class="col-md-2">
                                                                <span class="view"></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Klinik Desa : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $klinik_desa ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9"></label>
                                                            <div class="col-md-2">
                                                                <span class="view"></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Klinik Kesihatan : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $klinik_kesihatan ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9"></label>
                                                            <div class="col-md-2">
                                                                <span class="view"></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Klinik Swasta : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $klinik_swasta ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9"><b>Kemudahan Pendidikan</b></label>
                                                            <div class="col-md-2">
                                                                <span class="view"></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9"><b>Kemudahan Rumah Ibadah</b></label>
                                                            <div class="col-md-2">
                                                                <span class="view"></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Sekolah Rendah : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $sek_rendah ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Surau : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $surau ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Sekolah Menengah : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $sek_menengah ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Masjid : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $masjid ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Sekolah Agama : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $sek_agama ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Ibadah Lain : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $ibadah_lain ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Kolej Vokasional : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $kolej_voka ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9"></label>
                                                            <div class="col-md-2">
                                                                <span class="view"></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Kolej : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $kolej ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9"><b>Kemudahan Rekreasi</b></label>
                                                            <div class="col-md-2">
                                                                <span class="view"></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Tadika Kemas : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $tadika_kemas ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Taman Permainan Kanak - Kanak</label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $tp_kanak ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Tadika Swasta : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $tadika_swasta ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Gelanggang</label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $tp_gelanggang ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Perpustakaan Desa : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $perpustakaan_desa ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Padang Bola</label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $tp_p_bola ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Perpustakaan Gerak : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $perpustakaan_gerak ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Homestay</label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $homestay ?></span>
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