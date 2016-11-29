<?php

use yii\db\Migration;

class m160816_062143_add_fields_appointment extends Migration
{
    public function up()
    {
        $this->addColumn('{{%appointment}}', 'provider_id', 'INT(11) AFTER `customer_id`');
        $this->addColumn('{{%appointment}}', 'preparation_status', 'TEXT AFTER `package_id`');
        $this->addColumn('{{%appointment}}', 'location', 'VARCHAR(255) AFTER `preparation_status`');
        $this->addForeignKey('FK_appointment_provider_id', '{{%appointment}}', 'provider_id', '{{%user}}', 'id','CASCADE','CASCADE');
        
    }

    public function down()
    {
       $this->dropColumn('{{%appointment}}', 'provider_id');
        
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
