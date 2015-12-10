<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WifeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wives';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wife-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Wife', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'wife_id',
            'wife_name',
            'wife_ic',
            'wife_work',
            'wife_oku',
            // 'people_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
