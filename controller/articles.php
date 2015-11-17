<?php

switch ($uri[1]) {
    case "add":
        DBDriver::execute("INSERT INTO `kb_article`(`title`, `permalink`, `category`, `content`, `featuredimage`, `dateadd`, `published`)"
                . "VALUES (:title, :permalink, :category, :content, :filename, NOW(), :publish)", array(
           ':title'=>$_POST['title'], 
           ':permalink'=>str_replace(" ", "-",strtolower($_POST['title'])), 
           ':category'=>$_POST['category'], 
           ':content'=>$_POST['editor'], 
           ':filename'=>$_POST['image'],
           ':publish'=>$_POST['publish'], 
        ));
        Response::redirect($uri[0]."/all");
        break;

    case "update":
        DBDriver::execute("UPDATE kb_article SET title=:title, permalink=:permalink, content=:content, category=:category, datemodified=NOW(), featuredimage=:filename, published=:published WHERE id=:id",  array(
           ':title'=>$_POST['title'], 
           ':permalink'=>str_replace(" ", "-",strtolower($_POST['title'])), 
           ':category'=>$_POST['category'], 
           ':content'=>$_POST['editor'], 
           ':filename'=>$_POST['image'],
           ':published'=>$_POST['published'], 
           ':id'=> (int) $_POST['id'],
        ));
        Response::redirect($uri[0]."/all");
        break;
    
    case "delete":
        DBDriver::execute('DELETE FROM posts WHERE id = :id', array(':id'=> (int) $_POST['id']));
        Response::redirect($uri[0]."/all");
        break;
}