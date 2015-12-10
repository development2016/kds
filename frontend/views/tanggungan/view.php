<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Tanggungan */

$this->title = $model->tanggungan_id;
$this->params['breadcrumbs'][] = ['label' => 'Tanggungans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tanggungan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tanggungan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tanggungan_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tanggungan_id',
            'nama_tanggungan',
            'no_ic_tanggungan',
            'tarikh_lahir',
            'edu_level',
            'tanggungan_kerja',
            'hubungan',
            'tanggungan_oku',
            'note',
            'people_id',
        ],
    ]) ?>

</div>
