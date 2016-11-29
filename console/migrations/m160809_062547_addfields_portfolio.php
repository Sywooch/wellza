<?php

use yii\db\Migration;

class m160809_062547_addfields_portfolio extends Migration
{
    public function up()
    {
        $this->addColumn('{{%portfolio}}', 'video_thumbnails', 'text AFTER `media_url`');
        $this->addColumn('{{%portfolio}}', 'image_thumbnail', 'VARCHAR(100) AFTER `video_thumbnails`');
    }

    public function down()
    {
        $this->dropColumn('{{%portfolio}}', 'video_thumbnails');
        $this->dropColumn('{{%portfolio}}', 'image_thumbnail');
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
