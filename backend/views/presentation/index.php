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
                <h1>Presentation</h1>
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
                    <a href="#">Presentation</a><i class="fa fa-circle"></i>
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
                                        <td>
                                            <ul>
                                                <li><?= Html::a('Jantina', ['presentation/p1_1'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Status Perkahwinan', ['presentation/p1_2'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Pendidikan (rendah,menengah,sijil,degree,master,phd) - Tanggungan', ['presentation/p1_3'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('umur 18 tahun', ['presentation/p1_4'],['target'=>'_BLANK']) ?></li>
                                            </ul>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>2</td>
                                        <td>Sosio Ekonomi</td>
                                        <td>
                                            <ul>
                                                <li><?= Html::a('Pendapatan', ['presentation/p2_1'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Perbelanjaan', ['presentation/p2_2'],['target'=>'_BLANK']) ?></li>

                                                <li>Keseluruhan Status Pekerjaan
                                                        <ul>
                                                            <li><?= Html::a('Pie', ['presentation/p2_3_pie'],['target'=>'_BLANK']) ?></li>
                                                            <li><?= Html::a('Bar', ['presentation/p2_3_bar'],['target'=>'_BLANK']) ?></li>
                                                        </ul>
                                                </li>
                                                <li><?= Html::a('Status bekerja vs umur 18 tahun', ['presentation/p2_4'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Pendapatan vs Perbelanjaan', ['presentation/p2_5'],['target'=>'_BLANK']) ?>

                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Padanan Minat</td>
                                        <td>
                                            <ul>
                                                <li>Keseluruhan
                                                        <ul>
                                                            <li><?= Html::a('Pie', ['presentation/p3_1_pie'],['target'=>'_BLANK']) ?></li>
                                                            <li><?= Html::a('Bar', ['presentation/p3_1_bar'],['target'=>'_BLANK']) ?></li>
                                                        </ul>
                                                </li>
        
                                            </ul>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>OKU</td>
                                        <td>
                                            <ul>
                                                <li><?= Html::a('Negeri', ['presentation/p4_1'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Jantina', ['presentation/p4_2'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Umur', ['presentation/p4_3'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Kecacatan', ['presentation/p4_4'],['target'=>'_BLANK']) ?></li>
                                                <li>Pekerjaan & Pendapatan
                                                        <ul>
                                                            <li><?= Html::a('Pekerjaan', ['presentation/p4_5'],['target'=>'_BLANK']) ?></li>
                                                            <li><?= Html::a('Pendapatan', ['presentation/p4_6'],['target'=>'_BLANK']) ?></li>

                                                        </ul>
                                                </li>
                                                <li>Minat Keusahawan
                                                        <ul>
                                                            <li><?= Html::a('Pie', ['presentation/p4_7'],['target'=>'_BLANK']) ?></li>
                                                            <li><?= Html::a('Bar', ['presentation/p4_7_bar'],['target'=>'_BLANK']) ?></li>

                                                        </ul>
                                                </li>
                                                <li>Minat Sukarelawan
                                                        <ul>
                                                            <li><?= Html::a('Bar', ['presentation/p4_8'],['target'=>'_BLANK']) ?></li>
                                                            <li><?= Html::a('Pie', ['presentation/p4_8_pie'],['target'=>'_BLANK']) ?></li>
                                                        </ul>

                                                </li>
                                                <li>Minat Kerja Sampingan
                                                        <ul>
                                                            <li><?= Html::a('Bar', ['presentation/p4_9'],['target'=>'_BLANK']) ?></li>
                                                            <li><?= Html::a('Pie', ['presentation/p4_9_pie'],['target'=>'_BLANK']) ?></li>
                                                        </ul>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Mikroworker</td>
                                        <td>
                                            <ul>
                                                <li><?= Html::a('Negeri', ['presentation/p5_1'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Jantina', ['presentation/p5_2'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Umur 18 Tahun', ['presentation/p5_3'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Profession', ['presentation/p5_4'],['target'=>'_BLANK']) ?></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Sukarelawan</td>
                                        <td>
                                            <ul>
                                                <li><?= Html::a('Negeri', ['presentation/p6_1'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Umur 18 tahun', ['presentation/p6_2'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Minat Program', ['presentation/p6_3'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Sumbangan', ['presentation/p6_4'],['target'=>'_BLANK']) ?></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Isu</td>
                                        <td>
                                            <ul>
                                                <li>Keseluruhan
                                                        <ul>
                                                            <li><?= Html::a('Pie', ['presentation/p7_1_pie'],['target'=>'_BLANK']) ?></li>
                                                            <li><?= Html::a('Bar', ['presentation/p7_1_bar'],['target'=>'_BLANK']) ?></li>
                                                        </ul>
                                                </li>
        
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Ibu Tunggal</td>
                                        <td>
                                            <ul>
                                                <li><?= Html::a('Negeri', ['presentation/p8_1'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Umur 18 tahun', ['presentation/p8_2'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Profession', ['presentation/p8_3'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Pendapatan', ['presentation/p8_4'],['target'=>'_BLANK']) ?></li>
                                            </ul>
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