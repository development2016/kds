<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\LookupMenu;
$menu = ArrayHelper::map(LookupMenu::find()->asArray()->all(), 'menu_id', 'menu');
/* @var $this yii\web\View */
/* @var $model common\models\RequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeDropDownList($model, 'menu_id', $menu, 
                        [
                            'prompt'=>'(Sila Pilih)',
                            'class'=>'form-control',

                        ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'menu_id'); ?></label>
                        <span class="help-block"><?= Html::error($model,'menu_id'); ?></span>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
