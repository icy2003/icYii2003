<?php

use common\models\User;
use icy2003\php\iextensions\yii2\db\Migration;

class m200317_065726_member extends Migration
{

    public function up()
    {
        $this->createTable('{{%member}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->unique(),
            'portrait' => $this->text(),
            'token'=>$this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->batchInsert('{{%member}}', ['username', 'password_hash', 'created_at'], [
            ['张三', Yii::$app->security->generatePasswordHash(123456),  time()],
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%member}}');

        return false;
    }
}
