<?php

use yii\helpers\Html;

$this->title = 'Kemaskini';
?>

<span id="peopleUpdate" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
  <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
               <h1>Kemasukan Data</h1>
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
                    <?= Html::a('Profil', ['people/index']) ?><i class="fa fa-circle"></i>
                </li>
                <li class="active">Kemaskini Maklumat Profil : <?= strtoupper($model->name); ?></li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light" >
						<div class="portlet-title">
							<div class="caption font-green-haze">
								<i class="icon-user font-green-haze"></i>
								<span class="caption-subject bold uppercase"> Kemaskini Maklumat Profil</span>
							</div>
							<div class="actions">
								<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
								</a>
							</div>
						</div>
						<div class="portlet-body" >

						    <?= $this->render('_edit', [
						        'model' => $model,
						        'model_oku' => $model_oku,
                                'model_wife' => $model_wife,
                                'model_tanggungan' => $model_tanggungan,
                                'model_answer' => $model_answer,
                                'model_tanggunganoku' => $model_tanggunganoku,

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
