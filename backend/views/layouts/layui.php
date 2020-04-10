<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use backend\assets\LayuiAsset;
use common\utils\Y;
use yii\helpers\Html;

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

        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree" lay-filter="menulists">
                    <li class="layui-nav-item layui-nav-itemed">
                        <a class="" href="javascript:;">所有商品</a>
                        <dl class="layui-nav-child">
                            <dd><a class="site-demo-active" data-url='#' data-id="1" data-name="111">列表一</a></dd>
                            <dd><a class="site-demo-active" data-url='#' data-id="2" data-name="112">列表2</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">解决方案</a>
                        <dl class="layui-nav-child">
                            <dd><a href="javascript:;">列表一</a></dd>
                            <dd><a href="javascript:;">列表二</a></dd>
                            <dd><a href="">超链接</a></dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item"><a href="">云市场</a></li>
                    <li class="layui-nav-item"><a href="">发布商品</a></li>
                </ul>
            </div>


        </div>













        <div class="layui-body">
            <!-- 内容主体区域 -->
            <div class="layui-tab layui-tab-card" lay-filter="demo" lay-allowclose="true"
                style="height: calc(100% - 20px);margin: 10px 12px;">
                <ul class="layui-tab-title">
                </ul>
                <div class="layui-tab-content" style="height: calc(100% - 40px);">
                </div>
            </div>
        </div>

        <div class="layui-footer">
            <!-- 底部固定区域 -->
            <p class="pull-left">&copy; <?php echo Html::encode(Y::param('name')) ?> <?=date('Y')?></p>
            <p class="pull-right"><?php //echo Yii::powered()?></p>
        </div>
    </div>
    <script>
    layui.use('element', function() {
        var $ = layui.jquery,
            element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块

        //触发事件
        var active = {
            tabAdd: function(url, id, name) {
                //新增一个Tab项
                element.tabAdd('demo', {
                    title: name,
                    content: '<iframe data-frameid="' + id +
                        '" scrolling="auto" frameborder="0" src="' + url +
                        '" style="width:100%;height:100%"></iframe>',
                    id: id
                })
            },
            tabDelete: function(othis) {
                //删除指定Tab项
                element.tabDelete('demo', '44'); //删除：“商品管理”


                othis.addClass('layui-btn-disabled');
            },
            tabChange: function(id) {
                //切换到指定Tab项
                element.tabChange('demo', id); //切换到：用户管理
            }
        };

        //Hash地址的定位
        var layid = location.hash.replace(/^#demo=/, '');
        element.tabChange('demo', layid);

        element.on('tab(demo)', function(elem) {
            location.hash = 'demo=' + $(this).attr('lay-id');
        });

        element.on('nav(menulists)', function(elem) {
            var layid = elem.attr('data-id');
            var url = elem.attr('data-url');
            var name = elem.attr('data-name');
            if ($("li[lay-id='" + layid + "']").length == 0) {
                active.tabAdd(url, layid, name);
            }
            active.tabChange(layid);
        });

    });
    </script>
    <?php $this->endBody()?>
</body>

</html>
<?php $this->endPage()?>