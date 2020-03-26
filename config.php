<?php
if (!defined('test')) {
    echo "Forbiden Request";
    exit;
}
global $config;
$config['db']['host'] = 'localhost';
$config['db']['user'] = 'root';
$config['db']['pass'] = '';
$config['db']['name'] = 'onlineshop';
