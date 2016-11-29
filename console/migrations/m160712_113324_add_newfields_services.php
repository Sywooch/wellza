<?php

use yii\db\Migration;

class m160712_113324_add_newfields_services extends Migration
{
    public function up()
    {
        $this->addColumn('{{%services}}', 'description', 'TEXT AFTER `parent` ');
    }

    public function down()
    {   
        $this->dropColumn('{{%services}}', 'description');
        //echo "m160712_113324_add_newfields_services cannot be reverted.\n";

        //return false;
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
