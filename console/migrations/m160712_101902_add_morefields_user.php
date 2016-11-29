<?php

use yii\db\Migration;

class m160712_101902_add_morefields_user extends Migration
{
    public function up()
    {   
        $this->addColumn('{{%user}}', 'first_name', 'VARCHAR(80) AFTER `email` ');
        $this->addColumn('{{%user}}', 'last_name', 'VARCHAR(80) AFTER `firstname` ');
        $this->addColumn('{{%user}}', 'gender', 'VARCHAR(10) AFTER `lastname` ');
        $this->addColumn('{{%user}}', 'profile_image', 'VARCHAR(100) AFTER `gender` ');
        $this->addColumn('{{%user}}', 'dob', 'DATE AFTER `profile_image` ');
        $this->addColumn('{{%user}}', 'address', 'VARCHAR(100) AFTER `dob` ');
        $this->addColumn('{{%user}}', 'postal_code', 'VARCHAR(8) AFTER `address` ');
        $this->addColumn('{{%user}}', 'country', 'VARCHAR(40) AFTER `postal_code` ');
        $this->addColumn('{{%user}}', 'cell_phone', 'VARCHAR(12) AFTER `country` ');        
        $this->addColumn('{{%user}}', 'aboutme', 'TEXT AFTER `cell_phone` ');
        $this->addColumn('{{%user}}', 'address2', 'TEXT AFTER `address` ');
        $this->addColumn('{{%user}}', 'city', 'VARCHAR(80) AFTER `address2` ');
        $this->addColumn('{{%user}}', 'province', 'VARCHAR(80) AFTER `city` ');
  
    }

    public function down()
    {   $this->dropColumn('{{%user}}', 'address2');
        $this->dropColumn('{{%user}}', 'city');
        $this->dropColumn('{{%user}}', 'province');        
        $this->dropColumn('{{%user}}', 'first_name');
        $this->dropColumn('{{%user}}', 'last_name');
        $this->dropColumn('{{%user}}', 'gender');
        $this->dropColumn('{{%user}}', 'profile_image');
        $this->dropColumn('{{%user}}', 'dob');
        $this->dropColumn('{{%user}}', 'address');
        $this->dropColumn('{{%user}}', 'postal_code');
        $this->dropColumn('{{%user}}', 'country');
        $this->dropColumn('{{%user}}', 'cell_phone');        
        $this->dropColumn('{{%user}}', 'aboutme');
        
        //echo "m160712_101902_add_morefields_user cannot be reverted.\n";

        //return false;
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
