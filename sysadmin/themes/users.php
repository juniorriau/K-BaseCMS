<?php
echo "<div class='content-wrapper'>";
switch ($uri[1]) {
    case "all":
        $user=  DBDriver::all("SELECT `id`, `username`, `password`, `firstname`, `lastname`, `email`, `dateregister`, `keyhash`, `role` FROM `users` ORDER BY `id`");
        ?>           
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Manage User
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">User</a></li>
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
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>Date Register</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $row = 1;
                            foreach($user as $u): ?>
                          <tr>
                            <td><?php echo $row;?></td>
                            <td><?php echo $u->username;?></td>
                            <td><?php echo $u->firstname;?></td>
                            <td><?php echo $u->email;?></td>
                            <td><?php echo $u->dateregister?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" title="Edit" href="<?php echo Request::base_url().'/'.$uri[0]."/update/".$u->id;?>"><span class="glyphicon glyphicon-pencil"></a>
                                <a class="btn btn-danger btn-sm" title="Delete" href="<?php echo Request::base_url().'/'.$uri[0]."/delete/".$u->id;?>"><span class="glyphicon glyphicon-trash"></a>
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
                Manage User
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">User</a></li>
                <li class="active">Add</li>
              </ol>
            </section>
            <section class="content">
                <div class='row'>
                    <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Add User</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="<?php echo Request::base_url()."/".$uri[0]."/".$uri[1];?>">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter User" required="required">
                      </div>
                      <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required="required">
                      </div>
                      <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required="required">
                      </div>
                      <div class="form-group">
                        <label for="useremail">User Email</label>
                        <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Enter User Email" required="required">
                      </div>
                      <div class="form-group">
                        <label for="username">User Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter User Password" required="required">
                      </div>
                      <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter Confirm Password" required="required">
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
        $user=DBDriver::row("SELECT id, `username`, `password`, `firstname`, `lastname`, `email` FROM users WHERE id=:id", array(':id' => $uri[2]));
        ?><section class="content-header">
            <h1>
                Manage User
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">User</a></li>
                <li class="active">Update</li>
              </ol>
            </section>
            <section class="content">
                <div class='row'>
                    <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Update User :</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="<?php echo Request::base_url()."/".$uri[0]."/".$uri[1];?>">
                    <div class="box-body">
                      <div class="form-group">
                          <input type="hidden" name="id" value="<?php echo $user->id;?>"/>
                        <label for="username">User Name</label>
                        <input type="text" value="<?php echo $user->username;?>" class="form-control" id="username" name="username" placeholder="Enter User" required="required">
                      </div>
                      <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" value="<?php echo $user->firstname;?>" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required="required">
                      </div>
                      <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" value="<?php echo $user->lastname;?>" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required="required">
                      </div>
                      <div class="form-group">
                        <label for="useremail">User Email</label>
                        <input type="email" value="<?php echo $user->email;?>" class="form-control" id="useremail" name="useremail" placeholder="Enter User Email" required="required">
                      </div>
                      <div class="form-group">
                          <label for="username">User Password, <span class="label label-warning">enter for change only!</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter User Password">
                      </div>
                      <div class="form-group">
                        <label for="cpassword">Confirm Password, <span class="label label-warning">enter for change only!</span></label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter Confirm Password">
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
        $user=DBDriver::row("SELECT id, `username`, `email` FROM `users` WHERE id=:id", array(':id' => $uri[2]));
        ?><section class="content-header">
            <h1>
                Manage User
              </h1>
              <ol class="breadcrumb">
                <li><a href="<?php echo Request::base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo Request::base_url()."/".$uri[0]."/all";?>">User</a></li>
                <li class="active">Delete</li>
              </ol>
            </section>
            <section class="content">
                <div class='row'>
                    <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Delete User : </h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="<?php echo Request::base_url()."/".$uri[0]."/".$uri[1];?>">
                    <div class="box-body">
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $user->id;?>" />
                        <label for="username">User Name</label>
                        <input type="text" value="<?php echo $user->username."(".$user->email.")";?>" class="form-control" id="username" name="username" placeholder="Enter User"readonly="true">
                      </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <label>Are you sure to delete this username? </label>
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