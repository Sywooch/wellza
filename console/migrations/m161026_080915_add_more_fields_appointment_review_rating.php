<?php

use yii\db\Migration;

class m161026_080915_add_more_fields_appointment_review_rating extends Migration
{
    public function up()
    {
        $this->addColumn('{{%appointment_review_rating}}', 'status', 'ENUM("rated","unrated") AFTER `rating_given_by`');
        $this->addColumn('{{%appointment_review_rating}}', 'appointment_id', 'INT(11) AFTER `id`');
        $this->addForeignKey('FK_appointment_review_appointment_id', '{{%appointment_review_rating}}', 'appointment_id', '{{%appointment}}', 'id','CASCADE','CASCADE');
    }

    public function down()
    {
        $this->dropColumn('{{%appointment_review_rating}}', 'status');
        $this->dropColumn('{{%appointment_review_rating}}', 'appointment_id');
        $this->dropForeignKey('FK_appointment_review_appointment_id', '{{%appointment_review_rating}}');
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
