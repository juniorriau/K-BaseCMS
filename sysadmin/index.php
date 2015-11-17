<?php

/* 
 * Copyright (C) 2015 Junior Riau <juniorriau18@gmail.com>.
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301  USA
 */
session_start();
require_once 'library/Autoload.php';
Autoload::register();
Configuration::load("../config/config.php");
$uri=Request::getURI();
$baseInc = Configuration::get('base_include');
$basepat=Request::getBasePath();
if(Request::isGet()){
    if(!isset($_SESSION['sysadmin'])){
        require $baseInc['views'].'/login.php';
    }else{
    require $baseInc['views'].'/layout.php';
    }
}elseif(Request::isPost()){
    if(file_exists("../".$baseInc['controllers']."/".$uri[0].".php")){
        include "../".$baseInc['controllers']."/".$uri[0].".php";   
    }
}