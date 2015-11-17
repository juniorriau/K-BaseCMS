<?php
foreach ($article as $a){
    ?>
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <p><h4><?php echo $a->title;?></h4></p>
        <p><span class="label label-info"><i class="fa fa-eye"></i> Views: <?php echo $a->views;?></span> <span class="badge"><?php echo $a->category;?></span></p>
            <img src="<?php echo Request::base_url()."/assets/uploads/".$a->featuredimage;?>" class="img-responsive"/>
            <hr>
            <p><?php echo substr($a->content, 0, 100);?> <a href="<?php echo Request::base_url()."/".$slug['article']."/".$a->permalink;?>" class="btn btn-sm btn-success"><i class="fa fa-send-o"></i> Read More</a> </p>
        </div>
    </div>          
</div>
<?php } ?>