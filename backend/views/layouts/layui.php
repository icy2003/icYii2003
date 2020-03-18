<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use backend\assets\LayuiAsset;
use common\utils\Y;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
LayuiAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">

<head>
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php $this->registerCsrfMetaTags()?>
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head()?>
</head>

<body class="layui-layout-body">
    <?php $this->beginBody()?>
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo"><a href="<?php echo Y::to(['']); ?>"><?php echo Y::param('name') ?></a></div>
            <!-- 头部区域（可配合layui已有的水平导航） -->
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <?php echo Y::user('username') ?>
                        <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    </a>
                </li>
                <li class="layui-nav-item"><a href="<?php echo Y::to(['site/logout']) ?>">退出</a></li>
            </ul>
        </div>
        <?php

$menus = [
    ['label' => '用户管理', 'active' => false, 'children' => [
        ['label' => '用户列表', 'route' => ['member/manage/index'], 'active' => false],
    ],
    ],
    ['label' => '食堂管理', 'active' => false, 'children' => [
        ['label' => '菜品管理', 'route' => ['canteen/food/index'], 'active' => false],
    ],
    ],
];

?>

        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree" lay-filter="test">
                    <?php foreach ($menus as $items): ?>
                    <li class="layui-nav-item <?php if (true === $items['active']): ?>layui-nav-itemed<?php endif;?>">
                        <a class="" href="javascript:;"><?php echo $items['label'] ?></a>
                        <?php foreach ($items['children'] as $item): ?>
                        <dl class="layui-nav-child">
                            <dd class="<?php if (true === $item['active']): ?>layui-this<?php endif;?>">
                                <a href="<?php echo Y::to($item['route']) ?>"><?php echo $item['label']; ?></a>
                            </dd>
                        </dl>
                        <?php endforeach;?>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>

        <div class="layui-body">
            <!-- 内容主体区域 -->
            <div style="padding: 15px;">
                <?php echo $content ?>
            </div>
        </div>

        <div class="layui-footer">
            <!-- 底部固定区域 -->
            <p class="pull-left">&copy; <?php echo Html::encode(Y::param('name')) ?> <?=date('Y')?></p>
            <p class="pull-right"><?php //echo Yii::powered()?></p>
        </div>
    </div>
    <script>
    //JavaScript代码区域
    layui.use('element', function() {
        var element = layui.element;

    });
    </script>
    <?php $this->endBody()?>
</body>

</html>
<?php $this->endPage()?>