<?php

use frontend\widgets\newsList\NewsList;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Test project!</h2>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2>Latest news</h2>

                <?php echo NewsList::widget(['showLimit' => 3]); ?>

            </div>
            <div class="col-lg-6">
                <h2>Subscribe form!</h2>

                <p><a class="btn btn-primary" href="<?php echo Yii::$app->urlManager->createUrl('newsletter/subscribe'); ?>">Press me to subscribe</a></p>

            </div>
        </div>
    </div>
</div>
