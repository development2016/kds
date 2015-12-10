<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Answer */

$this->title = 'Update Answer: ' . ' ' . $model->question->soalan;
?>
<div class="answer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_edit', [
        'model' => $model,
    ]) ?>

</div>
