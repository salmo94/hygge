<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m230117_183634_first_user
 */
class m230117_183634_first_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User();
        $user->username = 'anton';
        $user->setPassword('anton');
        $user->generateAuthKey();
        $user->email = 'anton@mail.com';
        $user->status = 10;

        return $user->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

      User::deleteAll(['username'=>'anton']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230117_183634_first_user cannot be reverted.\n";

        return false;
    }
    */
}
