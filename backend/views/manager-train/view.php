<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ManagerTrain */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Manager Trains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-train-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'rangkaian_fasiliti_awam',
            'cat_id',
            'location',
            'state_id',
            'district_id',
            'mukim_id',
            'sub_base_id',
            'cluster_id',
            'kampung_id',
            'alamat',
            'poskod',
            'nama_pengurus',
            'ic',
            'jantina',
            'no_fon',
            'date_enter',
            'enter_by',
        ],
    ]) ?>

</div>
