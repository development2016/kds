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
                                <span class="caption-subject bold uppercase"> Senarai Negeri</span>
                            </div>
						</div>
						<div class="portlet-body">

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Negeri</th>

                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <?php  foreach ($state as $key => $value) {  ?>
                                    <tr>
                                        <td><?= Html::a($value['state'], ['summary', 'id' => $value['state_id']]) ?></td>

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