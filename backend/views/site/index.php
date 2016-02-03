<?php
/* @var $this yii\web\View */
use miloschuman\highcharts\Highmaps;
use yii\web\JsExpression;
$this->title = 'Komuniti Development System';
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Dashboard</h1>
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
                     Dashboard
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
                            <?php  if($role == 6){ ?>
                            <div class="row">
                                    <div class="portlet white-cascade box">
                                        <div class="portlet-body">
                                            <div class="portlet-title">
                                                <div class="caption font-green-haze">
                                                    <h4 class="caption-subject bold uppercase">Jumlah Data Semasa : <?php echo $total;?></h4>
                                                </div><br>
                                            </div>
                                            
                                            <table class='table table-bordered table-hover' width='100%'>
                                                <tr>
                                                    <th>Negeri</th>
                                                    <th>Jumlah Data</th>
                                                    <th>Data Yang Disahkan</th>
                                                    <th>Data Hari Ini</th>
                                                    <th>Data Sah Hari Ini</th>
                                                    <th>Data Semalam</th>
                                                    <th>Data Sah Semalam</th>
                                                </tr>
                                            <?php                                                    
                                                foreach ($data as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $value['state'];?></td>
                                                    <td><?php echo $value['total_by_state'];?></td>
                                                    <td><?php echo $value['total_sah_by_state'];?></td>
                                                    <td><?php echo $value['total_today'];?></td>
                                                    <td><?php echo $value['total_sah_today'];?></td>
                                                    <td><?php echo $value['total_yesterday'];?></td>
                                                    <td><?php echo $value['total_sah_yesterday'];?></td>
                                                </tr>
                                            <?php }?>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <!-- END PAGE CONTENT INNER -->
        


        </div>
    </div>
    <!-- END PAGE CONTENT -->
