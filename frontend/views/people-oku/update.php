<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PeopleOku */

$this->title = 'Update People Oku: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'People Okus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="people-oku-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
