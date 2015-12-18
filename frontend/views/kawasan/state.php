<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$role_id = Yii::$app->user->identity->role;
$user_id =  Yii::$app->user->identity->id;

foreach ($data as $key => $value) {
        $state_id = $value['state_id'];
        $district_id = $value['district_id'];
        $kampung_id = $value['kampung_id'];
}
$this->title = 'Komuniti Development System';

?>

<span id="kawasan" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
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
                                <?php if ($role_id == 1) { 
                                    echo $model->kampung;
                                } else if($role_id == 3) {
                                    echo "Daerah " .$model->district;
                                } elseif ($role_id == 4) {
                                    echo "Negeri " .$model->state;
                                } else {
                                    echo "Negeri " .$model->state;
                                } ?></span>
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
                                            <?php if ($role_id == 1) {?>

                                            <?php } elseif ($role_id == 3) { ?>
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
                                            <?php } elseif ($role_id == 4) { ?>
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
                                                            <label class="control-label col-md-9">Jumlah Kampung : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><b><?= $count_kampung ?></b></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            <?php } else { ?>
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
                                                                <span class="view"><b><?= $count_cluster ?></b></span>
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
                                            <?php } ?>

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
                                                            <label class="control-label col-md-9">Jumlah Profil Komuniti (Sah) : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><b><?= $count_profil_verified ?></b></span>
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
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Jumlah Pekerja Mikro (Data Collection) : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><b><?= $count_microworker ?></b></span>
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



    $surau = $masjid = $kuil = $gereja = $tokong = $balairaya = $dewan_Serbaguna = $dewan_Orang = $pusat_Jalur = $medan_Info = $pusat_ICT = $sekolah_Rendah =
    $sekolah_Menengah = $sekolah_Agama = $sekolah_Jenis = $tadika_Kemas = $tadika_Swasta = $kedai_Runcit = $kedai_Makan = $gerai_Makanan = $gerai_Buah =
    $bengkel_Motor = $bengkel_Kereta = $bengkel_Industri = $perpustakaan_Desa = $perpustakaan_Bergerak = $klinik_Desa = $klinik_Kesihatan = $hospital = 
    $taman_Permainan = $gelanggang = $padang_Bola = $homestay = 0;


   foreach ($countDemographic as $key => $value_d) {

        if ($value_d['kemudahan_id'] == 1) {
            $surau = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 2) {
            $masjid = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 3) {
            $kuil = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 4) {
            $gereja = $value_d['jumlah'];
        }
         if ($value_d['kemudahan_id'] == 5) {
            $tokong = $value_d['jumlah'];
        }
         if ($value_d['kemudahan_id'] == 6) {
            $balairaya = $value_d['jumlah'];
        }
         if ($value_d['kemudahan_id'] == 7) {
            $dewan_Serbaguna = $value_d['jumlah'];
        }
         if ($value_d['kemudahan_id'] == 8) {
            $dewan_Orang = $value_d['jumlah'];
        }
         if ($value_d['kemudahan_id'] == 9) {
            $pusat_Jalur  = $value_d['jumlah'];
        }
         if ($value_d['kemudahan_id'] == 10) {
            $medan_Info = $value_d['jumlah'];
        }
         if ($value_d['kemudahan_id'] == 11) {
            $pusat_ICT = $value_d['jumlah'];
        }
         if ($value_d['kemudahan_id'] == 12) {
            $sekolah_Rendah = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 13) {
            $sekolah_Menengah = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 14) {
            $sekolah_Agama = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 15) {
            $sekolah_Jenis = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 16) {
            $tadika_Kemas = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 17) {
            $tadika_Swasta = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 18) {
            $kedai_Runcit = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 19) {
            $kedai_Makan= $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 20) {
            $gerai_Makanan = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 21) {
            $gerai_Buah = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 22) {
            $bengkel_Motor = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 23) {
            $bengkel_Kereta = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 24) {
            $bengkel_Industri = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 25) {
            $perpustakaan_Desa = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 26) {
            $perpustakaan_Bergerak = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 27) {
            $klinik_Desa = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 28) {
            $klinik_Kesihatan = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 29) {
            $hospital = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 30) {
            $taman_Permainan = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 31) {
            $gelanggang = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 32) {
            $padang_Bola = $value_d['jumlah'];
        }
        if ($value_d['kemudahan_id'] == 33) {
            $homestay= $value_d['jumlah'];
        }


    }
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
                                                            <label class="control-label col-md-9">Kedai Runcit : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $kedai_Runcit  ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Balai Raya : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $balairaya; ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Kedai Makan : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $kedai_Makan  ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Dewan Orang Ramai : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $dewan_Orang; ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Gerai Makanan : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $gerai_Makanan  ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Dewan Serbaguna : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $dewan_Serbaguna ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Gerai Buah : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $gerai_Buah  ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Pusat ICT : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $pusat_ICT ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Bengkel Motor : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $bengkel_Motor  ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Pusat Jalur Lebar : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $pusat_Jalur ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Bengkel Kereta : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $bengkel_Kereta  ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Medan Info Desa : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $medan_Info ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Industri : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $bengkel_Industri  ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Klinik Desa : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $klinik_Desa  ?></span>
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
                                                                <span class="view"><?= $klinik_Kesihatan  ?></span>
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
                                                            <label class="control-label col-md-9">Hospital : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $hospital  ?></span>
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
                                                            <label class="control-label col-md-9">Tadika Kemas : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $tadika_Kemas ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Surau</label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $surau ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Tadika Swasta : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $tadika_Swasta ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Masjid</label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $masjid ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Sekolah Rendah : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $sekolah_Rendah ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Kuil : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $kuil ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Sekolah Menengah : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $sekolah_Menengah ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Gereja : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $gereja ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Sekolah Agama : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $sekolah_Agama ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Tokong : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $tokong ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Sekolah Jenis Kebangsaan : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $sekolah_Jenis ?></span>
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
                                                            <label class="control-label col-md-9">Perpustakaan Desa : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $perpustakaan_Desa ?></span>
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
                                                            <label class="control-label col-md-9">Perpustakaan Gerak : </label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $perpustakaan_Bergerak ?></span>
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
                                                <br>

                                                <div class="row">

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
                                                            <label class="control-label col-md-9">Padang Bola</label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $padang_Bola ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Taman Permainan Kanak - Kanak</label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $taman_Permainan ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Homestay</label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $homestay ?></span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-9">Gelanggang</label>
                                                            <div class="col-md-2">
                                                                <span class="view"><?= $gelanggang ?></span>
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