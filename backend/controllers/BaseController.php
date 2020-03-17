<?php

namespace backend\controllers;

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
}
