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
                                                <li><?= Html::a('umur 18 tahun', ['xx/xx'],['target'=>'_BLANK']) ?></li>
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
                                                <li><?= Html::a('Negeri', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Jantina', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Umur', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Kecacatan', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Pekerjaan', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Perbelanjaan', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Mikroworker</td>
                                        <td>
                                            <ul>
                                                <li><?= Html::a('Negeri', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Jantina', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Umur 18 Tahun', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Profession', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Sukarelawan</td>
                                        <td>
                                            <ul>
                                                <li><?= Html::a('Negeri', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Umur 18 tahun', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Minat Program', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Sumbangan', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Isu</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Ibu Tunggal</td>
                                        <td>
                                            <ul>
                                                <li><?= Html::a('Negeri', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Umur 18 tahun', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Profession', ['xx/xx'],['target'=>'_BLANK']) ?></li>
                                                <li><?= Html::a('Pendapatan', ['xx/xx'],['target'=>'_BLANK']) ?></li>
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