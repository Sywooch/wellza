<?php

use yii\db\Migration;

class m160713_071951_add_fields_user extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'device_id', 'VARCHAR(30) AFTER `status` ');
        $this->addColumn('{{%user}}', 'device_type', 'VARCHAR(30) AFTER `device_id` ');
        $this->addColumn('{{%user}}', 'dev_certificate', 'VARCHAR(100) AFTER `device_type` ');
        $this->addColumn('{{%user}}', 'access_token', 'VARCHAR(60) AFTER `dev_certificate` ');
        $this->addColumn('{{%user}}', 'last_login_time', 'timestamp on UPDATE CURRENT_TIMESTAMP AFTER `access_token` ');
        $this->addColumn('{{%user}}', 'last_login_ip', 'VARCHAR(20) AFTER `last_login_time` ');
    
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'device_id');
        $this->dropColumn('{{%user}}', 'device_type');
        $this->dropColumn('{{%user}}', 'dev_certificate');
        $this->dropColumn('{{%user}}', 'access_token');
        $this->dropColumn('{{%user}}', 'last_login_time');
        $this->dropColumn('{{%user}}', 'last_login_ip');
                       
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
