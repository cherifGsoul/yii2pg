<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\core\records\Node */
/* @var $form ActiveForm */
?>
<div class="form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'type') ?>
        <?= $form->field($model, 'slug') ?>
        <?= $form->field($model, 'content') ?>
        <?= $form->field($model, 'excerpt') ?>
        <?= $form->field($model, 'root') ?>
        <?= $form->field($model, 'lft') ?>
        <?= $form->field($model, 'rgt') ?>
        <?= $form->field($model, 'level') ?>
        <?= $form->field($model, 'menu_order') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'created_by') ?>
        <?= $form->field($model, 'updated_by') ?>
        <?= $form->field($model, 'comment_count') ?>
        <?= $form->field($model, 'created_at') ?>
        <?= $form->field($model, 'updated_at') ?>
        <?= $form->field($model, 'guid') ?>
        <?= $form->field($model, 'mime_type') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('juva', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- _form -->
