<?php

use yii\db\Migration;

class m160909_103028_coupon extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%coupon}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->null(),
            'code' => $this->string(60)->null(),
            'discount' => $this->decimal(5,2)->null(),
            'total' => $this->decimal(8,2)->null(),
            'date_start' => $this->date()->null(),
            'date_end' => $this->date()->null(),
            'uses_total' => $this->smallInteger(4)->null(),
            'uses_customer' => $this->smallInteger(4)->null(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        $this->addColumn('{{%coupon}}', 'type', 'ENUM("Percentage","Fixed") AFTER `discount`');
        $this->addColumn('{{%coupon}}', 'status', 'ENUM("Active","Inactive") AFTER `uses_customer`');
    }

    public function down()
    {
        $this->dropColumn('{{%coupon}}', 'type');
        $this->dropColumn('{{%coupon}}', 'status');
        $this->dropTable('{{%coupon}}');
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
