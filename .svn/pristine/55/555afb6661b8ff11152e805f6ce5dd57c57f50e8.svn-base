<?php

use yii\db\Migration;

class m160902_090101_icon_class extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%icon_class}}', [
            'id' => $this->primaryKey(),
            'class_name' => $this->string(50)->notNull()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%icon_class}}');
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
