<?php

use yii\db\Migration;

class m160909_093402_cart extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(11)->null(),
            'session_id' => $this->string(200)->null(),
            'product_id' => $this->integer(11)->null(),
            'appointment_id' => $this->integer(11)->null(),
            'quantity' => $this->integer(11)->null(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        $this->addForeignKey('FK_cart_user', '{{%cart}}', 'customer_id', '{{%user}}', 'id','CASCADE','CASCADE');
        $this->addForeignKey('FK_cart_product', '{{%cart}}', 'product_id', '{{%product}}', 'id','CASCADE','CASCADE');
        $this->addForeignKey('FK_cart_appointment', '{{%cart}}', 'appointment_id', '{{%appointment}}', 'id','CASCADE','CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_cart_user', '{{%cart}}');
        $this->dropForeignKey('FK_cart_product', '{{%cart}}');
        $this->dropForeignKey('FK_cart_appointment', '{{%cart}}');
        $this->dropTable('{{%cart}}');
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
