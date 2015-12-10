<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CountMukim */

$this->title = 'Create Count Mukim';
$this->params['breadcrumbs'][] = ['label' => 'Count Mukims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="count-mukim-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
