<?php

use yii\db\Migration;

/**
 * Handles the creation of table `employee`.
 */
class m180217_195055_create_employee_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('employee', [
            'id'          => $this->primaryKey(),
            'first_name'  => $this->string(),
            'last_name'   => $this->string(),
            'middle_name' => $this->string(),
            'born'        => $this->string(),
            'city'        => $this->integer(),
            'start_date'  => $this->string(),
            'experience'  => $this->string(),
            'position'    => $this->string(),
            'salary'      => $this->integer(),
            'department'  => $this->integer(),
            'id_code'     => $this->string(10),
            'email'       => $this->string()
        ]);
    }


    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('employee');
    }
}
