<?php

use yii\db\Migration;

class m160804_095820_add_fields_package extends Migration
{
    public function up()
    {
        $this->addColumn('{{%packages}}', 'status', 'ENUM("Active", "Inactive") AFTER `description`');
        $this->addColumn('{{%packages}}', 'service_id', 'INT(11) AFTER `package_id`');
        $this->addColumn('{{%packages}}', 'parent', 'INT(11) AFTER `service_id`');
        $this->addForeignKey('FK_package_sub_services', '{{%packages}}', 'service_id', '{{%services}}', 'category_id','CASCADE','CASCADE');
        $this->addForeignKey('FK_package_parent', '{{%packages}}', 'parent', '{{%services}}', 'category_id','CASCADE','CASCADE');
    }

    public function down()
    {   
        $this->dropForeignKey('FK_package_sub_services', '{{%packages}}');
        $this->dropForeignKey('FK_package_parent', '{{%packages}}');
        $this->dropColumn('{{%packages}}', 'status');
        $this->dropColumn('{{%packages}}', 'service_id');
        $this->dropColumn('{{%packages}}', 'parent');
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
