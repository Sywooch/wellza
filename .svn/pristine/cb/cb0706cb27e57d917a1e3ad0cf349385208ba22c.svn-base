<?php

use yii\db\Migration;

class m160909_115149_transaction_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%transaction_table}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(11)->null(),
            'total_amount' => $this->decimal(8,2)->null(),
            'payment_mode' => $this->string(100)->null(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        
        $this->addForeignKey('FK_transaction_table_order', '{{%transaction_table}}', 'order_id', '{{%order}}', 'id','CASCADE','CASCADE');        
    }

    public function down()
    {
        $this->dropForeignKey('FK_transaction_table_order', '{{%transaction_table}}');
        $this->dropTable('{{%transaction_table}}');
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
