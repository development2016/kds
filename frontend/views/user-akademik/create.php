<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserAkademik */

$this->title = 'Tambah Akademik';
$this->params['breadcrumbs'][] = ['label' => 'User Akademiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-akademik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
