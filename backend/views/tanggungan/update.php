<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tanggungan */

$this->title = 'Update Tanggungan: ' . ' ' . $model->tanggungan_id;
$this->params['breadcrumbs'][] = ['label' => 'Tanggungans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tanggungan_id, 'url' => ['view', 'id' => $model->tanggungan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tanggungan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
