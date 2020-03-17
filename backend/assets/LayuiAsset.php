<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class LayuiAsset extends AssetBundle
{
    public $sourcePath = '@bower';
    public $css = [
        'layui/dist/css/layui.css',
    ];
    public $js = [
        'layui/dist/layui.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}
