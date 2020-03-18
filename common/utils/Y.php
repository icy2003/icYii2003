<?php

namespace common\utils;

use icy2003\php\I;
use Yii;

class Y extends Yii
{
    public static function param($name)
    {
        return I::get(parent::$app->params, $name);
    }

    public static function user($attribute, $defaultValue = null)
    {
        return I::get(parent::$app->user->identity, $attribute, $defaultValue);
    }

    public static function to($params)
    {
        return parent::$app->urlManager->createUrl($params);
    }

    public static function get($name = null, $defaultValue = null)
    {
        return parent::$app->request->get($name, $defaultValue);
    }

    public static function post($name = null, $defaultValue = null)
    {
        return parent::$app->request->post($name, $defaultValue);
    }
}
