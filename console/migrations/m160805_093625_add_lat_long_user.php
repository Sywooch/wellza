<?php

use yii\db\Migration;

class m160805_093625_add_lat_long_user extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'latitude', 'decimal(8,6) AFTER `last_login_ip`');
        $this->addColumn('{{%user}}', 'longitude', 'decimal(9,6) AFTER `latitude`');
        $this->addColumn('{{%user}}', 'attached_cv', 'VARCHAR(100) AFTER `social_type`');
        
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'latitude');
        $this->dropColumn('{{%user}}', 'longitude');
        $this->dropColumn('{{%user}}', 'attached_cv');
                
        //echo "m160713_071951_add_fields_user cannot be reverted.\n";

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
