<?php

namespace backend\controllers;

use yii\base\Module as BaseModule;

class Module extends BaseModule
{
    public function init()
    {
        parent::init();
        defined('MODULE_NAME') || define('MODULE_NAME', $this->id);
        $this->controllerNamespace = 'backend\modules\\' . MODULE_NAME . '\controllers';
    }
}
