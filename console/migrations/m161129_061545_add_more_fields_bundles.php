<?php

use yii\db\Migration;

class m161129_061545_add_more_fields_bundles extends Migration
{
    public function up()
    {
        $this->addColumn('{{%bundles}}', 'parent', 'INT(11) AFTER `status`');
    }

    public function down()
    {
        $this->dropColumn('{{%bundles}}', 'parent');
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
