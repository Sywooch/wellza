<?php

use yii\db\Migration;

class m160909_114141_voucher_history extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%voucher_history}}', [
            'id' => $this->primaryKey(),
            'voucher_id' => $this->integer(11)->null(),
            'order_id' => $this->integer(11)->null(),
            'amount' => $this->decimal(8,2)->null(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        
        $this->addForeignKey('FK_voucher_history_gift_voucher', '{{%voucher_history}}', 'voucher_id', '{{%gift_voucher}}', 'id','CASCADE','CASCADE');
        $this->addForeignKey('FK_voucher_history_order', '{{%voucher_history}}', 'order_id', '{{%order}}', 'id','CASCADE','CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_voucher_history_gift_voucher', '{{%voucher_history}}');
        $this->dropForeignKey('FK_voucher_history_order', '{{%voucher_history}}');
        $this->dropTable('{{%voucher_history}}');
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
