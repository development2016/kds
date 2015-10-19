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

                                ['label' => '','submenuTemplate' => "\n<ul class='dropdown-menu pull-right' role='menu'>\n{items}\n</ul>\n",
                                    'options'=>['class'=>'menu-dropdown classic-menu-dropdown'],
                                    'template' => '<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">Laporan <i class="fa fa-angle-down"></i></a>',
                                    'items' => [
                                        ['label' => 'Count State', 'url' => ['count-state/index'],'visible' => User::checkMenu('12'),'options'=>['id'=>'count']],
                                        ['label' => 'Request', 'url' => ['request/index'],'visible' => User::checkMenu('15'),'options'=>['id'=>'request']],
                                        ['label' => 'Kawasan Perlaksanaan', 'url' => ['kawasan/index'],'visible' => User::checkMenu('11'),'options'=>['id'=>'kp']],
                                        ['label' => 'Status KDS', 'url' => ['status/index'],'visible' => User::checkMenu('20'),'options'=>['id'=>'status']],
                                        ['label' => 'Status KDS - Summary', 'url' => ['status/status'],'visible' => User::checkMenu('16'),'options'=>['id'=>'status']],
                                        ['label' => 'Status Harian', 'url' => ['status-harian/index'],'visible' => User::checkMenu('19'),'options'=>['id'=>'statusharian']],
                                        ['label' => 'Status Harian - Summary', 'url' => ['status-harian/status'],'visible' => User::checkMenu('18'),'options'=>['id'=>'statusharian']],
                                        ['label' => 'Graf-SLRU', 'url' => ['slru/index'],'visible' => User::checkMenu('21'),'options'=>['id'=>'slru']],
                                        ['label' => 'Graf-OPERATION', 'url' => ['operation/index'],'visible' => User::checkMenu('22'),'options'=>['id'=>'operation']],
                                        ['label' => 'Summary Profil', 'url' => ['summary/index'],'visible' => User::checkMenu('23'),'options'=>['id'=>'summary']],

                                    ]
                                ]
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


$connection = \Yii::$app->db;

$date = date('Y-m-d');
$day_before = date( 'Y-m-d', strtotime( $date . ' -1 day' ) );

$total = $connection->createCommand('SELECT COUNT(people_id) AS total_data FROM people');
$countTotal = $total->queryAll();

$state = $connection->createCommand('SELECT COUNT(people_id) AS total,state_id FROM people GROUP BY state_id');
$countState = $state->queryAll();

$stateSah = $connection->createCommand('SELECT state_id, COUNT(people_id) AS total_sah FROM people  WHERE data_status = "Sah" GROUP BY state_id');
$countStateSah = $stateSah->queryAll();

$stateToday = $connection->createCommand('SELECT state_id, COUNT(people_id) AS total_today FROM people  WHERE  enter_date = "'.$date.'" GROUP BY state_id');
$countStateToday = $stateToday->queryAll();

$stateSahToday = $connection->createCommand('SELECT state_id, COUNT(people_id) AS total_today_sah FROM people  WHERE verified_date = "'.$date.'" AND data_status = "Sah" GROUP BY state_id');
$countStateSahToday = $stateSahToday->queryAll();

$stateSemalam = $connection->createCommand('SELECT enter_date,state_id, COUNT(people_id) AS total_semalam FROM people  WHERE enter_date = "'.$day_before.'" GROUP BY state_id');
$countStateSemalam = $stateSemalam->queryAll();

$stateSahSemalam = $connection->createCommand('SELECT verified_date,state_id, COUNT(people_id) AS total_semalam_sah FROM people  WHERE verified_date = "'.$day_before.'" AND data_status = "Sah" GROUP BY state_id');
$countStateSahSemalam = $stateSahSemalam->queryAll();


$total = 0;
foreach($countTotal as $key => $value){

    $total = $value['total_data'];
}
$total_all = $total;

