<?php

use yii\db\Migration;

class m160804_072619_add_more_fields_services extends Migration
{
    public function up()
    {
        $this->addColumn('{{%services}}', 'status', 'ENUM("Active", "Inactive") AFTER `description`');
        $this->addColumn('{{%services}}', 'preparation_status', 'VARCHAR(255) AFTER `parent`');
    }

    public function down()
    {
        $this->dropColumn('{{%services}}', 'status');
        $this->dropColumn('{{%services}}', 'preparation_status');
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
