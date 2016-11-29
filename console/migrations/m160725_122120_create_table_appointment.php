<?php

use yii\db\Migration;

class m160725_122120_create_table_appointment extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%appointment}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer(11)->notNull(),
            'service_id' => $this->integer(11)->notNull(),
            'additional_information' => $this->text()->notNull(),
            'appointment_time' => $this->time()->notNull(),
            'appointment_date' => $this->date(),
            'appointment_price' => $this->decimal(8,2)->notNull(),
            'appointment_distance_away' => $this->smallInteger(8)->notNull(),
            'appointment_time_away' => $this->time()->notNull(),
            'latitude' => $this->decimal(8,6)->notNull(),
            'longitude' => $this->decimal(9,6)->notNull(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        $this->addForeignKey('FK_appointment', '{{%appointment}}', 'customer_id', '{{%user}}', 'id','CASCADE');
        $this->addForeignKey('FK_appointment_service', '{{%appointment}}', 'service_id', '{{%services}}', 'category_id','CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%appointment}}');
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
