<?php

switch ($uri[1]) {
    case "auth":
        $check=DBDriver::row("SELECT `email`,`username`,`password` FROM `kb_users` WHERE `password`=:password and`email`=:email", array(
           ':password'=>sha1($_POST['password'].Configuration::get("salt")), 
           ':email'=>$_POST['email'], 
        ));
        if(!empty($check)){
            $_SESSION['sysadmin']=$check->username;
            Response::redirect("./");
        }else{
            Response::redirect($uri[0]."/auth");
        }
        
        break;

    case "logout":
        session_destroy();               
        Response::redirect("./");
        break;
}

