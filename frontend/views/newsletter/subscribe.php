<?php
/**
 * $model frontend\models\Subscribe
 */
    if( $model->hasErrors() ) {
        print_r( $model->getErrors() );
    }

?>
<form method="post">
    <label for="">Email
        <input type="text" name="email">
    </label>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
