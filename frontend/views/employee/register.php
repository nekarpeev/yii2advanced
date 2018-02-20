<h1>Welcome to our company!</h1>
<form method="post">
    <p >First Name</p>
    <input type="text" name="first_name" value="<?php echo $model->first_name; ?>">
    <br><br>
    <p>Last Name</p>
    <input type="text" name="last_name" value="<?php echo $model->last_name; ?>">
    <br><br>
    <p>Middle Name</p>
    <input type="text" name="middle_name" value="<?php echo $model->middle_name; ?>">
    <br><br>
    <p>E-mail Name</p>
    <input type="text" name="email" value="<?php echo $model->email; ?>">
    <br><br>
    <p><button class="btn btn-success" type="submit">Submit</button></p>
</form>

<div class="row">
    <?php
        if($model->hasErrors()):
            foreach ($model->getErrors() as $error): ?>
                <p> <?php echo $error[0] ?></p>
            <?php endforeach;
        endif;
    ?>
</div>