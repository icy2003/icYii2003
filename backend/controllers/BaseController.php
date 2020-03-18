<?php

namespace backend\controllers;

use common\utils\Y;
use yii\filters\AccessControl;
use yii\web\Controller;

class BaseController extends Controller
{
    public $layout = '@backend/views/layouts/layui.php';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionFaker()
    {
        $data = require Y::getAlias('@console/tests/unit/fixtures/data/members.php');

        Y::$app->db->createCommand()->batchInsert('{{%member}}', ['username', 'password_hash', 'created_at'], $data)->execute();
    }
}
