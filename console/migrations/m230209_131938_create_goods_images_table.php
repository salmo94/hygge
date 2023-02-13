<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%goods_images}}`.
 */
class m230209_131938_create_goods_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%goods_images}}', [
            'id' => $this->primaryKey(),
            'goods_id' => $this->integer()->notNull(),
            'path' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->defaultValue('NOW()'),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%goods_images}}');
    }
}
