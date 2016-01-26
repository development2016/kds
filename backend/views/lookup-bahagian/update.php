<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LookupBahagian */

$this->title = 'Update Lookup Bahagian: ' . ' ' . $model->bahagian_id;
$this->params['breadcrumbs'][] = ['label' => 'Lookup Bahagians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bahagian_id, 'url' => ['view', 'id' => $model->bahagian_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lookup-bahagian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
