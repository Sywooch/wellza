<?php

use yii\db\Migration;

class m160909_100819_order_detail extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order_detail}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(11)->null(),
            'product_id' => $this->integer(11)->null(),
            'product_name' => $this->string(150)->null(),
            'price' => $this->decimal(8,2)->null(),
            'quantity' => $this->integer(11)->null(),
            'email' => $this->string(250)->null(),
            'phone' => $this->string(20)->null(),
            'shipping_first_name' => $this->string(80)->null(),
            'shipping_last_name' => $this->string(80)->null(),
            'shipping_address1' => $this->string(200)->null(),
            'shipping_address2' => $this->string(200)->null(),
            'city' => $this->string(100)->null(),
            'zip' => $this->string(10)->null(),
            'country' => $this->string(100)->null(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        $this->addForeignKey('FK_order_order_detail', '{{%order_detail}}', 'order_id', '{{%order}}', 'id','CASCADE','CASCADE');
        $this->addForeignKey('FK_order_detail_product', '{{%order_detail}}', 'product_id', '{{%product}}', 'id','CASCADE','CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_order_order_detail', '{{%order_detail}}');
        $this->dropForeignKey('FK_order_detail_product', '{{%order_detail}}');
        $this->dropTable('{{%order_detail}}');
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
