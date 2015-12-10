<?php

use yii\helpers\Html;
$this->title = 'Update Lookup Edu Level: ' . ' ' . $model->id;
$this->title = 'Kemaskini';
?>
<span id="edulevelUpdate" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>

  <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                 <h1>Edu Level</h1>
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
                   <?= Html::a('Utama', ['site/index']) ?><i class="fa fa-circle"></i>
                </li>
                <li>
                    <?= Html::a('Edu Level', ['lookup-edu-level/index']) ?><i class="fa fa-circle"></i>
                </li>
                <li class="active">Kemaskini Maklumat Edu Level : <?= strtoupper($model->edu_level); ?></li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light" id="form_wizard_1">
						<div class="portlet-title">
                            <div class="caption font-green-haze">
                                <i class="icon-users font-green-haze"></i>
                                <span class="caption-subject bold uppercase"> Kemaskini Maklumat Edu Level </span>
                            </div>
							<div class="actions">
								<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
								</a>
							</div>
						</div>
						<div class="portlet-body form" >
							
						    <?= $this->render('_edit', [
						        'model' => $model,
						    ]) ?>

						</div>
					</div>
				</div>
				<!-- END SAMPLE FORM PORTLET-->
			</div>
			<!-- END PAGE CONTENT INNER -->
        


        </div>
    </div>
    <!-- END PAGE CONTENT -->