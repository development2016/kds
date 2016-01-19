<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use backend\widgets\Alert;
use yii\bootstrap\Modal;
use yii\widgets\Menu;
use yii\filters\AccessControl;
use common\models\User;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

    <?php $this->beginBody() ?>
        <?php if(Yii::$app->user->isGuest == 1) { ?>

                <!-- BEGIN BODY -->
        <body class="page-md login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <!-- title -->
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="menu-toggler sidebar-toggler">
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- BEGIN LOGIN -->
            <div class="content">
                <!-- BEGIN LOGIN FORM -->

            <?= $content ?>


            </div>
            <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
             <?= date('Y') ?> &copy; Cypress Diversified SDN BHD .
        </div>

        <?php } else { ?>

        <body class="page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?php echo Yii::$app->request->baseUrl; ?>"><img src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/admin/layout3/img/kdsb.png" alt="logo" class="logo-default"></a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->


                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">

                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown dropdown-user dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/admin/layout3/img/avatar.png">
                                <span class="username username-hide-mobile"><?= Yii::$app->user->identity->nama ?></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                         <?= Html::a('<i class="icon-user"></i> My Profil', ['user/view','id'=>Yii::$app->user->identity->id]) ?>

                                    </li>

                                    <li>
                                        <?= Html::a('<i class="icon-key"></i> Keluar', ['site/logout']) ?>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                <div class="container">

                    <!-- BEGIN MEGA MENU -->
                    <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                    <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                    <div class="hor-menu ">

                        <?php
                        echo Menu::widget([
                            'items' => [
                                ['label' => 'Utama', 'url' => ['site/index']],
                                ['label' => 'Acl menu', 'url' => ['acl/index'],'visible' => User::checkMenu('9'),],
                                ['label' => 'Kemasukan Data', 'url' => ['people/index'],'visible' => User::checkMenu('1'),'options'=>['id'=>'people']],
                                ['label' => 'Sukarelawan', 'url' => ['volunteer/index'],'visible' => User::checkMenu('2'),'options'=>['id'=>'volunteer']],
                                ['label' => 'Isu Konduit', 'url' => ['issue-conduit/index'],'visible' => User::checkMenu('3'),'options'=>['id'=>'issue']],


                                ['label' => '','submenuTemplate' => "\n<ul class='dropdown-menu pull-right' role='menu'>\n{items}\n</ul>\n",
                                    'options'=>['class'=>'menu-dropdown classic-menu-dropdown'],
                                    'template' => '<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">Facility <i class="fa fa-angle-down"></i></a>',
                                    'items' => [
                                        ['label' => 'Public Facility Network', 'url' => ['pfn/index'],'visible' => User::checkMenu('5'),'options'=>['id'=>'pfn']],
                                        ['label' => 'Manager Trained', 'url' => ['manager-train/index'],'visible' => User::checkMenu('17'),'options'=>['id'=>'mt']],

                                    ]
                                ],


                                ['label' => 'Mikroworker', 'url' => ['user/index'],'visible' => User::checkMenu('10'),'options'=>['id'=>'micro']],
                                ['label' => 'Demographic', 'url' => ['demographic/index'],'visible' => User::checkMenu('6'),'options'=>['id'=>'demographic']],

                                ['label' => '',
                                    'visible' => User::checkMenu('8'),
                                    'options'=>['class'=>'menu-dropdown mega-menu-dropdown mega-menu-full '],
                                    'template' => '<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">Lookup <i class="fa fa-angle-down"></i></a>',
                                    'items' => [
                                                [
                                                'label' => '
                                                            <div class="col-md-4">
                                                                <ul class="mega-menu-submenu">
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Agama', ['lookup-agama/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Bangsa', ['lookup-bangsa/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Hubungan', ['lookup-hubungan/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Income', ['lookup-income/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Kategori Isu', ['lookup-kategori-isu/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Kategori Oku', ['lookup-kategori-oku/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Perkahwinan', ['lookup-perkahwinan/index']).'</li>
                                                                </ul>
                                                            </div>' 
                                                ],
                                                [
                                                'label' => '
                                                            <div class="col-md-4">
                                                                <ul class="mega-menu-submenu">
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> State', ['lookup-state/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Bahagian', ['lookup-bahagian/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> District', ['lookup-district/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Mukim', ['lookup-mukim/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Subbase', ['lookup-sub-base/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Cluster', ['lookup-cluster/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Kampung', ['lookup-kampung/index']).'</li>
                                                                </ul>
                                                            </div>' 
                                                ],
                                                [
                                                'label' => '
                                                            <div class="col-md-4">
                                                                <ul class="mega-menu-submenu">
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Edu Level', ['lookup-edu-level/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Edu Level Under 17', ['lookup-edu-level-under17/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Field', ['lookup-field/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Pfn Kategori', ['lookup-pfn-category/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Pfn Rating', ['lookup-pfn-rating/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Sector', ['lookup-sector/index']).'</li>
                                                                    <li>'. Html::a('<i class="fa fa-angle-right"></i> Spending', ['lookup-spending/index']).'</li>
                                                                </ul>
                                                            </div>' 
                                                ],

                                            ]

                                ],
                                ['label' => '','submenuTemplate' => "\n<ul class='dropdown-menu pull-left' role='menu'>\n{items}\n</ul>\n",
                                    'options'=>['class'=>'menu-dropdown classic-menu-dropdown'],
                                    'template' => '<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">Laporan <i class="fa fa-angle-down"></i></a>',
                                    'items' => [

                                        ['label' => 'Count State', 'url' => ['count-state/index'],'visible' => User::checkMenu('12'),'options'=>['id'=>'count']],
                                        ['label' => 'Request', 'url' => ['request/index'],'visible' => User::checkMenu('15'),'options'=>['id'=>'request']],
                                        ['label' => 'Kawasan Perlaksanaan', 'url' => ['kawasan/index'],'visible' => User::checkMenu('11'),'options'=>['id'=>'kp']],
                                        [
                                            'label' => '<a href="#">Status </a>',
                                            'submenuTemplate' => "\n<ul class='dropdown-menu'>\n{items}\n</ul>\n",
                                            'options'=>['class'=>' dropdown-submenu'],
                                            'items' => [
                                            
                                                    ['label' => 'Status KDS', 'url' => ['status/index'],'visible' => User::checkMenu('20'),'options'=>['id'=>'status']],
                                                    ['label' => 'Status KDS - Summary', 'url' => ['status/status'],'visible' => User::checkMenu('16'),'options'=>['id'=>'status']],
                                                    ['label' => 'Status Harian', 'url' => ['status-harian/index'],'visible' => User::checkMenu('19'),'options'=>['id'=>'statusharian']],
                                                    ['label' => 'Status Harian - Summary', 'url' => ['status-harian/status'],'visible' => User::checkMenu('18'),'options'=>['id'=>'statusharian']],
                                            

                                            ]

                                        ],
                                        [
                                            'label' => '<a href="#">SMART TV -GRAF </a>',
                                            'submenuTemplate' => "\n<ul class='dropdown-menu'>\n{items}\n</ul>\n",
                                            'options'=>['class'=>' dropdown-submenu'],
                                            'items' => [
                                            
                                                ['label' => 'Graf-SLRU', 'url' => ['slru/index'],'visible' => User::checkMenu('21'),'options'=>['id'=>'slru']],
                                                ['label' => 'Graf-OPERATION', 'url' => ['operation/index'],'visible' => User::checkMenu('22'),'options'=>['id'=>'operation']],
                                                ['label' => 'Graf-PRESENTATION', 'url' => ['presentation/index'],'visible' => User::checkMenu('24'),'options'=>['id'=>'presentation']],

                                            ]

                                        ],


                                        ['label' => 'Summary Profil', 'url' => ['summary/index'],'visible' => User::checkMenu('23'),'options'=>['id'=>'summary']],

                                    ]
                                ],


                            ],
                            'activateParents'=>true,
                            'encodeLabels' => false,
                            'options' => [
                                            'id' => 'menu',
                                            'class' => 'nav navbar-nav'
                                        ],
                            'submenuTemplate' => "\n<ul class='dropdown-menu'>\n<div class='mega-menu-content'><div class='row'>{items}</div></div>\n</ul>\n",
                        ]);
                        ?>


                    </div>
                    <!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN PAGE CONTAINER -->
        <div class="page-container">
            <?= $content ?>
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="container">
                 <?= date('Y') ?> &copy; Cypress Diversified SDN BHD .
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
        <!-- END FOOTER -->
        </body>       

        <?php } ?>


    <?php $this->endBody() ?>

<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>

<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->

<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/admin/pages/scripts/form-wizard.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/admin/pages/scripts/components-pickers.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/admin/pages/scripts/ui-general.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>



<script src="<?php echo Yii::$app->request->baseUrl; ?>/metronic/admin/pages/scripts/components-form-tools.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/highmaps.js"></script>
<script src="<?php echo Yii::$app->request->baseUrl; ?>/js/my.js"></script>
<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
  Layout.init(); // init current layout
  Login.init();
  Demo.init();
  FormWizard.init();
  Tasks.initDashboardWidget(); // init tash dashboard widget
  ComponentsPickers.init();
  UIGeneral.init();
  ComponentsFormTools.init();

});
</script>


<?php 

Modal::begin([
    'header' =>'Komuniti Development System',
    'id' => 'modal',
    'size' => 'modal-lg',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE],

]);

echo "<div id='modalContent'></div>";
Modal::end();


$this->endPage() ?>

