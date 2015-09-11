<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Wife */

$this->title = 'Create Wife';
$this->params['breadcrumbs'][] = ['label' => 'Wives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wife-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
