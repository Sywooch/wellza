<?php

use yii\db\Migration;

class m160930_111217_create_package_services extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%package_services}}', [
            'id' => $this->primaryKey(),
            'package_id' => $this->integer(11)->null(),
            'start_time' => $this->string(30)->null(),
            'end_time' => $this->string(30)->null(),
            'minutes_duration' => $this->string(20)->null(),
            'service_price' => $this->decimal(8,2)->null(),
        ], $tableOptions);
        $this->addForeignKey('FK_package_services_packages', '{{%package_services}}', 'package_id', '{{%packages}}', 'package_id','CASCADE','CASCADE');        
    }

    public function down()
    {
        $this->dropForeignKey('FK_package_services_packages', '{{%package_services}}');
        $this->dropTable('{{%package_services}}');
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
