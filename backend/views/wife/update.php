<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Wife */

$this->title = 'Update Wife: ' . ' ' . $model->wife_id;
$this->params['breadcrumbs'][] = ['label' => 'Wives', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->wife_id, 'url' => ['view', 'id' => $model->wife_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wife-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
