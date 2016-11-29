<?php

use yii\db\Migration;

class m160804_073312_add_more_fields_appointment extends Migration
{
    public function up()
    {
        $this->addColumn('{{%appointment}}', 'sub_service_id', 'INT(11) AFTER `service_id`');
        $this->addColumn('{{%appointment}}', 'package_id', 'INT(11) AFTER `sub_service_id`');
        $this->addForeignKey('FK_appointment_package', '{{%appointment}}', 'package_id', '{{%packages}}', 'package_id','CASCADE');
        $this->addColumn('{{%appointment}}', 'preferred_location', 'VARCHAR(250) AFTER `address2`');
        $this->addColumn('{{%appointment}}', 'latitude', 'decimal(9,6) AFTER `appointment_duration`');
        $this->addColumn('{{%appointment}}', 'longitude', 'decimal(9,6) AFTER `latitude`');
    }

    public function down()
    {
        $this->dropColumn('{{%appointment}}', 'sub_service_id');
        $this->dropColumn('{{%appointment}}', 'package_id');
        $this->dropColumn('{{%appointment}}', 'preferred_location');
        $this->dropColumn('{{%appointment}}', 'latitude');
        $this->dropColumn('{{%appointment}}', 'longitude');
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
