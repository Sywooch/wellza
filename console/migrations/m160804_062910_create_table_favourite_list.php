<?php

use yii\db\Migration;

class m160804_062910_create_table_favourite_list extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%favourite_list}}', [
            'favourite_id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'provider_id' => $this->integer()->notNull(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        
        $this->addForeignKey('FK_favourite_list', '{{%favourite_list}}', 'user_id', '{{%user}}', 'id','CASCADE');
        $this->addForeignKey('FK_favourite_list_provider', '{{%favourite_list}}', 'provider_id', '{{%user}}', 'id','CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%favourite_list}}');
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
