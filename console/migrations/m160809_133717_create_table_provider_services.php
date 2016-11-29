<?php

use yii\db\Migration;

class m160809_133717_create_table_provider_services extends Migration
{
    public function up()
    {
         $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%provider_services}}', [
            'id' => $this->primaryKey(),
            'provider_id' => $this->integer()->notNull(),
            'service_id' => $this->integer()->notNull(),
            'sub_service_id' => $this->integer()->notNull(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        
        $this->addForeignKey('FK_provider_services', '{{%provider_services}}', 'service_id', '{{%services}}', 'category_id','CASCADE');
        
        $this->addForeignKey('FK_provider_services_provider_id', '{{%provider_services}}', 'provider_id', '{{%user}}', 'id','CASCADE');
        $this->addColumn('{{%provider_services}}', 'status', 'ENUM("Active", "Inactive") AFTER `sub_service_id`');
    }

    public function down()
    {
        $this->dropTable('{{%provider_services}}');
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
