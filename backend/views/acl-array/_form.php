<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?><?php $form = ActiveForm::begin(); ?>

        <?php foreach ($model_state as $key => $value) {  ?>

            <div class="md-checkbox">

                <input type="checkbox" id="checkbox<?php echo $value['state_id'] ?>" name="AclArray[data_state][]" class="md-check " value="<?php echo $value['state_id'] ?>">
                <label for="checkbox<?php echo $value['state_id'] ?>">
                <span></span>
                <span class="check"></span>
                <span class="box"></span>
                <?php echo $value['state']; ?> </label>
            </div>
            
        <?php } ?>
         <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>       

          <?php ActiveForm::end(); ?>