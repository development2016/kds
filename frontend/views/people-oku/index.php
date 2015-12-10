<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PeopleOkuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'People Okus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-oku-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create People Oku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'no_pendaftaran',
            'kategori_oku',
            'nota',
            'people_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
