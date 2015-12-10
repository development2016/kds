<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Dashboard <small>statistics & reports</small></h1>
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
                    <a href="#">Home</a><i class="fa fa-circle"></i>
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
                            <div class="caption font-green-haze">
                                <i class="icon-settings font-green-haze"></i>
                                <span class="caption-subject bold uppercase"> Form Layouts</span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <?php $form = ActiveForm::begin(); ?>
                            <div class="row">
                                <div class="portlet-body form">
                                    <div class="form-body">
                                        <div class="col-md-12">
                                            <div class="form-group form-md-line-input">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-checkboxes">
                                                        <?php $i = 0 ; foreach ($model_acl as $key => $val) {  $i++; ?>
                                                                <label><?php echo $val['menu']; ?></label>
                                                                    <div class="md-checkbox-list">
                                                                <input type="hidden" name="AclDataFilter[role_menu_id][<?php echo $i; ?>]" value="<?php echo $val['role_menu_id']; ?>">

                                                                        <?php $e=0; foreach ($model_state as $key => $value) { $e++; ?>

                                                                            <div class="md-checkbox">

                                                                                <input type="checkbox" id="checkbox<?php echo $value['state_id'] ?><?php echo $val['role_menu_id']; ?>" name="AclDataFilter[data_state][<?php echo $i; ?>][<?php echo $e; ?>]" class="md-check menu_<?php echo $value['state_id'] ?>" value="<?php echo $value['state_id'] ?>">
                                                                                <label for="checkbox<?php echo $value['state_id'] ?><?php echo $val['role_menu_id']; ?>">
                                                                                <span></span>
                                                                                <span class="check"></span>
                                                                                <span class="box"></span>
                                                                                <?php echo $value['state']; ?> </label>
                                                                            </div>
                                                                            
                                                                        <?php } ?>
                                                                    </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
            <!-- END PAGE CONTENT INNER -->
        


        </div>
    </div>
    <!-- END PAGE CONTENT -->
