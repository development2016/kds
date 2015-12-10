<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CountMukimSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Count Mukims';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="count-mukim-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Count Mukim', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ict',
            'kesihatan',
            'pendidikan',
            'keusahawanan',
            // 'riadah',
            // 'mukim_id',
            // 'district_id',
            // 'state_id',
            // 'last_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
