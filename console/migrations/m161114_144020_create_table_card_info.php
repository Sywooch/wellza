<?php

use yii\db\Migration;

class m161114_144020_create_table_card_info extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%card_info}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->null(),
            'card_id' =>$this->string(80)->null(),
            'customer_id' =>$this->string(80)->null(),
            'brand' => $this->string(60)->null(),
            'card_last_digit' => $this->string(20)->null(),
            'holder_name' => $this->string(80)->null(),
            'response_data' => $this->text(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ], $tableOptions);
        $this->addForeignKey('FK_card_info_user_id', '{{%card_info}}', 'user_id', '{{%user}}', 'id','CASCADE','CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_card_info_user_id', '{{%card_info}}');
        $this->dropTable('{{%card_info}}');
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
