<?php
echo "<div class='content-wrapper'>";
switch ($uri[1]) {
    case "all":
        $post=  DBDriver::all("SELECT `kba`.`id`, `kba`.`title`, `kba`.`permalink`, `kbc`.`title` as `category`, `kba`.`published` FROM `kb_article` `kba`, `kb_category` `kbc` WHERE `kba`.`category` = `kbc`.`id`");
        ?>           
            <!-- Content Header (Articles header) -->
            <section class="content-header">
              <h1>
                Manage Articles
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">Articles</a></li>
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
                            <th>Title</th>
                            <th>Category</th>
                            <th>Publish</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $row = 1;
                            foreach($post as $p): ?>
                          <tr>
                            <td><?php echo $row;?></td>
                            <td><?php echo $p->title;?></td>
                            <td><?php echo $p->category;?></td>
                            <td><?php echo $p->published ? 'Yes' : 'No'; ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" title="Edit" href="<?php echo Request::base_url().'/'.$uri[0]."/update/".$p->id;?>"><span class="glyphicon glyphicon-pencil"></a>
                                <a class="btn btn-danger btn-sm" title="Delete" href="<?php echo Request::base_url().'/'.$uri[0]."/delete/".$p->id;?>"><span class="glyphicon glyphicon-trash"></a>
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
        
    case "add":
        $cat=  DBDriver::all("SELECT `id`, `title` FROM `kb_category` ORDER by `id` Asc");
        ?>
            <section class="content-header">
                <h1>
                Manage Articles
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">Articles</a></li>
                <li class="active">Add</li>
              </ol>
            </section>
            <section class="content">
                <div class='row'>
                    <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Add Articles</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="<?php echo Request::base_url()."/".$uri[0]."/".$uri[1];?>">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="title">Articles Name</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Articles" required="required">
                      </div>
                      <div class="form-group">
                        <label for="tags">Articles Content</label>
                        <textarea id="editor" name="editor" rows="10" cols="80">
                        </textarea>
                      </div>
                      <div class="form-group">
                        <label for="image">Image Name</label>
                        <input type="text" class="form-control" id="image" name="image" placeholder="Enter image name">
                      </div>
                      <div class="form-group">
                        <label for="publish">Publish</label>
                        <select class="form-control" id="publish" name="publish">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="publish">Category</label>
                        <select class="form-control" id="category" name="category">
                            <?php 
                            if(empty($cat)){ ?>
                                <option value="">None</option>
                            <?php
                            
                            }else{
                                ?><option value="0">None</option><?php
                                foreach($cat as $c): ?>
                                <option value="<?php echo $c->id;?>" ><?php echo $c->title; ?></option>
                            <?php endforeach; 
                            }?>
                        </select>
                      </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                  </form>
                </div><!-- /.box -->

              </div><!--/.col (left) -->
                </div>
            </section>
            <?php
        break;
    
    case "update":
        $post=DBDriver::row("SELECT `id`, `title`, `content`, `category`, `featuredimage`, `published` FROM `kb_article` WHERE id=:id", array(':id' => $uri[2]));
        $cat=  DBDriver::all("SELECT `id`, `title` FROM `kb_category` ORDER by `id` Asc");
        ?><section class="content-header">
              <h1>
                Manage Articles
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">Articles</a></li>
                <li class="active">Update </li>
              </ol>
            </section>
            <section class="content">
                <div class='row'>
                    <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Update Articles :</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="<?php echo Request::base_url()."/".$uri[0]."/".$uri[1];?>">
                   <div class="box-body">
                      <div class="form-group">
                        <label for="title">Articles Name</label>
                        <input type="hidden" value="<?php echo $post->id;?>" name="id"/>
                        <input type="text" value="<?php echo $post->title;?>" class="form-control" id="title" name="title" placeholder="Enter Articles" required="required">
                      </div>
                      <div class="form-group">
                        <label for="tags">Articles Content</label>
                        <textarea id="editor" name="editor" rows="10" cols="80"><?php echo $post->content;?>
                        </textarea>
                      </div>
                      <div class="form-group">
                        <label for="image">Image Name</label>
                        <input type="text" value="<?php echo $post->featuredimage;?>" class="form-control" id="image" name="image" placeholder="Enter image name">
                      </div>
                      <div class="form-group">
                        <label for="publish">Publish</label>
                        <select class="form-control" id="published" name="published">
                            <option value="1"  <?php if($post->published==1) echo "selected";?>>Yes</option>
                            <option value="0"  <?php if($post->published==0) echo "selected";?>>No</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="publish">Category</label>
                        <select class="form-control" id="category" name="category">
                            <?php 
                            if(empty($cat)){ ?>
                                <option value="">None</option>
                            <?php
                            
                            }else{
                                ?><option value="0">None</option><?php
                                foreach($cat as $c): ?>
                                <option value="<?php echo $c->id;?>" <?php if($c->id==$post->category) echo "selected";?>><?php echo $c->title; ?></option>
                            <?php endforeach; 
                            }?>
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
        $post=DBDriver::row("SELECT `id`, `title` FROM `pages` WHERE id=:id", array(':id' => $uri[2]));
        ?><section class="content-header">
              <h1>
                Manage Articles
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">Articles</a></li>
                <li class="active">Delete</li>
              </ol>
            </section>
            <section class="content">
                <div class='row'>
                    <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Delete Articles : </h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="<?php echo Request::base_url()."/".$uri[0]."/".$uri[1];?>">
                    <div class="box-body">
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $post->id;?>" />
                        <label for="title">Articles Name</label>
                        <input type="text" value="<?php echo $post->title;?>" class="form-control" id="title" name="title" placeholder="Enter Articles"readonly="true">
                      </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <label>Are you sure to delete this title? </label>
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