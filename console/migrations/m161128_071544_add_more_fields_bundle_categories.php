<?php

use yii\db\Migration;

class m161128_071544_add_more_fields_bundle_categories extends Migration
{
    public function up()
    {
        $this->addColumn('{{%bundle_categories}}', 'created_at', 'TIMESTAMP AFTER `bundle_id`');
        $this->addColumn('{{%bundle_categories}}', 'updated_at', 'TIMESTAMP AFTER `created_at`');
    }

    public function down()
    {
        $this->dropColumn('{{%order_detail}}', 'created_at');
        $this->dropColumn('{{%order_detail}}', 'updated_at');
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
