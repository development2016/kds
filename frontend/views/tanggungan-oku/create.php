<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TanggunganOku */

$this->title = 'Create Tanggungan Oku';
$this->params['breadcrumbs'][] = ['label' => 'Tanggungan Okus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tanggungan-oku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
