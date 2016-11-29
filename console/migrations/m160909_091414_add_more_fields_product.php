<?php

use yii\db\Migration;

class m160909_091414_add_more_fields_product extends Migration
{
    public function up()
    {   
        $this->addColumn('{{%product}}', 'status', 'ENUM("Active", "Inactive") AFTER `viewed`');
        $this->addColumn('{{%product}}', 'category_id', 'INT(11) AFTER `manufacture_id`');
        $this->addColumn('{{%product}}', 'sr_number', 'VARCHAR(100) AFTER `category_id`');
        $this->addColumn('{{%product}}', 'sub_category_id', 'INT(11) AFTER `category_id`');
        $this->addForeignKey('FK_product_category_services', '{{%product}}', 'category_id', '{{%services}}', 'id','CASCADE','CASCADE');
        $this->addForeignKey('FK_product_sub_category_services', '{{%product}}', 'sub_category_id', '{{%services}}', 'id','CASCADE','CASCADE');
    }

    public function down()
    {
        $this->dropColumn('{{%product}}', 'status');
        $this->dropColumn('{{%product}}', 'sub_category_id');
        $this->dropColumn('{{%product}}', 'sr_number');
        $this->dropColumn('{{%product}}', 'category_id');
        $this->dropForeignKey('FK_product_category_services', '{{%product}}');
        $this->dropForeignKey('FK_product_sub_category_services', '{{%product}}');
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
