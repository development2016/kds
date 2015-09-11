<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CountMap */

$this->title = 'Create Count Map';
$this->params['breadcrumbs'][] = ['label' => 'Count Maps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="count-map-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'countState'=>$countState,
    ]) ?>

</div>
