<?php

use Phpmig\Adapter;
use Pimple\Container;

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'include/define.php');
require_once 'vendor/autoload.php';


$container = new Container();

// replace this with a better Phpmig\Adapter\AdapterInterface
//$container['phpmig.adapter'] = new Adapter\File\Flat(__DIR__ . DIRECTORY_SEPARATOR . 'migrations/.migrations.log');

$container['phpmig.adapter'] = function ($c) {
    return new Adapter\PDO\Sql($c['db'], 'migrations');
};

//DBの接続情報
$container['db'] = function () {
    $dbh = new PDO(
        'mysql:dbname=' . $_ENV['MYSQL_DATABASE'] .
        ';host=' . $_ENV['MYSQL_HOST'] .
        ';port=' . $_ENV['MYSQL_INTERNAL_PORT'] .
        ';charset=utf8',
        $_ENV['MYSQL_USER'],
        $_ENV['MYSQL_PASSWORD']
    );
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
};

$container['phpmig.migrations_path'] = __DIR__ . DIRECTORY_SEPARATOR . 'migrations';

// You can also provide an array of migration files
// $container['phpmig.migrations'] = array_merge(
//     glob('migrations_1/*.php'),
//     glob('migrations_2/*.php')
// );

return $container;
