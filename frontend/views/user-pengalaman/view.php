<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserPengalaman */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Pengalamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-pengalaman-view">

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
            'nama_organisasi',
            'jawatan',
            'bidang',
            'tarikh_mula',
            'tarikh_tamat',
            'user_id',
        ],
    ]) ?>

</div>
