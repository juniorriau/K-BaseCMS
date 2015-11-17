<div class="col-md-4">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $c->title;?> <span class="label label-info pull-right"><?php echo $sumcat->totalarticle;?></span></h3>
    </div>
    <div class="panel-body">
        <p><?php echo $c->description;?></p>
        <a href="<?php echo Request::base_url()."/".$slug['category']."/".$c->permalink;?>"  class="btn btn-sm btn-success pull-right"><i class="fa fa-1x fa-search-plus"></i> Find All </a>
    </div>
</div>
</div>