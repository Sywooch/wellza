<?php

use yii\db\Migration;

class m160813_065151_add_fields_favourite_list extends Migration
{
    public function up()
    {
        $this->addColumn('{{%favourite_list}}', 'status', 'ENUM("Active", "Inactive") AFTER `provider_id`');
    }

    public function down()
    {
        $this->dropColumn('{{%favourite_list}}', 'status');
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
