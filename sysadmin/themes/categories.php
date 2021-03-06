<?php
echo "<div class='content-wrapper'>";
switch ($uri[1]) {
    case "all":
        $cat=  DBDriver::all("SELECT `id`, `title`, `description`, `permalink`, `dateadd`,`published` FROM `kb_category`");
        ?>           
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Manage Category
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">Category</a></li>
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
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Date Add</th>
                            <th>Published</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $row = 1;
                            foreach($cat as $c): ?>
                          <tr>
                            <td><?php echo $row;?></td>
                            <td><?php echo $c->title;?></td>
                            <td><?php echo $c->description;?></td>
                            <td><?php echo $c->dateadd;?></td>
                            <td><?php echo $c->published;?></td>
                            <td><?php echo $c->tags;?></td>
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
        
    case "add":        
        ?>
            <section class="content-header">
                <h1>
                Manage Category
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">Category</a></li>
                <li class="active">Add</li>
              </ol>
            </section>
            <section class="content">
                <div class='row'>
                    <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Category</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="<?php echo Request::base_url()."/".$uri[0]."/".$uri[1];?>">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="category">Category Name</label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category" required="required">
                      </div>
                      <div class="form-group">
                        <label for="description">Category Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Category" required="required">
                      </div>
                      <div class="form-group">
                        <label for="published">Publish</label>
                        <select class="form-control" id="published" name="published">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
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
        $cat=DBDriver::row("SELECT `id`, `title`, `description`, `published` FROM `kb_category` WHERE `id`=:id", array(':id' => $uri[2]));
        ?><section class="content-header">
            <h1>
                Manage Category
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">Category</a></li>
                <li class="active">Update</li>
              </ol>
            </section>
            <section class="content">
                <div class='row'>
                    <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Update Category :</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="<?php echo Request::base_url()."/".$uri[0]."/".$uri[1];?>">
                    <div class="box-body">
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $cat->id;?>" />
                        <label for="category">Category Name</label>
                        <input type="text" value="<?php echo $cat->title;?>" class="form-control" id="category" name="category" placeholder="Enter Category" required="required">
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $cat->id;?>" />
                        <label for="description">Category Name</label>
                        <input type="text" value="<?php echo $cat->description;?>" class="form-control" id="description" name="description" placeholder="Enter Category" required="required">
                      </div>
                      <div class="form-group">
                        <label for="publish">Publish</label>
                        <select class="form-control" id="published" name="published">
                            <option value="1"  <?php if($cat->published==1) echo "selected";?>>Yes</option>
                            <option value="0"  <?php if($cat->published==0) echo "selected";?>>No</option>
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
        $cat=DBDriver::row("SELECT `id`, `title` FROM `kb_category` WHERE `id` =:id", array(':id' => $uri[2]));
        ?><section class="content-header">
            <h1>
                Manage Category
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">Category</a></li>
                <li class="active">Delete</li>
              </ol>
            </section>
            <section class="content">
                <div class='row'>
                    <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Delete Category : </h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="<?php echo Request::base_url()."/".$uri[0]."/".$uri[1];?>">
                    <div class="box-body">
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $cat->id;?>" />
                        <label for="category">Category Name</label>
                        <input type="text" value="<?php echo $cat->category;?>" class="form-control" id="category" name="category" placeholder="Enter Category"readonly="true">
                      </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <label>Are you sure to delete this category? </label>
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