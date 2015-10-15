<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>Slru</h1>
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
                    <a href="#">Slru</a><i class="fa fa-circle"></i>
                </li>
                <li class="active">
                     Demografi Jantina
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

                        <?php 

                            
                            foreach ($model as $key => $value) {
                              if ($value['state_id'] == 12) {
                                  $ict = (int)$value['ict'];
                                  $kesihatan = (int)$value['kesihatan'];
                                  $pendidikan = (int)$value['pendidikan'];
                                  $keusahawanan = (int)$value['keusahawanan'];
                                  $riadah = (int)$value['riadah'];

                                  $pahang = array($ict,$kesihatan,$pendidikan,$keusahawanan,$riadah);
                              }

                              if ($value['state_id'] == 14) {
                                  $ict = (int)$value['ict'];
                                  $kesihatan = (int)$value['kesihatan'];
                                  $pendidikan = (int)$value['pendidikan'];
                                  $keusahawanan = (int)$value['keusahawanan'];
                                  $riadah = (int)$value['riadah'];

                                  $perlis = array($ict,$kesihatan,$pendidikan,$keusahawanan,$riadah);
                              }
                              if ($value['state_id'] == 15) {
                                  $ict = (int)$value['ict'];
                                  $kesihatan = (int)$value['kesihatan'];
                                  $pendidikan = (int)$value['pendidikan'];
                                  $keusahawanan = (int)$value['keusahawanan'];
                                  $riadah = (int)$value['riadah'];

                                  $perak = array($ict,$kesihatan,$pendidikan,$keusahawanan,$riadah);
                              }
                              if ($value['state_id'] == 16) {
                                  $ict = (int)$value['ict'];
                                  $kesihatan = (int)$value['kesihatan'];
                                  $pendidikan = (int)$value['pendidikan'];
                                  $keusahawanan = (int)$value['keusahawanan'];
                                  $riadah = (int)$value['riadah'];

                                  $kedah = array($ict,$kesihatan,$pendidikan,$keusahawanan,$riadah);
                              }
                              if ($value['state_id'] == 18) {
                                  $ict = (int)$value['ict'];
                                  $kesihatan = (int)$value['kesihatan'];
                                  $pendidikan = (int)$value['pendidikan'];
                                  $keusahawanan = (int)$value['keusahawanan'];
                                  $riadah = (int)$value['riadah'];

                                  $terengganu = array($ict,$kesihatan,$pendidikan,$keusahawanan,$riadah);
                              }
                              if ($value['state_id'] == 22) {
                                  $ict = (int)$value['ict'];
                                  $kesihatan = (int)$value['kesihatan'];
                                  $pendidikan = (int)$value['pendidikan'];
                                  $keusahawanan = (int)$value['keusahawanan'];
                                  $riadah = (int)$value['riadah'];

                                  $johor = array($ict,$kesihatan,$pendidikan,$keusahawanan,$riadah);
                              }



                            }
                

                        echo Highcharts::widget([
                            'scripts' => [
                                 'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
                                 'modules/exporting', // adds Exporting button/menu to chart
                              ],
                              'options' => [
                              'chart' => [
                                  'polar' => true,
                                  'type' =>'line',
                                  'height' => 900

                                  
                              ],
                              'pane' => [
                                  'size' => '90%',
                              ],

                              'title' => [
                                'text' => 'Graf Padanan Minat Mengikut Negeri',
                                 'x' => -80
                              ],
                              'xAxis' => [
                                  'categories' => ['ICT', 'Kesihatan', 'Pendidikan','Keusahawanan','Riadah'],
                                  'tickmarkPlacement' =>'on',
                                  'lineWidth' => 0
                              ],
                              'yAxis' => [
                                  'gridLineInterpolation' => 'polygon',
                                 
                              ],
                              'legend' => [
                                'align' => 'right',
                                'verticalAlign' => 'top',
                                'y'=>70,
                                'layout' => 'vertical',
                              ],
                              'series' => [
                                 [
                                   'name' => 'Pahang', 
                                   'data' => $pahang
                                 ],
                                 [
                                   'name' => 'Perlis', 
                                   'data' => $perlis
                                 ],
                                 [
                                   'name' => 'Perak', 
                                   'data' => $perak
                                 ],
                                  [
                                   'name' => 'Kedah', 
                                   'data' => $kedah
                                 ],
                                  [
                                   'name' => 'Terengganu', 
                                   'data' => $terengganu
                                 ],
                                  [
                                   'name' => 'Johor', 
                                   'data' => $johor
                                 ]
                              ]
                           ]
                        ]); ?>



                        <table class="table table-striped table-bordered">
                          <tr>
                            <td><?= Html::a('ICT', FALSE, ['value'=>Url::to(['slru/ict']),'class' => 'ict','id'=>'ict']) ?></td>
                            <td><?= Html::a('Kesihatan', ['slru/minat']) ?></td>
                            <td><?= Html::a('Pendidikan', ['slru/sd1']) ?></td>
                            <td><?= Html::a('Keusahawanan', ['slru/sd1']) ?></td>
                            <td><?= Html::a('Riadah', ['slru/sd1']) ?></td>
                          </tr>
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