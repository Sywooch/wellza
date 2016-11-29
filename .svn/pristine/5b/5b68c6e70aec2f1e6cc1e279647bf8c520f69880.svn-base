<?php

use yii\db\Migration;

class m160714_093230_create_table_authtoken extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%authtoken}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'access_token' => $this->string(60)->notNull(),
            'device_id' => $this->string(30)->notNull(),
            'device_type' => $this->string(30)->notNull(),
            'dev_certificate' => $this->string(100)->notNull(),
            'created_at' => 'timestamp DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp on UPDATE CURRENT_TIMESTAMP',
        ], $tableOptions);
        $this->addForeignKey('FK_authtoken', '{{%authtoken}}', 'user_id', '{{%user}}', 'id','CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%services}}');
        echo "m160714_093230_create_table_authtoken cannot be reverted.\n";

        return false;
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
