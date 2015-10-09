<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StatusHarian */

$this->title = 'Update Status Harian: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Status Harians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="status-harian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