$Perlis = $Kedah = $Pulau_Pinang = $Perak  = $Selangor  = $Negeri_Sembilan  = $Melaka  = $Johor  = $Pahang  = $Terengganu  = $Kelantan  = $Sabah = $Sarawak  = $Kuala_lumpur =  $Labuan = $Putrajaya= 0;

    foreach($countState as $key => $value){

        if ($value['state_id'] == 14) {
            $Perlis =  $value['total'];
        }
        if ($value['state_id'] == 16) {
            $Kedah =  $value['total'];
        }
        if ($value['state_id'] == 23) {
            $Pulau_Pinang =  $value['total'];
        }
        if ($value['state_id'] == 15) {
            $Perak =  $value['total'];
        }
        if ($value['state_id'] == 13) {
            $Selangor =  $value['total'];
        }
        if ($value['state_id'] == 24) {
            $Negeri_Sembilan =  $value['total'];
        }
        if ($value['state_id'] == 19) {
            $Melaka =  $value['total'];
        }        
        if ($value['state_id'] == 22) {
            $Johor =  $value['total'];
        }   
        if ($value['state_id'] == 12) {
            $Pahang =  $value['total'];
        }   
        if ($value['state_id'] == 18) {
            $Terengganu =  $value['total'];
        }  
        if ($value['state_id'] == 17) {
            $Kelantan =  $value['total'];
        }  
        if ($value['state_id'] == 20) {
            $Sabah =  $value['total'];
        }  
        if ($value['state_id'] == 21) {
            $Sarawak =  $value['total'];
        }  
        if ($value['state_id'] == 25) {
            $Labuan =  $value['total'];
        }  
        if ($value['state_id'] == 26) {
            $Kuala_lumpur =  $value['total'];
        }  
        if ($value['state_id'] == 27) {
            $Putrajaya =  $value['total'];
        }  
    }


$Perlis_sah = $Kedah_sah = $Pulau_Pinang_sah = $Perak_sah  = $Selangor_sah  = $Negeri_Sembilan_sah  = $Melaka_sah  = $Johor_sah  = $Pahang_sah  = $Terengganu_sah  = $Kelantan_sah  = $Sabah_sah = $Sarawak_sah  = $Kuala_lumpur_sah =  $Labuan_sah = $Putrajaya_sah= 0;

    foreach($countStateSah as $key => $value){

        if ($value['state_id'] == 14) {
            $Perlis_sah =  $value['total_sah'];
        }
        if ($value['state_id'] == 16) {
            $Kedah_sah =  $value['total_sah'];
        }
        if ($value['state_id'] == 23) {
            $Pulau_Pinang_sah =  $value['total_sah'];
        }
        if ($value['state_id'] == 15) {
            $Perak_sah=  $value['total_sah'];
        }
        if ($value['state_id'] == 13) {
            $Selangor_sah =  $value['total_sah'];
        }
        if ($value['state_id'] == 24) {
            $Negeri_Sembilan_sah =  $value['total_sah'];
        }
        if ($value['state_id'] == 19) {
            $Melaka_sah =  $value['total_sah'];
        }        
        if ($value['state_id'] == 22) {
            $Johor_sah =  $value['total_sah'];
        }   
        if ($value['state_id'] == 12) {
            $Pahang_sah =  $value['total_sah'];
        }   
        if ($value['state_id'] == 18) {
            $Terengganu_sah=  $value['total_sah'];
        }  
        if ($value['state_id'] == 17) {
            $Kelantan_sah =  $value['total_sah'];
        }  
        if ($value['state_id'] == 20) {
            $Sabah_sah =  $value['total_sah'];
        }  
        if ($value['state_id'] == 21) {
            $Sarawak_sah =  $value['total_sah'];
        }  
        if ($value['state_id'] == 25) {
            $Labuan_sah =  $value['total_sah'];
        }  
        if ($value['state_id'] == 26) {
            $Kuala_lumpur_sah =  $value['total_sah'];
        }  
        if ($value['state_id'] == 27) {
            $Putrajaya_sah =  $value['total_sah'];
        }  
    }

