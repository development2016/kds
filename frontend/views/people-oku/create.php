<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PeopleOku */

$this->title = 'Create People Oku';
$this->params['breadcrumbs'][] = ['label' => 'People Okus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-oku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
