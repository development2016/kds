<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ManagerTrain */

$this->title = 'Create Manager Train';
$this->params['breadcrumbs'][] = ['label' => 'Manager Trains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manager-train-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
