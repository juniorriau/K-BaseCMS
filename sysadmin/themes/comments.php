<?php
echo "<div class='content-wrapper'>";
switch ($uri[1]) {
    case "all":
        $com=  DBDriver::all("SELECT cm.`id`, cm.`postid`, cm.`comments`, cm.`date`, cm.`name`, cm.`email`, cm.`ip`, cm.`published`, ps.title FROM `comments` cm, posts ps GROUP BY cm.published ORDER BY cm.id ");
        ?>           
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Manage Comments
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">Comment</a></li>
                <li class="active">View</li>
              </ol>
            </section>

            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-xs-12">

                  <div class="box">
                    <div class="box-body">
                      <table id="data" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date add</th>
                            <th>Comment</th>
                            <th>Post</th>
                            <th>IP</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $row = 1;
                            foreach($com as $c): ?>
                          <tr>
                            <td><?php echo $row;?></td>
                            <td><?php echo $c->name;?></td>
                            <td><?php echo $c->email;?></td>
                            <td><?php echo $c->date;?></td>
                            <td><?php echo $c->comments;?></td>
                            <td><?php echo $c->title;?></td>
                            <td><?php echo $c->ip;?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" title="Edit" href="<?php echo Request::base_url().'/'.$uri[0]."/update/".$c->id;?>"><span class="glyphicon glyphicon-pencil"></a>
                                <a class="btn btn-danger btn-sm" title="Delete" href="<?php echo Request::base_url().'/'.$uri[0]."/delete/".$c->id;?>"><span class="glyphicon glyphicon-trash"></a>
                            </td>
                          </tr>
                          <?php $row++; endforeach; ?>
                        </tbody>
                      </table>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div><!-- /.col -->
              </div><!-- /.row -->
            </section><!-- /.content -->
        
        <?php
        break;

    case "update":
        $com=DBDriver::row("SELECT `id`, `postid`, `comments`, `name`, `email`, `ip`, `published` FROM `comments` WHERE id=:id", array(':id' => $uri[2]));
        ?><section class="content-header">
              <h1>
                Manage Comments
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">Comment</a></li>
                <li class="active">Update</li>
              </ol>
            </section>
            <section class="content">
                <div class='row'>
                    <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Approve Comment :</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="<?php echo Request::base_url()."/".$uri[0]."/".$uri[1];?>">
                    <div class="box-body">
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $com->id;?>" />
                        <label for="name">Comment Name</label>
                        <input type="text" value="<?php echo $com->name;?>" class="form-control" id="name" name="name" placeholder="Enter Comment" required="required">
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $com->id;?>" />
                        <label for="email">Comment Email</label>
                        <input type="text" value="<?php echo $com->name;?>" class="form-control" id="email" name="email" placeholder="Enter Comment" required="required">
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $com->id;?>" />
                        <label for="ip">Comment IP</label>
                        <input type="text" value="<?php echo $com->name;?>" class="form-control" id="ip" name="ip" placeholder="Enter Comment" required="required">
                      </div>
                     <div class="form-group">
                        <label for="tags">Comment Content</label>
                        <textarea id="editor" name="editor" rows="10" cols="80"><?php echo $com->ccomments;?>
                        </textarea>
                      </div>
                      <div class="form-group">
                        <label for="publish">Publish</label>
                        <select class="form-control" id="publish" name="publish">
                            <option value="1"  <?php if($com->published==1) echo "selected";?>>Yes</option>
                            <option value="0"  <?php if($com->published==0) echo "selected";?>>No</option>
                        </select>
                      </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Save</button>
                      <a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>" class="btn btn-default">Back</a>
                    </div>
                  </form>
                </div><!-- /.box -->

              </div><!--/.col (left) -->
                </div>
            </section>
        <?php
        break;
    
    case "delete":
        $com=DBDriver::row("SELECT `id`, `name`, `tags` FROM `categories` WHERE id=:id", array(':id' => $uri[2]));
        ?><section class="content-header">
              <h1>
                Manage Comments
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">Comment</a></li>
                <li class="active">Delete</li>
              </ol>
            </section>
            <section class="content">
                <div class='row'>
                    <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Delete Comment : </h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="<?php echo Request::base_url()."/".$uri[0]."/".$uri[1];?>">
                    <div class="box-body">
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $com->id;?>" />
                        <label for="name">Comment Name</label>
                        <input type="text" value="<?php echo $com->name;?>" class="form-control" id="name" name="name" placeholder="Enter Comment"readonly="true">
                      </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <label>Are you sure to delete this name? </label>
                      <button type="submit" class="btn btn-danger">Delete</button>
                      <a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>" class="btn btn-default">Back</a>
                    </div>
                  </form>
                </div><!-- /.box -->

              </div><!--/.col (left) -->
                </div>
            </section>
        <?php
        break;
}
echo "</div>";