$Perlis_today = $Kedah_today = $Pulau_Pinang_today = $Perak_today  = $Selangor_today  = $Negeri_Sembilan_today  = $Melaka_today  = $Johor_today  = $Pahang_today  = $Terengganu_today  = $Kelantan_today  = $Sabah_today = $Sarawak_today  = $Kuala_lumpur_today =  $Labuan_today = $Putrajaya_today= 0;

    foreach($countStateToday as $key => $value){

        if ($value['state_id'] == 14) {
            $Perlis_today =  $value['total_today'];
        }
        if ($value['state_id'] == 16) {
            $Kedah_today =  $value['total_today'];
        }
        if ($value['state_id'] == 23) {
            $Pulau_Pinang_today =  $value['total_today'];
        }
        if ($value['state_id'] == 15) {
            $Perak_today=  $value['total_today'];
        }
        if ($value['state_id'] == 13) {
            $Selangor_today =  $value['total_today'];
        }
        if ($value['state_id'] == 24) {
            $Negeri_Sembilan_today =  $value['total_today'];
        }
        if ($value['state_id'] == 19) {
            $Melaka_today =  $value['total_today'];
        }        
        if ($value['state_id'] == 22) {
            $Johor_today =  $value['total_today'];
        }   
        if ($value['state_id'] == 12) {
            $Pahang_today =  $value['total_today'];
        }   
        if ($value['state_id'] == 18) {
            $Terengganu_today =  $value['total_today'];
        }  
        if ($value['state_id'] == 17) {
            $Kelantan_today =  $value['total_today'];
        }  
        if ($value['state_id'] == 20) {
            $Sabah_today =  $value['total_today'];
        }  
        if ($value['state_id'] == 21) {
            $Sarawak_today =  $value['total_today'];
        }  
        if ($value['state_id'] == 25) {
            $Labuan_today =  $value['total_today'];
        }  
        if ($value['state_id'] == 26) {
            $Kuala_lumpur_today =  $value['total_today'];
        }  
        if ($value['state_id'] == 27) {
            $Putrajaya_today =  $value['total_today'];
        }  
    }

