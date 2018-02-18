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
            'id'                => $this->primaryKey(),
            'name'              => $this->string(),
            'last_name'         => $this->string(),
            'middle_name'       => $this->string(),
            'born'              => $this->string(),
            'start_date'        => $this->string(),
            'experience'        => $this->string(),
            'position'          => $this->string(),
            'salary'            => $this->integer(),
            'department_number' => $this->integer(),
            'id_code'           => $this->integer(),
            'email'             => $this->string()
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
