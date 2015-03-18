
<?php $this->load->view('main_header'); ?>
<body>

    <div id="wrapper">

        <?php $this->load->view('main_header_top'); ?>
        <?php 
        if($this->session->userdata('category')=="staff")
        {
          $this->load->view('menus_staff'); 
        }
        else
        {
          
          $this->load->view('menus_admin'); 
          
        }
        
        ?>            
<!-- dont disturb here -->



<style type="text/css">
    .form-signin {
  max-width: 400px; 
  display:block;
  background-color: #f7f7f7;
  -moz-box-shadow: 0 0 3px 3px #888;
    -webkit-box-shadow: 0 0 3px 3px #888;
    box-shadow: 0 0 3px 3px #888;
  border-radius:2px;
  margin: 0 auto;
}
.main{
    padding: 38px;
}
.social-box{
  margin: 0 auto;
  padding: 38px;
  border-bottom:1px #ccc solid;
}
.social-box a{
  font-weight:bold;
  font-size:18px;
  padding:8px;
}
.social-box a i{
  font-weight:bold;
  font-size:20px;
}
.heading-desc{
    font-size:20px;
    font-weight:bold;
    padding:38px 38px 0px 38px;
    
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: 20px;
  padding: 20px;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: 10px;
  border-radius: 5px;
  
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-radius: 5px;
}
.login-footer{
    background:#f0f0f0;
    margin: 0 auto;
    border-top: 1px solid #dadada;
    padding:20px;
}
.login-footer .left-section a{
    font-weight:bold;
    color:#8a8a8a;
    line-height:19px;
}
.mg-btm{
    margin-bottom:20px;
}
</style>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $title;?></h1>
                        <?php $this->load->view('data_messages');?>
                    </div>
                                     
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                    		<div class="row">
                              <form class="form-signin mg-btm" action="" method="POST">
                                <h3 class="heading-desc">
                                <button type="button" class="close pull-right" aria-hidden="true">×</button>
                                Profile</h3>
                                
                                <div class="main"> 
                                Name
                                <input type="text" class="form-control" placeholder="Email" autofocus name="user_name" value="<?php echo $users['user_name'];?>">

                                Username
                                <input type="text" class="form-control" placeholder="Email" autofocus name="user_username" value="<?php echo $users['user_username'];?>">

                                New Password
                                <input type="password" class="form-control" placeholder="Password" name="user_password" value="">

                                Confirm Password
                                <input type="password" class="form-control" placeholder="confirm Password" name="c_user_password" value="">
                                 
                                
                                <span class="clearfix"></span>  
                                </div>
                                <div class="login-footer">
                                <div class="row">
                                                
                                  <div class="col-xs-6 col-md-6 pull-right">
                                      <input type="submit" class="btn btn-large btn-danger pull-right" name="submit" value="Save" />
                                  </div>
                                </div>
                                
                                </div>
                              </form>
                            </div>
                    	</div>
                    </div>
                    <!-- /.col-lg-12 -->                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->





<!-- dont disturb here -->
    </div>
    <!-- /#wrapper -->
       <?php $this->load->view('main_footer'); ?>


</body>

</html>
