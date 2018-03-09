<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var $model frontend\models\Employee
 */
if ($model->hasErrors()):
    foreach ($model->getErrors() as $error): ?>
        <p> <?php echo $error[0] ?></p>
    <?php endforeach;
endif;
?>


<h1>Welcome to our company!</h1>
<div class="row mt-3">
    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, 'first_name'); ?>
    <?php echo $form->field($model, 'last_name'); ?>
    <?php echo $form->field($model, 'middle_name'); ?>
    <?php echo $form->field($model, 'born'); ?>
    <?php echo $form->field($model, 'start_date'); ?>
    <?php echo $form->field($model, 'position'); ?>
    <?php echo $form->field($model, 'id_code'); ?>
    <?php echo $form->field($model, 'email'); ?>
    <?php echo $form->field($model, 'city')->dropDownList($model->getCitiesList()); ?>

    <?php echo Html::submitInput('Send', ['class' => 'btn btn-primary']); ?>

    <?php ActiveForm::end(); ?>
</div>