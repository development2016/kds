<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StatusHarian */

$this->title = 'Create Status Harian';
$this->params['breadcrumbs'][] = ['label' => 'Status Harians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-harian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
