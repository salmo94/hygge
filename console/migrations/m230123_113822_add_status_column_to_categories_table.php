<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%categories}}`.
 */
class m230123_113822_add_status_column_to_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('categories', 'status', $this->smallInteger());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('categories', 'status');
    }
}
