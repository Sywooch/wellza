<?php

use yii\db\Migration;

class m161015_125945_add_more_fields_order_detail extends Migration
{
    public function up()
    {
        $this->addColumn('{{%order_detail}}', 'commodity_type', 'ENUM("appointment","giftcard","product","wellza_bundle","wellza_membership") AFTER `product_name`');
        $this->addColumn('{{%order_detail}}', 'from_name', 'VARCHAR(80) AFTER `commodity_type`');
        $this->addColumn('{{%order_detail}}', 'from_email', 'VARCHAR(150) AFTER `from_name`');
        $this->addColumn('{{%order_detail}}', 'to_name', 'VARCHAR(80) AFTER `from_email`');
        $this->addColumn('{{%order_detail}}', 'to_email', 'VARCHAR(150) AFTER `to_name`');
        $this->addColumn('{{%order_detail}}', 'code', 'VARCHAR(30) AFTER `to_email`');
        $this->addColumn('{{%order_detail}}', 'delivery_date', 'DATE AFTER `code`');
        $this->addColumn('{{%order_detail}}', 'message', 'VARCHAR(300) AFTER `delivery_date`');
    }

    public function down()
    {
        $this->dropColumn('{{%order_detail}}', 'commodity_type');
        $this->dropColumn('{{%order_detail}}', 'from_name');
        $this->dropColumn('{{%order_detail}}', 'from_email');
        $this->dropColumn('{{%order_detail}}', 'to_name');
        $this->dropColumn('{{%order_detail}}', 'to_email');
        $this->dropColumn('{{%order_detail}}', 'code');
        $this->dropColumn('{{%order_detail}}', 'delivery_date');
        $this->dropColumn('{{%order_detail}}', 'message');
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
