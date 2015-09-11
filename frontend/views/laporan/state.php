<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CountStateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Count States';
$this->params['breadcrumbs'][] = $this->title;
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Laporan</h1>
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
                     Laporan
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">

                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Bil</th>
                                    <th>Daerah</th>
                                    <th>ICT</th>
                                    <th>Kesihatan</th>
                                    <th>Pendidikan</th>
                                    <th>Keusahawanan</th>
                                    <th>Riadah</th>

                                </tr>
                            </thead>

                            <tbody>

                                <?php 
                                $sum_ict = $sum_kesihatan = $sum_pendidikan = $sum_keusahawanan = $sum_riadah = 0;


                                $i =0; foreach ($data as $key => $value) {  $i++ ;?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?= Html::a($value['district'], ['laporan/kampung','id'=>$value['district_id']]) ?></td>
                                    <td><?php echo $value['ict']; $sum_ict+= $value['ict'];?></td>
                                    <td><?php echo $value['kesihatan']; $sum_kesihatan+= $value['kesihatan']; ?></td>
                                    <td><?php echo $value['pendidikan']; $sum_pendidikan+= $value['pendidikan']; ?></td>
                                    <td><?php echo $value['keusahawanan']; $sum_keusahawanan+= $value['keusahawanan']; ?></td>
                                    <td><?php echo $value['riadah']; $sum_riadah+= $value['riadah']; ?></td>
                                </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                  <td colspan="2"><b>Jumlah</b></td>
                                  <td><b><?php echo $sum_ict; ?></b></td>
                                  <td><b><?php echo $sum_kesihatan; ?></b></td>
                                  <td><b><?php echo $sum_pendidikan; ?></b></td>
                                  <td><b><?php echo $sum_keusahawanan; ?></b></td>
                                  <td><b><?php echo $sum_riadah; ?></b></td>
                                </tr>
                            </tfoot>
                        </table>

                   


                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <!-- END PAGE CONTENT INNER -->
        


        </div>
    </div>
    <!-- END PAGE CONTENT -->
