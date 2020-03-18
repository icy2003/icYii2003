<?php

namespace backend\modules\member\controllers;

use backend\controllers\BaseController;
use backend\modules\member\models\MemberModel;
use common\utils\Y;

class ManageController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList()
    {
        $searchModel = new MemberModel();
        $searchModel->setScenario('search');
        list($count, $data) = $searchModel->search(Y::get());
        return $this->asJson([
            'code' => 0,
            'msg' => '',
            'count' => $count,
            'data' => $data,
        ]);
    }

    public function actionDelete()
    {
        return $this->asJson([
            'code' => 0,
        ]);
    }
}
