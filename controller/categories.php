<?php

switch ($uri[1]) {
    case "add":
        DBDriver::execute("INSERT INTO `kb_category`(`title`, `description`, `permalink`, `dateadd`, `published`) VALUES (:title,:description,:permalink,NOW(),:published)", array(
           ':title'=>$_POST['category'], 
           ':description'=>$_POST['description'], 
           ':permalink'=> str_replace(" ", "-", strtolower($_POST['category'])),
           ':published'=>$_POST['published'], 
        ));
        Response::redirect($uri[0]."/all");
        break;

    case "update":
        DBDriver::execute("UPDATE `kb_category` SET `title`=:title, `description`=:description, `permalink`=:permalink, `datemodified`=NOW(), `published`=:published WHERE id=:id", array(
           ':title'=>$_POST['category'], 
           ':description'=>$_POST['description'], 
           ':permalink'=> str_replace(" ", "-", strtolower($_POST['category'])),
           ':published'=>$_POST['published'],
           ':id'=> (int) $_POST['id'],
        ));
        Response::redirect($uri[0]."/all");
        break;
    
    case "delete":
        DBDriver::execute('DELETE FROM `kb_category` WHERE `id` = :id', array(':id'=> (int) $_POST['id']));
        Response::redirect($uri[0]."/all");
        break;
}