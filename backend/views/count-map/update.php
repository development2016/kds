<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CountMap */

$this->title = 'Update Count Map: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Count Maps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="count-map-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
