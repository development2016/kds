<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AclArray */


?>
<div class="acl-array-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'acl_array_id',
            'data_state',
            'acl_id',
        ],
    ]) ?>

</div>
