<?php

use yii\db\Migration;

class m160723_060646_alter_column_user extends Migration
{
    public function up()
    {
        $this->renameColumn('{{%user}}', 'dob', 'birth_date');
        $this->renameColumn('{{%user}}', 'phone_number', 'mobile');
        $this->renameColumn('{{%user}}', 'aboutme', 'about_me');
    }

    public function down()
    {
        $this->renameColumn('{{%user}}', 'birth_date', 'dob');
        $this->renameColumn('{{%user}}', 'mobile', 'phone_number');
        $this->renameColumn('{{%user}}', 'about_me', 'aboutme');
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
