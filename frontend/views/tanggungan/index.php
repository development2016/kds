<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TanggunganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tanggungans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tanggungan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tanggungan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tanggungan_id',
            'nama_tanggungan',
            'no_ic_tanggungan',
            'tarikh_lahir',
            'edu_level',
            // 'tanggungan_kerja',
            // 'hubungan',
            // 'tanggungan_oku',
            // 'note',
            // 'people_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
