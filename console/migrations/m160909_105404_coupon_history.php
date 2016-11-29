<?php

use yii\db\Migration;

class m160909_105404_coupon_history extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%coupon_history}}', [
            'id' => $this->primaryKey(),
            'coupon_id' => $this->integer(11)->null(),
            'order_id' => $this->integer(11)->null(),
            'customer_id' => $this->integer(11)->null(),
            'amount' => $this->decimal(8,2)->null(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        $this->addForeignKey('FK_coupon_history_coupon', '{{%coupon_history}}', 'coupon_id', '{{%coupon}}', 'id','CASCADE','CASCADE');
        $this->addForeignKey('FK_coupon_history_order', '{{%coupon_history}}', 'order_id', '{{%order}}', 'id','CASCADE','CASCADE');
        $this->addForeignKey('FK_coupon_history_user', '{{%coupon_history}}', 'customer_id', '{{%user}}', 'id','CASCADE','CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_coupon_history_coupon', '{{%coupon_history}}');
        $this->dropForeignKey('FK_coupon_history_order', '{{%coupon_history}}');
        $this->dropForeignKey('FK_coupon_history_user', '{{%coupon_history}}');
        $this->dropTable('{{%coupon_history}}');
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
