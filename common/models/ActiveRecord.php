<?php

namespace common\models;

use yii\db\ActiveRecord as DbActiveRecord;

class ActiveRecord extends DbActiveRecord
{
    public static function find()
    {
        return new ActiveQuery(get_called_class());
    }

    protected $_parentId = 'pid';
    protected $_childId = 'id';

    public function getChildren()
    {
        return $this->hasMany(self::className(), [static::$_parentId => static::$_childId]);
    }

    public function getParent()
    {
        return $this->hasOne(self::className(), [static::$_childId => static::$_parentId]);
    }
}
