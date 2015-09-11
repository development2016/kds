<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pfn */

$this->title = 'Update Pfn: ' . ' ' . $model->pfn_id;
$this->params['breadcrumbs'][] = ['label' => 'Pfns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pfn_id, 'url' => ['view', 'id' => $model->pfn_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pfn-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
