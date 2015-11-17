<?php

switch ($uri[1]) {
    case "add":
        if(isset($_FILES['file'])){
            $f=new Uploader();
            $f->saveImage($_FILES['file'], "../assets/uploads/");
            if($f){
                DBDriver::execute("INSERT INTO `kb_media`(`name`, `fulllink`, `dateadd`) VALUES (:name, :fulllink, NOW())", array(
                ':name'=>$_FILES['file']['name'], 
                ':fulllink'=>  Configuration::get('host')."/assets/uploads/".$_FILES['file']['name'], 
                 ));
            }
        }
        Response::redirect($uri[0]."/all");
        break;
    
    case "delete":
        DBDriver::execute('DELETE FROM kb_media WHERE id = :id', array(':id'=> (int) $_POST['id']));
        unlink("../assets/uploads/".$_POST['name']);
        Response::redirect($uri[0]."/all");
        break;
}