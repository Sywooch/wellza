<?php

use yii\db\Migration;

class m160907_071906_add_fields_icon_class extends Migration
{
    public function up()
    {
        $this->addColumn('{{%icon_class}}', 'icon_type', 'ENUM("Category", "Subcategory") AFTER `class_name`');
    }

    public function down()
    {
        $this->dropColumn('{{%icon_class}}', 'icon_type');
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
