<?php

use yii\db\Migration;

class m160725_140022_add_field_status_appointment extends Migration
{
    public function up()
    {
        $this->addColumn('{{%appointment}}', 'status', 'ENUM("CheckIn", "CheckOut", "Pending", "Cancel", "Complete") AFTER `appointment_time_away` ');
    }

    public function down()
    {
        $this->dropColumn('{{%appointment}}', 'status');
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