$Perlis_todaysah = $Kedah_todaysah = $Pulau_Pinang_todaysah = $Perak_todaysah  = $Selangor_todaysah  = $Negeri_Sembilan_todaysah  = $Melaka_todaysah  = $Johor_todaysah  = $Pahang_todaysah  = $Terengganu_todaysah  = $Kelantan_todaysah  = $Sabah_todaysah = $Sarawak_todaysah  = $Kuala_lumpur_todaysah=  $Labuan_todaysah = $Putrajaya_todaysah = 0;

    foreach($countStateSahToday as $key => $value){

        if ($value['state_id'] == 14) {
            $Perlis_todaysah =  $value['total_today_sah'];
        }
        if ($value['state_id'] == 16) {
            $Kedah_todaysah =  $value['total_today_sah'];
        }
        if ($value['state_id'] == 23) {
            $Pulau_Pinang_todaysah =  $value['total_today_sah'];
        }
        if ($value['state_id'] == 15) {
            $Perak_todaysah=  $value['total_today_sah'];
        }
        if ($value['state_id'] == 13) {
            $Selangor_todaysah =  $value['total_today_sah'];
        }
        if ($value['state_id'] == 24) {
            $Negeri_Sembilan_todaysah =  $value['total_today_sah'];
        }
        if ($value['state_id'] == 19) {
            $Melaka_todaysah =  $value['total_today_sah'];
        }        
        if ($value['state_id'] == 22) {
            $Johor_todaysah =  $value['total_today_sah'];
        }   
        if ($value['state_id'] == 12) {
            $Pahang_todaysah =  $value['total_today_sah'];
        }   
        if ($value['state_id'] == 18) {
            $Terengganu_todaysah =  $value['total_today_sah'];
        }  
        if ($value['state_id'] == 17) {
            $Kelantan_todaysah =  $value['total_today_sah'];
        }  
        if ($value['state_id'] == 20) {
            $Sabah_todaysah =  $value['total_today_sah'];
        }  
        if ($value['state_id'] == 21) {
            $Sarawak_todaysah =  $value['total_today_sah'];
        }  
        if ($value['state_id'] == 25) {
            $Labuan_todaysah =  $value['total_today_sah'];
        }  
        if ($value['state_id'] == 26) {
            $Kuala_lumpur_todaysah =  $value['total_today_sah'];
        }  
        if ($value['state_id'] == 27) {
            $Putrajaya_todaysah =  $value['total_today_sah'];
        }  
    }

    $Perlis_semalam = $Kedah_semalam = $Pulau_Pinang_semalam = $Perak_semalam  = $Selangor_semalam  = $Negeri_Sembilan_semalam  = $Melaka_semalam  = $Johor_semalam  = $Pahang_semalam  = $Terengganu_semalam  = $Kelantan_semalam  = $Sabah_semalam = $Sarawak_semalam  = $Kuala_lumpur_semalam=  $Labuan_semalam = $Putrajaya_semalam = 0;
    foreach($countStateSemalam as $key => $value){

        if ($value['state_id'] == 14) {
            $Perlis_semalam =  $value['total_semalam'];
        }
        if ($value['state_id'] == 16) {
            $Kedah_semalam =  $value['total_semalam'];
        }
        if ($value['state_id'] == 23) {
            $Pulau_Pinang_semalam =  $value['total_semalam'];
        }
        if ($value['state_id'] == 15) {
            $Perak_semalam=  $value['total_semalam'];
        }
        if ($value['state_id'] == 13) {
            $Selangor_semalam =  $value['total_semalam'];
        }
        if ($value['state_id'] == 24) {
            $Negeri_Sembilan_semalam =  $value['total_semalam'];
        }
        if ($value['state_id'] == 19) {
            $Melaka_semalam =  $value['total_semalam'];
        }        
        if ($value['state_id'] == 22) {
            $Johor_semalam =  $value['total_semalam'];
        }   
        if ($value['state_id'] == 12) {
            $Pahang_semalam =  $value['total_semalam'];
        }   
        if ($value['state_id'] == 18) {
            $Terengganu_semalam =  $value['total_semalam'];
        }  
        if ($value['state_id'] == 17) {
            $Kelantan_semalam =  $value['total_semalam'];
        }  
        if ($value['state_id'] == 20) {
            $Sabah_semalam =  $value['total_semalam'];
        }  
        if ($value['state_id'] == 21) {
            $Sarawak_semalam =  $value['total_semalam'];
        }  
        if ($value['state_id'] == 25) {
            $Labuan_semalam =  $value['total_semalam'];
        }  
        if ($value['state_id'] == 26) {
            $Kuala_lumpur_semalam =  $value['total_semalam'];
        }  
        if ($value['state_id'] == 27) {
            $Putrajaya_semalam =  $value['total_semalam'];
        }  
    }

