<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acl Arrays';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acl-array-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Acl Array', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'data_state',
            'acl_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
