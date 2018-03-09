<?php use yii\helpers\Url; ?>

<h1><?php echo $item['title']; ?></h1>

<p> <?php echo $item['content']; ?> </p>

    <a class="btn btn-info" href="<?php echo Url::to(['test/index']) ?>">К списку новостей</a>
