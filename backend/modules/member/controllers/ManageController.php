<?php

namespace backend\modules\member\controllers;

use backend\controllers\BaseController;

class ManageController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
