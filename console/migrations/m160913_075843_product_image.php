<?php

use yii\db\Migration;

class m160913_075843_product_image extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_image}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11)->null(),
            'product_image' => $this->string(250)->null(),
            'created_at' => $this->timestamp()->null(),
            'updated_at' => $this->timestamp()->null(),
        ], $tableOptions);
        $this->addForeignKey('FK_product_image_product', '{{%product_image}}', 'product_id', '{{%product}}', 'id','CASCADE','CASCADE');        
    }

    public function down()
    {
       $this->dropForeignKey('FK_product_image_product', '{{%product_image}}'); 
       $this->dropTable('{{%product_image}}');
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
