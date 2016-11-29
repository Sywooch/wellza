<?php
/***
 * New fields added to the user table
 * ***/

use yii\db\Migration;

class m160712_071455_add_newfields_user extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'user_type', 'ENUM("Super Administrator","Administrator", "Client", "Provider") AFTER `email` ');
        $this->addColumn('{{%user}}', 'verified', 'ENUM("Yes", "No") AFTER `user_type`');
        $this->addColumn('{{%user}}', 'experience_in_year', 'SMALLINT(6) AFTER `verified`');
        $this->addColumn('{{%user}}', 'experience_in_month', 'SMALLINT(6) AFTER `experience_in_year`');
        $this->addColumn('{{%user}}', 'social_id', 'VARCHAR(255) AFTER `roles` ');
        $this->addColumn('{{%user}}', 'social_type', 'VARCHAR(255) AFTER `facebook` ');
        $this->addColumn('{{%user}}', 'profile_image_thumb', 'VARCHAR(255) AFTER `profile_image`');        
    }

    public function down()
    {   $this->dropColumn('{{%user}}', 'experience_in_year');
        $this->dropColumn('{{%user}}', 'experience_in_month');
        $this->dropColumn('{{%user}}', 'user_type');
        $this->dropColumn('{{%user}}', 'verified');
        $this->dropColumn('{{%user}}', 'profile_image_thumb');
        $this->dropColumn('{{%user}}', 'facebook');
        $this->dropColumn('{{%user}}', 'google');
        $this->dropColumn('{{%user}}', 'linkedin');
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