$Perlis_semalam_sah = $Kedah_semalam_sah = $Pulau_Pinang_semalam_sah = $Perak_semalam_sah  = $Selangor_semalam_sah  = $Negeri_Sembilan_semalam_sah  = $Melaka_semalam_sah  = $Johor_semalam_sah  = $Pahang_semalam_sah  = $Terengganu_semalam_sah  = $Kelantan_semalam_sah  = $Sabah_semalam_sah = $Sarawak_semalam_sah  = $Kuala_lumpur_semalam_sah=  $Labuan_semalam_sah = $Putrajaya_semalam_sah = 0;
    foreach($countStateSahSemalam as $key => $value){

        if ($value['state_id'] == 14) {
            $Perlis_semalam_sah =  $value['total_semalam_sah'];
        }
        if ($value['state_id'] == 16) {
            $Kedah_semalam_sah =  $value['total_semalam_sah'];
        }
        if ($value['state_id'] == 23) {
            $Pulau_Pinang_semalam_sah =  $value['total_semalam_sah'];
        }
        if ($value['state_id'] == 15) {
            $Perak_semalam_sah=  $value['total_semalam_sah'];
        }
        if ($value['state_id'] == 13) {
            $Selangor_semalam_sah =  $value['total_semalam_sah'];
        }
        if ($value['state_id'] == 24) {
            $Negeri_Sembilan_semalam_sah =  $value['total_semalam_sah'];
        }
        if ($value['state_id'] == 19) {
            $Melaka_semalam_sah =  $value['total_semalam_sah'];
        }        
        if ($value['state_id'] == 22) {
            $Johor_semalam_sah =  $value['total_semalam_sah'];
        }   
        if ($value['state_id'] == 12) {
            $Pahang_semalam_sah =  $value['total_semalam_sah'];
        }   
        if ($value['state_id'] == 18) {
            $Terengganu_semalam_sah =  $value['total_semalam_sah'];
        }  
        if ($value['state_id'] == 17) {
            $Kelantan_semalam_sah =  $value['total_semalam_sah'];
        }  
        if ($value['state_id'] == 20) {
            $Sabah_semalam_sah =  $value['total_semalam_sah'];
        }  
        if ($value['state_id'] == 21) {
            $Sarawak_semalam_sah =  $value['total_semalam_sah'];
        }  
        if ($value['state_id'] == 25) {
            $Labuan_semalam_sah =  $value['total_semalam_sah'];
        }  
        if ($value['state_id'] == 26) {
            $Kuala_lumpur_semalam_sah =  $value['total_semalam_sah'];
        }  
        if ($value['state_id'] == 27) {
            $Putrajaya_semalam_sah =  $value['total_semalam_sah'];
        }  
    }
$default = 0;


$pulau_pinang = "<br>Data Yang Sudah Di Sahkan : ".$Pulau_Pinang_sah."<br>Data Hari Ini : ".$Pulau_Pinang_today."<br>Data Sah Hari Ini : ".$Pulau_Pinang_todaysah."<br>Data Semalam : ".$Pulau_Pinang_semalam."<br>Data Sah Semalam : ".$Pulau_Pinang_semalam_sah;

$perlis = "<br>Data Yang Sudah Di Sahkan : ".$Perlis_sah."<br>Data Hari Ini : ".$Perlis_today."<br>Data Sah Hari Ini : ".$Perlis_todaysah."<br>Data Semalam : ".$Perlis_semalam."<br>Data Sah Semalam : ".$Perlis_semalam_sah;

$johor = "<br>Data Yang Sudah Di Sahkan : ".$Johor_sah."<br>Data Hari Ini : ".$Johor_today."<br>Data Sah Hari Ini : ".$Johor_todaysah."<br>Data Semalam : ".$Johor_semalam."<br>Data Sah Semalam : ".$Johor_semalam_sah;

$selangor = "<br>Data Yang Sudah Di Sahkan : ".$Selangor_sah."<br>Data Hari Ini : ".$Selangor_today."<br>Data Sah Hari Ini : ".$Selangor_todaysah."<br>Data Semalam : ".$Selangor_semalam."<br>Data Sah Semalam : ".$Selangor_semalam_sah;

$pahang =  "<br>Data Yang Sudah Di Sahkan : ".$Pahang_sah."<br>Data Hari Ini : ".$Pahang_today."<br>Data Sah Hari Ini : ".$Pahang_todaysah."<br>Data Semalam : ".$Pahang_semalam."<br>Data Sah Semalam : ".$Pahang_semalam_sah;

