<?php

use yii\db\Migration;

class m160817_102308_add_more_fields_appointment extends Migration
{
    public function up()
    {
        
        $this->addColumn('{{%appointment}}', 'appointment_endtime', 'TIME AFTER `appointment_time`');
        
        $this->addColumn('{{%appointment}}', 'cancelled_by', 'INT(11) AFTER `status`');
        $this->addColumn('{{%appointment}}', 'package_id', 'INT(11) AFTER `provider_id`');
        $this->addColumn('{{%appointment}}', 'address1', 'TEXT AFTER `package_id`');
        $this->addColumn('{{%appointment}}', 'address2', 'TEXT AFTER `address1`');
        $this->addColumn('{{%appointment}}', 'city', 'VARCHAR(80) AFTER `address2`');
        $this->addColumn('{{%appointment}}', 'province', 'VARCHAR(80) AFTER `city`');
        $this->addColumn('{{%appointment}}', 'telephone_number', 'VARCHAR(14) AFTER `province`');
        $this->addColumn('{{%appointment}}', 'postal_code', 'SMALLINT(8) AFTER `telephone_number`');
        $this->addColumn('{{%appointment}}', 'personal_information', 'VARCHAR(350) AFTER `postal_code`');
        $this->addForeignKey('FK_package_appointment', '{{%appointment}}', 'package_id', '{{%packages}}', 'package_id','CASCADE','CASCADE');      
        
    }

    public function down()
    {
        $this->dropColumn('{{%appointment}}', 'appointment_endtime');
        $this->dropForeignKey('FK_package_appointment', '{{%appointment}}');
                
        $this->dropColumn('{{%appointment}}', 'package_id');
        $this->dropColumn('{{%appointment}}', 'address1');
        $this->dropColumn('{{%appointment}}', 'address2');
        $this->dropColumn('{{%appointment}}', 'city');
        $this->dropColumn('{{%appointment}}', 'province');
        $this->dropColumn('{{%appointment}}', 'telephone_number');
        $this->dropColumn('{{%appointment}}', 'postal_code');
        $this->dropColumn('{{%appointment}}', 'personal_information');
        $this->dropColumn('{{%favourite_list}}', 'cancelled_by');
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
