<?php
session_start();

$libs = glob('libs/*.php');
foreach($libs as $lib) {
    require_once $lib;
}
$configs = glob('config/*.php');
foreach($configs as $config) {
    require_once $config;
}
$app = new Bootstrap();