$terengganu =  "<br>Data Yang Sudah Di Sahkan : ".$Terengganu_sah."<br>Data Hari Ini : ".$Terengganu_today."<br>Data Sah Hari Ini : ".$Terengganu_todaysah."<br>Data Semalam : ".$Terengganu_semalam."<br>Data Sah Semalam : ".$Terengganu_semalam_sah;

$kuala_lumpur = "<br>Data Yang Sudah Di Sahkan : ".$Kuala_lumpur_sah."<br>Data Hari Ini : ".$Kuala_lumpur_today."<br>Data Sah Hari Ini : ".$Kuala_lumpur_todaysah."<br>Data Semalam : ".$Kuala_lumpur_semalam."<br>Data Sah Semalam : ".$Kuala_lumpur_semalam_sah;

$putrajaya = "<br>Data Yang Sudah Di Sahkan : ".$Putrajaya_sah."<br>Data Hari Ini : ".$Putrajaya_today."<br>Data Sah Hari Ini : ".$Putrajaya_todaysah."<br>Data Semalam : ".$Putrajaya_semalam."<br>Data Sah Semalam : ".$Putrajaya_semalam_sah;

$perak = "<br>Data Yang Sudah Di Sahkan : ".$Perak_sah."<br>Data Hari Ini : ".$Perak_today."<br>Data Sah Hari Ini : ".$Perak_todaysah."<br>Data Semalam : ".$Perak_semalam."<br>Data Sah Semalam : ".$Perak_semalam_sah;

$kedah = "<br>Data Yang Sudah Di Sahkan : ".$Kedah_sah."<br>Data Hari Ini : ".$Kedah_today."<br>Data Sah Hari Ini : ".$Kedah_todaysah."<br>Data Semalam : ".$Kedah_semalam."<br>Data Sah Semalam : ".$Kedah_semalam_sah;

$kelantan =  "<br>Data Yang Sudah Di Sahkan : ".$Kelantan_sah."<br>Data Hari Ini : ".$Kelantan_today."<br>Data Sah Hari Ini : ".$Kelantan_todaysah."<br>Data Semalam : ".$Kelantan_semalam."<br>Data Sah Semalam : ".$Kelantan_semalam_sah;

$melaka =  "<br>Data Yang Sudah Di Sahkan : ".$Melaka_sah."<br>Data Hari Ini : ".$Melaka_today."<br>Data Sah Hari Ini : ".$Melaka_todaysah."<br>Data Semalam : ".$Melaka_semalam."<br>Data Sah Semalam : ".$Melaka_semalam_sah;

$negeri_Sembilan = "<br>Data Yang Sudah Di Sahkan : ".$Negeri_Sembilan_sah."<br>Data Hari Ini : ".$Negeri_Sembilan_today."<br>Data Sah Hari Ini : ".$Negeri_Sembilan_todaysah."<br>Data Semalam : ".$Negeri_Sembilan_semalam."<br>Data Sah Semalam : ".$Negeri_Sembilan_semalam_sah;

$sabah = "<br>Data Yang Sudah Di Sahkan : ".$Sabah_sah."<br>Data Hari Ini : ".$Sabah_today."<br>Data Sah Hari Ini : ".$Sabah_todaysah."<br>Data Semalam : ".$Sabah_semalam."<br>Data Sah Semalam : ".$Sabah_semalam_sah;

$sarawak = "<br>Data Yang Sudah Di Sahkan : ".$Sarawak_sah."<br>Data Hari Ini : ".$Sarawak_today."<br>Data Sah Hari Ini : ".$Sarawak_todaysah."<br>Data Semalam : ".$Sarawak_semalam."<br>Data Sah Semalam : ".$Sarawak_semalam_sah;

$labuan = "<br>Data Yang Sudah Di Sahkan : ".$Labuan_sah."<br>Data Hari Ini : ".$Labuan_today."<br>Data Sah Hari Ini : ".$Labuan_todaysah."<br>Data Semalam : ".$Labuan_semalam."<br>Data Sah Semalam : ".$Labuan_semalam_sah;


