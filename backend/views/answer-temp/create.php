<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AnswerTemp */

$this->title = 'Create Answer Temp';
$this->params['breadcrumbs'][] = ['label' => 'Answer Temps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-temp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
