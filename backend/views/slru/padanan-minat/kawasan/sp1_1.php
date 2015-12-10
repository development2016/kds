<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>


<?php foreach ($model2 as $key => $value2) {
  if ($value2['state_id'] == 12 ) {
    $pahang_q_21 = (int)$value2['ict'];
    $pahang_q_22 = (int)$value2['kesihatan'];
    $pahang_q_23 = (int)$value2['pendidikan'];
    $pahang_q_24 = (int)$value2['keusahawanan'];
    $pahang_q_25 = (int)$value2['riadah'];

  }
  if ($value2['state_id'] == 14 ) {
    $perlis_q_21 = (int)$value2['ict'];
    $perlis_q_22 = (int)$value2['kesihatan'];
    $perlis_q_23 = (int)$value2['pendidikan'];
    $perlis_q_24 = (int)$value2['keusahawanan'];
    $perlis_q_25 = (int)$value2['riadah'];

  }
  if ($value2['state_id'] == 15 ) {
    $perak_q_21 = (int)$value2['ict'];
    $perak_q_22 = (int)$value2['kesihatan'];
    $perak_q_23 = (int)$value2['pendidikan'];
    $perak_q_24 = (int)$value2['keusahawanan'];
    $perak_q_25 = (int)$value2['riadah'];

  }
  if ($value2['state_id'] == 16 ) {
    $kedah_q_21 = (int)$value2['ict'];
    $kedah_q_22 = (int)$value2['kesihatan'];
    $kedah_q_23 = (int)$value2['pendidikan'];
    $kedah_q_24 = (int)$value2['keusahawanan'];
    $kedah_q_25 = (int)$value2['riadah'];

  }
  if ($value2['state_id'] == 18 ) {
    $terengganu_q_21 = (int)$value2['ict'];
    $terengganu_q_22 = (int)$value2['kesihatan'];
    $terengganu_q_23 = (int)$value2['pendidikan'];
    $terengganu_q_24 = (int)$value2['keusahawanan'];
    $terengganu_q_25 = (int)$value2['riadah'];

  }
  if ($value2['state_id'] == 22 ) {
    $johor_q_21 = (int)$value2['ict'];
    $johor_q_22 = (int)$value2['kesihatan'];
    $johor_q_23 = (int)$value2['pendidikan'];
    $johor_q_24 = (int)$value2['keusahawanan'];
    $johor_q_25 = (int)$value2['riadah'];

  }



}

echo Highcharts::widget([
   'options' => [

       'chart' => [
          'type' =>'column',
          //'renderTo' => 'ictchart2',
          //'width' => '850'

      ],

      'title' => ['text' => 'Graf Minat By Group'],
      'xAxis' => [
         'categories' => ['Pahang','Perlis','Perak','Kedah','Terengganu','Johor']
      ],
      'yAxis' => [
         'title' => ['text' => 'Jumlah']
      ],




      'exporting' => [
        'enabled'=> false
      ],
         

      'series' => [
        [
          'name' => 'ICT', 
          'data' => [$pahang_q_21,$perlis_q_21,$perak_q_21,$kedah_q_21,$terengganu_q_21,$johor_q_21]
        ],
        [
          'name' => 'Kesihatan',
          'data' => [$pahang_q_22,$perlis_q_22,$perak_q_22,$kedah_q_22,$terengganu_q_22,$johor_q_22]
        ],
        [
          'name' => 'Pendidikan',
          'data' => [$pahang_q_23,$perlis_q_23,$perak_q_23,$kedah_q_23,$terengganu_q_23,$johor_q_23]
        ],
        [
          'name' => 'Keusahawanan',
          'data' => [$pahang_q_24,$perlis_q_24,$perak_q_24,$kedah_q_24,$terengganu_q_24,$johor_q_24]
        ],
        [
          'name' => 'Riadah',
          'data' => [$pahang_q_25,$perlis_q_25,$perak_q_25,$kedah_q_25,$terengganu_q_25,$johor_q_25]
        ]
      ]
   ]
]);

?>


