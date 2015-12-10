<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TanggunganOkuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tanggungan Okus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tanggungan-oku-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tanggungan Oku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            'umur',
            'hubungan',
            'no_pendaftaran',
            // 'kategori',
            // 'nota',
            // 'tahap_pendidikan',
            // 'nama_sekolah',
            // 'people_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
