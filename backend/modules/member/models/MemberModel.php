<?php

namespace backend\modules\member\models;

use common\models\ActiveRecord;
use yii\data\Pagination;

class MemberModel extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%member}}';
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['search'] = ['username'];
        return $scenarios;
    }

    public function rules()
    {
        return [
            [['username'], 'safe', 'on' => 'search'],
        ];
    }

    public function search($params)
    {
        $query = parent::find();
        if ($this->load($params, '') && $this->validate()) {
            $query->andFilterWhere(['like', 'username', $this->username]);
            $count = (clone $query)->count();
            $pagination = new Pagination(['totalCount' => $count]);
            $pagination->pageSizeParam = 'limit';
            $models = $query
                ->select(['id', 'username', 'created_at'])
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            foreach ($models as &$model) {
                $model->created_at = date('Y-m-d H:i:s', $model->created_at);
            }
            return [$count, $models];
        }
    }
}
