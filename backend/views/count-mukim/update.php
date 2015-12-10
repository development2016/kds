<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CountMukim */

$this->title = 'Update Count Mukim: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Count Mukims', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="count-mukim-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
