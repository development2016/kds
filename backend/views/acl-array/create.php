<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AclArray */

$this->title = 'Create Acl Array';
$this->params['breadcrumbs'][] = ['label' => 'Acl Arrays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acl-array-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
