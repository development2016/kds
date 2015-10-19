<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Komuniti Development System';
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">


        </div>
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container">

            <!-- END PAGE BREADCRUMB -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-haze">
                                <span class="caption-subject bold uppercase"> Senarai Maklumat Profil - Negeri : <?php echo $state->state ?></span>
                            </div>
                        </div>
                        <div class="portlet-body">
                      
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>DAERAH</th>
                                        <th>SUB BASE</th>
                                        <th>CLUSTER</th>
                                        <th>KAMPUNG</th>
                                        <th>TOTAL</th>

                                    </tr>

                                    
                                </thead>
                                <tbody>
                                    <?php $i=0; foreach ($model as $key => $value) { $i++;  ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $value['district']; ?></td>
                                        <td><?php echo $value['sub_base']; ?></td>
                                        <td><?php echo $value['cluster']; ?></td>
                                        <td><?php echo $value['kampung']; ?></td>
                                        <td><?php echo $value['total']; ?></td>

                                    </tr>
                                    <?php } ?>

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