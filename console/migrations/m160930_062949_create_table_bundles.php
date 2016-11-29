<?php

use yii\db\Migration;

class m160930_062949_create_table_bundles extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%bundles}}', [
            'bundle_id' => $this->primaryKey(),
            'bundle_name' => $this->string(150)->null(),
            'savings' => $this->smallInteger(5)->null(),
            'price' => $this->decimal(8,2)->null(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ], $tableOptions);
       $this->addColumn('{{%bundles}}', 'status', 'ENUM("Active","Inactive") AFTER `price`'); 
    }

    public function down()
    {
        $this->dropTable('{{%bundles}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
