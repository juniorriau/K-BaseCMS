<?php
session_start();
require 'config/loader.php';
Configuration::load('config/config.php');
$baseInc = Configuration::get('base_include');
$slug = Configuration::get("slug");
$uri=Request::getURI();
require $baseInc['views'].'/default/layout.php';