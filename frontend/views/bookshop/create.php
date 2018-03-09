<?php
/**
 * @var $this \yii\web\View
 * @var $book \frontend\models\Book
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php
if ($book->hasErrors()):
    foreach ($book->getErrors() as $error): ?>
        <p> <?php echo $error[0] ?></p>
    <?php endforeach;
endif;
?>
<div class="row">
    <div class="col-lg-12">
        <?php $form = ActiveForm::begin(); ?>

        <?php echo $form->field($book, 'name'); ?>
        <?php echo $form->field($book, 'isbn'); ?>
        <?php echo $form->field($book, 'date_published'); ?>
        <?php echo $form->field($book, 'publisher_id'); ?>

        <?php echo Html::submitButton('Save', ['class' => 'btn btn-primary']); ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<div class="row">
    <?php echo Html::a('to book list', ['bookshop/index'], ['class' => 'btn btn-primary']) ?>
</div>


