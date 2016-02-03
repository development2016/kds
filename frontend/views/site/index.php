<?php
use miloschuman\highcharts\Highmaps;
use yii\web\JsExpression;
$this->title = 'Komuniti Development System';
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Dashboard <small>statistics</small></h1>
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

						</div>
						<div class="portlet-body">
                            <?php  if($role == 5){ ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet white-cascade box">
                                        <div class="portlet-body">
                                            <div class="portlet-title">
                                                <div class="caption font-green-haze">
                                                    <h4 class="caption-subject bold uppercase">Jumlah Data Yang Telah Disahkan</h4>
                                                </div><br>
                                            </div>
                                            
                                            <table class='table table-bordered table-hover' width='100%'>
                                                <tr>
                                                    <th>Negeri</th>
                                                    <th>Jumlah Data (Sah)</th>
                                                </tr>
                                            <?php                                                    
                                                foreach ($data as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $value['state'];?></td>
                                                    <td><?php echo $value['jumlah'];?></td>
                                                </tr>
                                            <?php }?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet white-cascade box">
                                        <div class="portlet-body">
                                            <div class="portlet-title">
                                                <div class="caption font-green-haze">
                                                    <h4 class="caption-subject bold uppercase">Jumlah Data Yang Anda Masukkan</h4>
                                                </div><br>
                                            </div>
                                            <table class='table table-bordered table-hover' width='100%'>
                                                <tr>
                                                    <th>Negeri</th>
                                                    <th>Jumlah Data Di Masukkan</th>
                                                </tr>
                                            <?php 
                                                foreach ($data1 as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $value['state'];?></td>
                                                    <td><?php echo $value['jumlah_dimasukkan'];?></td>
                                                </tr>
                                            <?php }?>
                                            </table>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }  
                                else {
                                    $default = 0;

$pulau_pinang = $perlis = $johor = $selangor = $kuala_lumpur = $putrajaya = $perak = $kedah = $kelantan = $melaka = $negeri_sembilan = $pahang = $terengganu = $sabah = $sarawak = $labuan = 0;
foreach ($data2 as $key => $value) {
    if ($value['state_id'] == 12) {
        $pahang = $value['total_by_state'];
    }
    if ($value['state_id'] == 13) {
        $selangor = $value['total_by_state'];
    }
    if ($value['state_id'] == 14) {
        $perlis = $value['total_by_state'];
    }
    if ($value['state_id'] == 15) {
        $perak = $value['total_by_state'];
    }
    if ($value['state_id'] == 16) {
        $kedah = $value['total_by_state'];
    }
    if ($value['state_id'] == 17) {
        $kelantan = $value['total_by_state'];
    }
    if ($value['state_id'] == 18) {
        $terengganu = $value['total_by_state'];
    }
    if ($value['state_id'] == 19) {
        $melaka = $value['total_by_state'];
    }
    if ($value['state_id'] == 20) {
        $sabah = $value['total_by_state'];
    }
    if ($value['state_id'] == 21) {
        $sarawak = $value['total_by_state'];
    }
    if ($value['state_id'] == 22) {
        $johor = $value['total_by_state'];
    }
    if ($value['state_id'] == 23) {
        $pulau_pinang = $value['total_by_state'];
    }
    if ($value['state_id'] == 24) {
        $negeri_sembilan = $value['total_by_state'];
    }
    if ($value['state_id'] == 25) {
        $labuan = $value['total_by_state'];
    }
    if ($value['state_id'] == 26) {
        $kuala_lumpur = $value['total_by_state'];
    }
    if ($value['state_id'] == 27) {
        $putrajaya = $value['total_by_state'];
    }
}
                                echo Highmaps::widget([
                                    'options' => [
                                        'title'=>[
                                            'text'=>'Malaysia',
                                        ],
                                            'subtitle' => [
                                                'text' => 'Maklumat Data - Cypress Diversified Sdn Bhd<br>Jumlah Semasa : <b>'.$total.'</b>',
                                            ],
                                            'mapNavigation' => [
                                                'enabled' => true,
                                                'enableDoubleClickZoomTo' => true,
                                            ],
                                            'colorAxis' => [
                                                'min' => 0, 
                                                'positioner' => [
                                                    'x'=> 5500,
                                                    'y'=>100,
                                                ],
                                            ],
                                            'series' => [
                                                [
                                                    'data' => [
                                                        ['hc-key' => 'my-pg', 'value' => $pulau_pinang],
                                                        ['hc-key' => 'my-pl', 'value' => $perlis ],
                                                        ['hc-key' => 'my-jh', 'value' => $johor],
                                                        ['hc-key' => 'my-sl', 'value' => $selangor],
                                                        ['hc-key' => 'my-kl', 'value' => $kuala_lumpur],
                                                        ['hc-key' => 'my-pj', 'value' => $putrajaya],
                                                        ['hc-key' => 'my-pk', 'value' => $perak],
                                                        ['hc-key' => 'my-kh', 'value' => $kedah],
                                                        ['hc-key' => 'my-kn', 'value' => $kelantan],
                                                        ['hc-key' => 'my-me', 'value' => $melaka],
                                                        ['hc-key' => 'my-ns', 'value' => $negeri_sembilan],
                                                        ['hc-key' => 'my-ph', 'value' => $pahang],
                                                        ['hc-key' => 'my-te', 'value' => $terengganu],
                                                        ['hc-key' => 'my-sa', 'value' => $sabah],
                                                        ['hc-key' => 'my-sk', 'value' => $sarawak],
                                                        ['hc-key' => 'my-la', 'value' => $labuan],
                                                        [ 'hc-key'=> '', 'value'=> $default],
                                                    ],
                                                    'mapData' => new JsExpression('Highcharts.maps["countries/my/my-all"]'),
                                                    'joinBy' => 'hc-key',
                                                    'name' => 'Jumlah data',
                                                    'states' => [
                                                        'hover' => [
                                                            'color' => '#BADA55',
                                                        ]
                                                    ],
                                                    'dataLabels' => [
                                                        'enabled' => true,
                                                        'format' => '{point.name}',
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]);
                            ?>
                            <br>
                            <div class="row">
                                <div class='table-responsive'>
                                    <table class='table'>
                                    <tr>
                                        <th>Negeri</th>
                                        <th>Jumlah Data Mengikut Negeri</th>
                                    </tr>
                                    <?php foreach ($data2 as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $value['state']; ?></td>
                                        <td><?php echo $value['total_by_state']; ?></td>
                                    </tr>
                                
                                <?php }?>
                                </table>
                                </div>
                                
                            </div>
                            
                            <?php } ?>
						</div>
					</div>
				</div>
				<!-- END SAMPLE FORM PORTLET-->
			</div>
			<!-- END PAGE CONTENT INNER -->
        


        </div>
    </div>
    <!-- END PAGE CONTENT -->
