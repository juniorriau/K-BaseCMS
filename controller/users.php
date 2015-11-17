<?php

switch ($uri[1]) {
    case "add":
        DBDriver::execute("INSERT INTO `kb_users`(`username`, `password`, `firstname`, `lastname`, `email`, `dateregister`) VALUES (:username, :password, :firstname, :lastname, :email, NOW())", array(
           ':username'=>$_POST['username'], 
           ':password'=>sha1($_POST['password'].Configuration::get("salt")),  
           ':firstname'=>$_POST['fname'], 
           ':lastname'=>$_POST['lname'], 
           ':email'=>$_POST['useremail'], 
        ));
        Response::redirect($uri[0]."/all");
        break;

    case "update":
        if($_POST['password']==""){
            DBDriver::execute("UPDATE users SET username=:username, firstname=:firstname, lastname=:lastname, email=:email WHERE id=:id", array(
           ':username'=>$_POST['username'], 
           ':firstname'=>$_POST['fname'], 
           ':lastname'=>$_POST['lname'], 
           ':email'=>$_POST['useremail'], 
           ':id'=> (int) $_POST['id'],));
        }else{
            DBDriver::execute("UPDATE users SET username:username, password=:password, firstname=:firstname, lastname=:lastname, email=:email WHERE id=:id", array(
           ':username'=>$_POST['username'], 
           ':password'=>sha1($_POST['password'].Configuration::get("salt")), 
           ':firstname'=>$_POST['fname'], 
           ':lastname'=>$_POST['lname'], 
           ':email'=>$_POST['useremail'], 
           ':id'=> (int) $_POST['id'],));
        }
        
        Response::redirect($uri[0]."/all");
        break;
    
    case "delete":
        DBDriver::execute('DELETE FROM users WHERE id = :id', array(':id'=> (int) $_POST['id']));
        Response::redirect($uri[0]."/all");
        break;
}