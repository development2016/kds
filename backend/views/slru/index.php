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
                                        <td>
                                            <li><?= Html::a('Jantina', ['slru/sd1']) ?></li>
                                            <li><?= Html::a('Status Umur', ['../..']) ?></li>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>2</td>
                                        <td>Padanan Minat</td>
                                        <td>
                                            <li><?= Html::a('ICT', ['slru/sp1'],['target' => '_blank']) ?></li>
                                            <li><?= Html::a('Kesihatan', ['../..']) ?></li>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sukarelawan</td>
                                        <td>
                                            <li><?= Html::a('Jantina', ['../..']) ?></li>
                                            <li><?= Html::a('Minat Program', ['../..']) ?></li>
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