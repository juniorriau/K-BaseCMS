<?php
    $sumcat=  DBDriver::row("SELECT count(id) as total from kb_category WHERE published=1");
?>
<div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
<ul class="nav">
    <li><a href="#" data-toggle="offcanvas" data-target="lg-menu" class="visible-xs text-center"><span class="fa fa-2x fa-bars"></span></a></li>
</ul>
<ul class="nav hidden-xs" id="lg-menu">
    <li><a href="<?php echo Request::base_url()?>"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="<?php echo Request::base_url()."/".$slug['category']?>/all"><i class="fa fa-list-alt"></i> List Category <span class="label label-success"> <?php echo $sumcat->total;?> </span></a></li>
    <li><a href="<?php echo Request::base_url()."/".$slug['article']."/new"?>"><i class="fa fa-list-ul"></i> New Article</a></li>
</ul>         
<!-- tiny only nav-->
</div>