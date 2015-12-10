<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Wife */

$this->title = $model->wife_id;
$this->params['breadcrumbs'][] = ['label' => 'Wives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wife-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->wife_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->wife_id], [
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
            'wife_id',
            'wife_name',
            'wife_ic',
            'wife_work',
            'wife_oku',
            'people_id',
        ],
    ]) ?>

</div>
