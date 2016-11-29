<?php

use yii\db\Migration;

class m160723_095925_add_column_media_type_portfolio extends Migration
{
    public function up()
    {
        $this->addColumn('{{%portfolio}}', 'media_type', 'ENUM("Image", "Video") AFTER `user_id` ');
    }

    public function down()
    {
        $this->dropColumn('{{%portfolio}}', 'media_type', 'ENUM("Image", "Video") AFTER `user_id` ');
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
