<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <p><h4><?php echo $article->title;?></h4></p>
            <p><span class="label label-info"><i class="fa fa-eye"></i> Views: <?php echo $article->views;?></span> <span> <?php echo $article->category;?></span></p>
            <img src="<?php echo Request::base_url()."/assets/uploads/".$article->featuredimage?>" class="img-responsive img-rounded img-thumbnail  img-sm"/>
            <hr>
            <?php echo $article->content;?>
        </div>
    </div>          
</div>