<?php

use yii\db\Migration;

class m160909_110235_gift_voucher extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%gift_voucher}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(11)->null(),
            'code' => $this->string(40)->null(),
            'from_name' => $this->string(80)->null(),
            'from_email' => $this->string(150)->null(),
            'to_name' => $this->string(80)->null(),
            'to_email' => $this->string(150)->null(),
            'message' => $this->text()->null(),
            'amount' => $this->decimal(8,2)->null(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        $this->addColumn('{{%gift_voucher}}', 'status', 'ENUM("Active","Inactive") AFTER `amount`');
        $this->addForeignKey('FK_gift_voucher_order', '{{%gift_voucher}}', 'order_id', '{{%order}}', 'id','CASCADE','CASCADE');
    }

    public function down()
    {
        $this->dropColumn('{{%gift_voucher}}', 'status');
        $this->dropForeignKey('FK_gift_voucher_order', '{{%gift_voucher}}');
        $this->dropTable('{{%gift_voucher}}');
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
