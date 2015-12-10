<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserPengalaman */

$this->title = 'Tambah Pengalaman';
$this->params['breadcrumbs'][] = ['label' => 'User Pengalamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-pengalaman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
