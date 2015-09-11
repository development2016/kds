<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Komuniti Development System';
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Kawasan Perlaksanaan</h1>
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
                     Kawasan Perlaksanaan
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">

						</div>
						<div class="portlet-body">

                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,

                                'pager' => [
                                    'firstPageLabel' => 'First',
                                    'lastPageLabel' => 'Last',
                                ],
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    
                                    [
                                         'label'=>'Bendera',
                                         'format'=>'raw',
                                         'value' => function($data){
                                             //$url = "http://127.0.0.1/yii2/logo.png";
                                            $url = Yii::$app->request->baseUrl.'/images/negeri/'.$data->flag;
                                             return Html::img($url,['class'=>'flag']); 
                                         }
                                    ],
								    [
						                'attribute' => 'state',
						                'format' => 'raw',
						                'value' => function ($model, $key, $index) { 
						                    return Html::a($model->state, ['state', 'state_id_get' => $model->state_id]);
						                },
						            ],
                                    //'state_code',
                                    

                                ],
                            ]); ?>
                         
                            
						</div>
					</div>
				</div>
				<!-- END SAMPLE FORM PORTLET-->
			</div>
			<!-- END PAGE CONTENT INNER -->
        


        </div>
    </div>
    <!-- END PAGE CONTENT -->
