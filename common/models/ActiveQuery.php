<?php

namespace common\models;

use yii\db\ActiveQuery as DbActiveQuery;

class ActiveQuery extends DbActiveQuery
{
    public function one($db = null)
    {
        return parent::limit(1)->one($db);
    }
}
