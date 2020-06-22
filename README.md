# icyii2003

这是我基于 Yii2 的高级模板的个人项目，我会不定时丢一些半成品代码上去（无法运行概不负责）

想要纯净的 Yii2 高级模板的同学请直接下载第一个[正式包](https://github.com/icy2003/icyii2003/releases/tag/v0.0)，它修复了 composer 更新依赖时的问题（问题列表在结尾）

原版后续教程点[这里](https://www.yiiframework.com/extension/yiisoft/yii2-app-advanced/doc/guide/2.0/en/start-installation#preparing-application)

## 安装

1. 克隆该项目
2. composer 安装依赖 `composer install`
3. 初始化项目 `init`
4. 修改数据库配置 "common/config/db.php" 并把 "common/config/main-local.php" 的 db 组件的值改为 `require __DIR__ . '/db.php'`
5. 初始化数据库 `yii migrate`
6. 初始化 RBAC 权限 `yii migrate --migrationPath=@yii/rbac/migrations/`
7. bower 更新前端依赖 `bower update`

## Yii2 原高级模板问题

1. `- yiisoft/yii2 2.0.12 requires bower-asset/jquery 2.2.@stable | 2.1.@stable | 1.11.@stable | 1.12.@stable -> no matching package found.` 这个报错网上说用 `fxp/composer-asset-plugin` 可以解决，然而有些人运气好，有些人……
2. 以上问题可以由 [yidas/yii2-bower-asset](https://packagist.org/packages/yidas/yii2-bower-asset) 解决，不过还需要一点点配置，喜欢用 Yii2 官源下载的童鞋可以自行研究
3. 我把 composer 源改成了[阿里云](https://mirrors.aliyun.com/composer/)，满速下载
