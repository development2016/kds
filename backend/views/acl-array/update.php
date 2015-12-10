<?php

use yii\helpers\Html;

?>
<div class="acl-array-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form',['model_state' => $model_state, 'model' => $model,]) ?>

</div>
