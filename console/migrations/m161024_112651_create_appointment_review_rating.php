<?php

use yii\db\Migration;

class m161024_112651_create_appointment_review_rating extends Migration
{
    public function up()
    {
         $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%appointment_review_rating}}', [
            'id' => $this->primaryKey(),
            'rating' => $this->decimal(2,1)->null(),
            'review' =>$this->string(300)->null(),
            'rating_date' => $this->date()->null(),
            'provided_by' => $this->integer(11)->null(),
            'provided_to' => $this->integer(11)->null(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ], $tableOptions);
        $this->addColumn('{{%appointment_review_rating}}', 'rating_given_by', 'ENUM("Administrator","Client","Provider") AFTER `provided_to`');
        $this->addForeignKey('FK_appointment_review_provided_by', '{{%appointment_review_rating}}', 'provided_by', '{{%user}}', 'id','CASCADE','CASCADE');
        $this->addForeignKey('FK_appointment_review_provided_to', '{{%appointment_review_rating}}', 'provided_to', '{{%user}}', 'id','CASCADE','CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_appointment_review_provided_by', '{{%appointment_review_rating}}');
        $this->dropForeignKey('FK_appointment_review_provided_to', '{{%appointment_review_rating}}');
        $this->dropColumn('{{%appointment_review_rating}}', 'rating_given_by');
        $this->dropTable('{{%appointment_review_rating}}');
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
