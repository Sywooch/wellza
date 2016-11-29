<?php

use yii\db\Migration;

class m161019_092611_create_table_provider_sub_services extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%provider_sub_services}}', [
            'id' => $this->primaryKey(),
            'sub_category_id' => $this->integer(11)->null(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ], $tableOptions);
        $this->addColumn('{{%provider_sub_services}}', 'status', 'ENUM("Active", "Inactive") AFTER `sub_category_id`');
        $this->addForeignKey('FK_provider_sub_services_id', '{{%provider_sub_services}}', 'sub_category_id', '{{%services}}', 'category_id','CASCADE','CASCADE');
    }
    
    public function down()
    {
        $this->dropForeignKey('FK_provider_sub_services_id', '{{%provider_sub_services}}');
        $this->dropTable('{{%provider_sub_services}}');
    }
}
