<?php

use yii\db\Migration;

class m160804_073741_create_tables extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%packages}}', [
            'package_id' => $this->primaryKey(),
            'service_id' => $this->integer()->notNull(),
            //'sub_service_id' => $this->integer()->notNull(),
            //'discount_price' => $this->smallInteger()->notNull(),
            //'package_name' => $this->string(80)->notNull(),
            //'service_time' => $this->time()->notNull(),
            'service_price' => $this->decimal(8,2)->notNull(),
            //'available_date' =>  $this->date(),
            //'available_time' => $this->time()->notNull(),
            //'status' => $this->smallInteger()->notNull(),
            'preparation_status' => $this->text()->notNull(),
           // 'description' => $this->text()->notNull(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        
        $this->addForeignKey('FK_packages', '{{%packages}}', 'service_id', '{{%services}}', 'category_id','CASCADE');
                 
    }
    
    public function down()
    {   $this->dropForeignKey('FK_packages', '{{%packages}}');
        $this->dropTable('{{%packages}}');
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
