<?php

use yii\db\Migration;

class m161019_094352_add_more_fields_provider_services extends Migration
{
    public function up()
    {
        $this->addForeignKey('FK_provider_services_sub', '{{%provider_services}}', 'sub_service_id', '{{%services}}', 'category_id','CASCADE','CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_provider_services_sub', '{{%provider_services}}');
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
