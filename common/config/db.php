<?php

use icy2003\php\iextensions\yii2\db\Connection;

return [
    'class' => Connection::className(),
    'dsn' => 'imysql:host=localhost;dbname=icyii2003',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'tablePrefix' => 'i_',
    // 'enableSchemaCache' => true, // 是否开启 Schema 缓存
    // 'schemaCacheDuration' => 3600,
    // 'schemaCache' => 'cache',
];
