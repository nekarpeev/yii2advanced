<?php
/* @var $this yii\web\View */
/* @var $bookList [] frontend\models\Book */

?>
<h1>books list</h1>
<div class="row">
    <div class="col-lg-12">
        <?php foreach ($bookList as $book): ?>
            <div class="col-lg-8">
                <h3> <?php echo $book->name; ?> </h3>
                <p> <?php echo $book->getDatePublished(); ?> </p>
                <p> <?php echo $book->getPublisherName(); ?> </p>
                <p> <?php echo $book->getAuthorsName(); ?> </p>

            </div>
        <?php endforeach; ?>

    </div>
    <p><a class="btn btn-primary" href="<?php echo Yii::$app->urlManager->createUrl('bookshop/create'); ?>">Add book</a></p>
</div>