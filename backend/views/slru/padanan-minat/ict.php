<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'Komuniti Development System';
?>

<?php foreach ($model as $key => $value) {
	if ($value['state_id'] == 12 ) {
		$pahang_q_21 = (int)$value['q_21'];
		$pahang_q_22 = (int)$value['q_22'];
		$pahang_q_23 = (int)$value['q_23'];
		$pahang_q_24 = (int)$value['q_24'];
		$pahang_q_25 = (int)$value['q_25'];

	}
	if ($value['state_id'] == 14 ) {
		$perlis_q_21 = (int)$value['q_21'];
		$perlis_q_22 = (int)$value['q_22'];
		$perlis_q_23 = (int)$value['q_23'];
		$perlis_q_24 = (int)$value['q_24'];
		$perlis_q_25 = (int)$value['q_25'];

	}
	if ($value['state_id'] == 15 ) {
		$perak_q_21 = (int)$value['q_21'];
		$perak_q_22 = (int)$value['q_22'];
		$perak_q_23 = (int)$value['q_23'];
		$perak_q_24 = (int)$value['q_24'];
		$perak_q_25 = (int)$value['q_25'];

	}
	if ($value['state_id'] == 16 ) {
		$kedah_q_21 = (int)$value['q_21'];
		$kedah_q_22 = (int)$value['q_22'];
		$kedah_q_23 = (int)$value['q_23'];
		$kedah_q_24 = (int)$value['q_24'];
		$kedah_q_25 = (int)$value['q_25'];

	}
	if ($value['state_id'] == 18 ) {
		$terengganu_q_21 = (int)$value['q_21'];
		$terengganu_q_22 = (int)$value['q_22'];
		$terengganu_q_23 = (int)$value['q_23'];
		$terengganu_q_24 = (int)$value['q_24'];
		$terengganu_q_25 = (int)$value['q_25'];

	}
	if ($value['state_id'] == 22 ) {
		$johor_q_21 = (int)$value['q_21'];
		$johor_q_22 = (int)$value['q_22'];
		$johor_q_23 = (int)$value['q_23'];
		$johor_q_24 = (int)$value['q_24'];
		$johor_q_25 = (int)$value['q_25'];

	}



}

echo Highcharts::widget([
   'options' => [

       'chart' => [
          'type' =>'column',
          'renderTo' => 'ictchart',
          //'width' => '850'

      ],

      'title' => ['text' => 'Graf Minat Ict'],
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
         	'name' => 'Kelas ICT', 
         	'data' => [$pahang_q_21,$perlis_q_21,$perak_q_21,$kedah_q_21,$terengganu_q_21,$johor_q_21]
        ],
        [
         	'name' => 'Bengkel kesedaran ICT',
         	'data' => [$pahang_q_22,$perlis_q_22,$perak_q_22,$kedah_q_22,$terengganu_q_22,$johor_q_22]
        ],
        [
         	'name' => 'Kursus ICT',
         	'data' => [$pahang_q_23,$perlis_q_23,$perak_q_23,$kedah_q_23,$terengganu_q_23,$johor_q_23]
        ],
        [
         	'name' => 'Bengkel baik pulih komputer',
         	'data' => [$pahang_q_24,$perlis_q_24,$perak_q_24,$kedah_q_24,$terengganu_q_24,$johor_q_24]
        ],
        [
         	'name' => 'Kursus rangkaian komputer',
         	'data' => [$pahang_q_25,$perlis_q_25,$perak_q_25,$kedah_q_25,$terengganu_q_25,$johor_q_25]
        ]
      ]
   ]
]);

?>



<div id="ictchart"></div>