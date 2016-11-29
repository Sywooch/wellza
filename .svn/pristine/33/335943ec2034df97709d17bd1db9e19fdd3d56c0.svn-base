<?php

use yii\db\Migration;

class m160909_063801_product extends Migration
{
    public function up()
    {   
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'product_name' => $this->string(200)->null(),
            'quantity' => $this->integer(11)->null(),
            'weight' => $this->float()->null(),
            'price' => $this->decimal(8,4)->null(),
            'selling_price' => $this->decimal(8,4)->null(),
            'manufacture_id' => $this->integer(11)->null(),
            'short_description' => $this->string(200)->null(),
            'long_description' => $this->text()->null(),
            'viewed' => $this->integer(11)->null(),           
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        
        
    }

    public function down()
    {
        $this->dropTable('{{%product}}');
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
