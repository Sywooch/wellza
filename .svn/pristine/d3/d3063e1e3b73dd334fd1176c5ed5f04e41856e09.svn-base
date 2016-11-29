<?php

use yii\db\Migration;

class m160715_055643_add_field_services extends Migration
{
    public function up()
    {
        $this->addColumn('{{%services}}', 'category_image', 'VARCHAR(250) AFTER `category_name` ');
        $this->addColumn('{{%services}}', 'category_image_3x', 'VARCHAR(250) AFTER `category_name` ');
        $this->addColumn('{{%services}}', 'category_thumbnail', 'VARCHAR(250) AFTER `category_image_3x`');
        $this->addColumn('{{%services}}', 'banner', 'VARCHAR(250) AFTER `category_thumbnail`');
        $this->addColumn('{{%services}}', 'banner_type', 'ENUM("Image", "Video") AFTER `banner`');
        $this->addColumn('{{%services}}', 'video_thumbnail', 'VARCHAR(250) AFTER `banner_type`');
        $this->addColumn('{{%services}}', 'icon_id', 'INT(11) AFTER `video_thumbnail`');
        $this->addForeignKey('FK_services_icon_class', '{{%services}}', 'icon_id', '{{%icon_class}}', 'id','CASCADE','CASCADE');
    }

    public function down()
    {
        $this->dropColumn('{{%services}}', 'icon_id');
        $this->dropColumn('{{%services}}', 'category_image_3x');
        $this->dropColumn('{{%services}}', 'category_image');
        $this->dropColumn('{{%services}}', 'category_thumbnail');
        $this->dropColumn('{{%services}}', 'banner');
        $this->dropColumn('{{%services}}', 'banner_type');
        $this->dropColumn('{{%services}}', 'video_thumbnail');
        $this->dropForeignKey('FK_services_icon_class', '{{%services}}');
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
