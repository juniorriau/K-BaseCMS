<div class="column col-sm-10 col-xs-11" id="main">
<!-- Top nav -->
    <div class="navbar navbar-blue navbar-static-top">  
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo Request::base_url()?>" class="navbar-brand logo">kb</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="col-md-11">
                <form class="navbar-form navbar-right" method="POST" action="<?php echo Request::base_url()?>/search/">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                            </span>
                            <input type="text" class="form-control" id="myInput" name="myInput" placeholder="Search for...">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- content body -->
    <div class="padding">
        <div class="full col-sm-9">              
            <div class="row">
                <?php
                if(Request::isGet()){
                switch ($uri[0]) {
                    case "category":
                        switch ($uri[1]) {
                            case "all":
                                $cat=  DBDriver::all("SELECT id,title, permalink, description FROM kb_category WHERE published=1");
                                if(!empty($cat)){ 
                                    foreach ($cat as $c) {
                                        $sumcat=  DBDriver::row("SELECT COUNT(id) as totalarticle FROM kb_article WHERE category=:id",array(":id"=> $c->id));                 
                                        include "category.php";
                                    }                                    
                                }else{
                                    ?>
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                           <h3 class="panel-title">Empty!</h3>
                                        </div>
                                        <div class="panel-body">
                                            No Category Found!
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php
                                break;
                                
                            default :
                                $article=  DBDriver::all("SELECT kba.title,kba.content,kbc.title as category, kba.views, kba.featuredimage, kba.permalink from kb_article kba, kb_category kbc where kba.category=kbc.id and kba.published=1 and kbc.permalink=:permalink", array(":permalink"=>$uri[1]));
                                if(!empty($article)){
                                    include 'articles.php';
                                }
                                else{
                                    ?>
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                           <h3 class="panel-title">Empty!</h3>
                                        </div>
                                        <div class="panel-body">
                                            No Article Found!
                                        </div>
                                    </div>
                                    <?php
                                }
                                break;
                        }
                        break;
                    case "article":
                        switch ($uri[1]){
                            case "new":
                                $article=  DBDriver::all("SELECT kba.title,kba.content,kbc.title as category, kba.views, kba.featuredimage, kba.permalink from kb_article kba, kb_category kbc where kba.category=kbc.id and kba.published=1 and kbc.published=1 order by kba.dateadd desc limit 0,5");
                                if(!empty($article)){
                                    include 'articles.php';
                                }
                                else{
                                    ?>
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                           <h3 class="panel-title">Empty!</h3>
                                        </div>
                                        <div class="panel-body">
                                            No Article Found!
                                        </div>
                                    </div>
                                    <?php
                                }
                                break;
                            default:
                                $article=  DBDriver::row("SELECT kba.title,kba.content,kbc.title as category, kba.views, kba.featuredimage from kb_article kba, kb_category kbc where kba.category=kbc.id and kba.permalink=:permalink", array(":permalink"=>$uri[1]));
                                if(!empty($article)){
                                    include 'contentdetail.php';
                                }
                                else{
                                    ?>
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                           <h3 class="panel-title">Empty!</h3>
                                        </div>
                                        <div class="panel-body">
                                            No Article Found!
                                        </div>
                                    </div>
                                    <?php
                                }
                                break;
                        }
                        
                        break;
                    
                    default:
                        $article=  DBDriver::all("SELECT kba.title,kba.content,kbc.title as category, kba.views, kba.featuredimage, kba.permalink from kb_article kba, kb_category kbc where kba.category=kbc.id and kba.published=1 and kbc.published=1");
                        if(!empty($article)){
                            include 'articles.php';
                        }
                        else{
                            ?>
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                           <h3 class="panel-title">Empty!</h3>
                                        </div>
                                        <div class="panel-body">
                                            No Article Found!
                                        </div>
                                    </div>
                                    <?php
                        }
                        break;
                }
                }else{
                    $keyword="%".$_POST['myInput']."%";
                    $article= DBDriver::all("SELECT kba.title,kba.content, kba.views, kba.featuredimage, kba.permalink from kb_article kba where kba.published=1 and kba.permalink like :permalink", array(":permalink"=> $keyword));
                        if(!empty($article)){
                            include "articles.php";
                        }
                        else{
                            ?>
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                           <h3 class="panel-title">Empty!</h3>
                                        </div>
                                        <div class="panel-body">
                                            No Article Found!
                                        </div>
                                    </div>
                                    <?php
                        }
                }
                ?>
            </div>
        </div>
    </div>
</div>