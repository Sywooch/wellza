<?php

use yii\db\Migration;

class m160930_064715_create_table_bundle_categories extends Migration
{
    public function up()
    {
         $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%bundle_categories}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(11)->null(),
            'bundle_id' => $this->integer(11)->null()            
        ], $tableOptions);
        $this->addForeignKey('FK_services_bundle_categories', '{{%bundle_categories}}', 'category_id', '{{%services}}', 'category_id','CASCADE','CASCADE');
        $this->addForeignKey('FK_bundle_categories', '{{%bundle_categories}}', 'bundle_id', '{{%bundles}}', 'bundle_id','CASCADE','CASCADE');        
    }

    public function down()
    {
        $this->dropForeignKey('FK_services_bundle_categories', '{{%bundle_categories}}');
        $this->dropForeignKey('FK_bundle_categories', '{{%bundle_categories}}');
        $this->dropTable('{{%bundle_categories}}');
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
