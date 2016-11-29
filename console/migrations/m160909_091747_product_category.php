<?php

use yii\db\Migration;

class m160909_091747_product_category extends Migration
{
    public function up()
    {   
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_category}}', [
            'id' => $this->primaryKey(),
            'category_name' => $this->string(200)->null(),
            'category_image' => $this->string(250)->null(),
            'description' => $this->text()->null(),
            'parent' => $this->integer(11)->null(),
            'meta_title' => $this->string(200)->null(),
            'meta_keywords' => $this->string(250)->null(),
            'meta_description' => $this->text()->null(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        
        $this->addColumn('{{%product_category}}', 'status', 'ENUM("Active", "Inactive") AFTER `meta_description`');
    }

    public function down()
    {
        $this->dropColumn('{{%product_category}}', 'status');
        $this->dropTable('{{%product_category}}');
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
