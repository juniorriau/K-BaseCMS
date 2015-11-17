<?php
echo "<div class='content-wrapper'>";
switch ($uri[1]) {
    case "all":
        $im=  DBDriver::all("SELECT `id`, `name`, `dateadd`, `fulllink` FROM `kb_media` ORDER by `id` Asc");
        ?>           
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Media Lists
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
                            <th>File Name</th>
                            <th>Date Add</th>
                            <th>Image View</th>
                            <th>Full Link</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $row = 1;
                            foreach($im as $i): ?>
                          <tr>
                            <td><?php echo $row;?></td>
                            <td><?php echo $i->name;?></td>
                            <td><?php echo $i->dateadd;?></td>
                            <td><img src="<?php echo Request::base_url()."/../assets/uploads/".$i->name;?>" class="img img-thumbnail img-responsive img-lg"></td>
                            <td><div class="well well-sm"><?php echo Configuration::get('host')."/assets/uploads/".$i->name;?></div></td>
                            <td>
                                <a class="btn btn-primary btn-sm" title="Edit" href="<?php echo Request::base_url().'/'.$uri[0]."/update/".$i->id;?>"><span class="glyphicon glyphicon-pencil"></a>
                                <a class="btn btn-danger btn-sm" title="Delete" href="<?php echo Request::base_url().'/'.$uri[0]."/delete/".$i->id;?>"><span class="glyphicon glyphicon-trash"></a>
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
                Media File
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">Category</a></li>
                <li class="active">Add New File Image</li>
              </ol>
            </section>
            <section class="content">
                <div class='row'>
                    <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Media</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="<?php echo Request::base_url()."/".$uri[0]."/".$uri[1];?>" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="imegory">Choose File</label>
                        <input type="file" class="form-control" id="file" name="file" placeholder="Enter Category" required="required">
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
    
    
    case "delete":
        $im=DBDriver::row("SELECT `id`, `name` FROM `kb_media` WHERE id=:id", array(':id' => $uri[2]));
        ?><section class="content-header">
              <h1>
                Media File
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
                    <h3 class="box-title">Delete Media : </h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="<?php echo Request::base_url()."/".$uri[0]."/".$uri[1];?>">
                    <div class="box-body">
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $im->id;?>" />
                        <input type="hidden" name="name" value="<?php echo $im->name;?>" />
                        <label for="file">File Name</label>
                        <img src="<?php echo Request::base_url()."/../assets/upload/".$im->name;?>" class="img img-responsive img-rounded">
                      </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <label>Are you sure to delete this file? </label>
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