?>



        <script type="text/javascript">
            $(function () {

              // Prepare demo data
                var data = [{ 'hc-key': 'my-pg', value: <?php echo $Pulau_Pinang; ?>,html : '<?php echo $pulau_pinang; ?>' },
                    { 'hc-key': 'my-pl', value: <?php echo $Perlis; ?>,html : '<?php echo $perlis; ?>'},
                    { 'hc-key': 'my-jh', value: <?php echo $Johor; ?>,html : '<?php echo $johor; ?>' },
                    { 'hc-key': 'my-sl', value: <?php echo $Selangor; ?>,html : '<?php echo $selangor; ?>' },
                    { 'hc-key': 'my-kl', value: <?php echo $Kuala_lumpur; ?>,html : '<?php echo $kuala_lumpur; ?>' },
                    { 'hc-key': 'my-pj', value: <?php echo $Putrajaya; ?>,html : '<?php echo $putrajaya; ?>' },
                    { 'hc-key': 'my-pk', value: <?php echo $Perak; ?>,html : '<?php echo $perak; ?>' },
                    { 'hc-key': 'my-kh', value: <?php echo $Kedah; ?>,html : '<?php echo $kedah; ?>' },
                    { 'hc-key': 'my-kn', value: <?php echo $Kelantan; ?> ,html : '<?php echo $kelantan; ?>'},
                    { 'hc-key': 'my-me', value: <?php echo $Melaka; ?> ,html : '<?php echo $melaka; ?>'},
                    { 'hc-key': 'my-ns', value: <?php echo $Negeri_Sembilan; ?>,html : '<?php echo $negeri_Sembilan; ?>' },
                    { 'hc-key': 'my-ph', value: <?php echo $Pahang; ?>,html : '<?php echo $pahang; ?>' },
                    { 'hc-key': 'my-te', value: <?php echo $Terengganu; ?>,html : '<?php echo $terengganu; ?>' },
                    { 'hc-key': 'my-sa', value: <?php echo $Sabah; ?>,html : '<?php echo $sabah; ?>' },
                    { 'hc-key': 'my-sk', value: <?php echo $Sarawak; ?>,html : '<?php echo $sarawak; ?>' },
                    { 'hc-key': 'my-la', value: <?php echo $Labuan; ?>,html : '<?php echo $labuan; ?>' },
                    { 'hc-key': '', value: <?php echo $default; ?> }];
                    
                // Initiate the chart
                mapChart = $('#map').highcharts('Map', {
                    
                    title : {
                        text : 'Malaysia'
                    },
                    subtitle : {
                        text : 'Maklumat Data - Cypress Diversified Sdn Bhd<br>Jumlah Semasa : <b><?php echo $total_all; ?></b>'
                    },


                    mapNavigation: {
                        enabled: false,
                        enableDoubleClickZoomTo: false,
                        buttonOptions: {
                            verticalAlign: 'top'
                        }
                    },

                    tooltip: {
                        backgroundColor: 'none',
                        borderWidth: 0,
                        shadow: false,
                        useHTML: true,
                        padding: 0,
                             pointFormat: '<span class="f32"></span>'
                            + ' {point.label}<br>{point.name}: <b>{point.value}</b>{point.html}<br>',
                        positioner: function () {
                            return { x: 320, y: 100 };
                        }
                    },

                    colorAxis: {
                        min: 0,
                        positioner: function () {
                            return { x: 5500, y:100 };
                        }
                    },

                    series : [{
                        data : data,
                        mapData: Highcharts.maps['countries/my/my-all'],
                        joinBy: 'hc-key',
                         name: 'Maklumat Profil <br><b><?php echo date("d-m-Y"); ?><b>',
            
                        states: {
                            hover: {
                                color: '#BADA55'
                            }
                        },
   
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }]
                });
            });
        </script>
<!-- END JAVASCRIPTS -->
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

