<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Slru</h1>
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
                    <a href="#">Slru</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Graf
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
                                        <th>NO</th>
                                        <th>MODUL</th>
                                        <th>SUBMODUL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Demografi</td>
      
                                    </tr>
                                     <tr>
                                        <td>2</td>
                                        <td><?= Html::a('Padanan Minat', ['slru/sp1']) ?></td>
                                        <td>
                                            <li><?= Html::a('ICT', ['../..']) ?></li>
                                            <li><?= Html::a('Kesihatan', ['../..']) ?></li>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sukarelawan</td>
                                        <td>
                                            <ul>
                                                <li><?= Html::a('Jantina', ['slru/ss1']) ?></li>
                                                <li>Minat Program</li>
                                               <ul>
                                                    <li><?= Html::a('Program Kanak-Kanak', ['slru/ss2_progkanak']) ?></li>
                                                    <li><?= Html::a('Program Kemasyarakatan', ['slru/ss2_progkemasyarakatan']) ?></li>
                                                    <li><?= Html::a('Program Warga Emas', ['slru/ss2_progwarga']) ?></li>
                                                    <li><?= Html::a('Program OKU', ['slru/ss2_progoku']) ?></li>
                                                    <li><?= Html::a('Aktiviti Rekreasi', ['slru/ss2_rekreasi']) ?></li>
                                                    <li><?= Html::a('Program Kesihatan', ['slru/ss2_progkesihatan']) ?></li>
                                                    <li><?= Html::a('Program Akademik', ['slru/ss2_progakademik']) ?></li>
                                                    <li><?= Html::a('Lain - Lain', ['slru/ss2_lain']) ?></li>
                                                    <li><?= Html::a('Semua', ['slru/ss2_prog_minat_all']) ?></li>
                                                        <ul>
                                                            <li><?= Html::a('Ya', ['slru/ss2_prog_minat_ya']) ?></li>
                                                            <li><?= Html::a('Tidak', ['slru/ss2_prog_minat_tidak']) ?></li>
                                                        </ul>

                                                </ul>
                                                <li>Sumbangan</li>
                                                    <ul>
                                                        <li><?= Html::a('Fasilitator', ['slru/ss3_fasilitator']) ?></li>
                                                        <li><?= Html::a('Tenaga', ['slru/ss3_tenaga']) ?></li>
                                                        <li><?= Html::a('Fotografi', ['slru/ss3_fotografi']) ?></li>
                                                        <li><?= Html::a('Lain - Lain', ['slru/ss3_lain']) ?></li>
                                                        <li><?= Html::a('Semua', ['slru/ss3_sumbangan_all']) ?></li>
                                                            <ul>
                                                                <li><?= Html::a('Ya', ['slru/ss3_sumbangan_ya']) ?></li>
                                                                <li><?= Html::a('Tidak', ['slru/ss3_sumbangan_tidak']) ?></li>
                                                            </ul>
                                                    </ul>
                                            </ul>
                                            
               
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Microwoker</td>
                                        <td>
                                            <li><?= Html::a('Jantina', ['slru/sm1']) ?></li>
     
                                        </td>
                                    </tr>
                                </tbody>
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