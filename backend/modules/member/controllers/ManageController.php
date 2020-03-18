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

    public function actionView()
    {
        $this->layout = '@backend/views/layouts/content.php';
        $id = Y::get('id');
        $model = MemberModel::findOne($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionSave()
    {
        $this->layout = '@backend/views/layouts/content.php';
        $id = Y::get('id');
        $model = MemberModel::findOne($id);
        return $this->render('save', [
            'model' => $model,
        ]);
    }

    public function actionDelete()
    {
        return $this->asJson([
            'code' => 0,
        ]);
    }
}
