<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AclRoleMenu */

$this->title = 'Update Acl Role Menu: ' . ' ' . $model->role_menu_id;
$this->params['breadcrumbs'][] = ['label' => 'Acl Role Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->role_menu_id, 'url' => ['view', 'id' => $model->role_menu_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acl-role-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
