<?php

foreach ($news_list as $item): ?>

    <h1><a href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(['test/view', 'id' => $item['id'] ]); ?> ">
            <?php echo $item['title']; ?>
        </a></h1>

    <p> <?php echo $item['content']; ?></p>
    <hr>

<?php endforeach;