<?php

use yii\db\Migration;

class m160909_094344_order extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->null(),
            'invoice_number' => $this->string(150)->null(),
            'store_name' => $this->string(60)->defaultValue('Wellza')->null(),
            'currency' => $this->string(20)->null(),
            'payment_method' => $this->string(100)->null(),            
            'comment' => $this->text()->null(),
            'order_tracking_number' => $this->integer(11)->null(),
            'ip_address' => $this->string(150)->null(),
            'user_agent' => $this->string(150)->null(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        
        $this->addColumn('{{%order}}', 'status', 'ENUM("Processing","Processed","Shipped","Cancelled","Failed","Refunded","Expired","Pending","Denied","Complete") AFTER `order_tracking_number`');
        $this->addColumn('{{%order}}', 'total', 'DOUBLE(8,2) AFTER `order_tracking_number`'); 
        $this->addColumn('{{%order}}', 'shipping_charge', 'DOUBLE(6,2) AFTER `total`'); 
        $this->addColumn('{{%order}}', 'tax', 'DOUBLE(5,2) AFTER `shipping_charge`'); 
        $this->addForeignKey('FK_order_user', '{{%order}}', 'user_id', '{{%user}}', 'id','CASCADE','CASCADE');        
    }

    public function down()
    {       
       $this->dropColumn('{{%order}}', 'status');
       $this->dropForeignKey('FK_order_user', '{{%order}}');
       $this->dropTable('{{%order}}');
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
