
<?php $this->load->view('main_header'); ?>
<body>

    <div id="wrapper">

        <?php $this->load->view('main_header_top'); ?>
        <?php $this->load->view('main_menus.php'); ?>            
<!-- dont disturb here -->



<style type="text/css">
@media (min-width: 768px) {
    .omb_row-sm-offset-3 div:first-child[class*="col-"] {
        margin-left: 25%;
    }
}

.omb_login .omb_authTitle {
    text-align: center;
  line-height: 300%;
}
  
.omb_login .omb_socialButtons a {
  color: white; // In yourUse @body-bg 
  opacity:0.9;
}
.omb_login .omb_socialButtons a:hover {
    color: white;
  opacity:1;      
}
.omb_login .omb_socialButtons .omb_btn-facebook {background: #3b5998;}
.omb_login .omb_socialButtons .omb_btn-twitter {background: #00aced;}
.omb_login .omb_socialButtons .omb_btn-google {background: #c32f10;}


.omb_login .omb_loginOr {
  position: relative;
  font-size: 1.5em;
  color: #aaa;
  margin-top: 1em;
  margin-bottom: 1em;
  padding-top: 0.5em;
  padding-bottom: 0.5em;
}
.omb_login .omb_loginOr .omb_hrOr {
  background-color: #cdcdcd;
  height: 1px;
  margin-top: 0px !important;
  margin-bottom: 0px !important;
}
.omb_login .omb_loginOr .omb_spanOr {
  display: block;
  position: absolute;
  left: 50%;
  top: -0.6em;
  margin-left: -1.5em;
  background-color: white;
  width: 3em;
  text-align: center;
}     

.omb_login .omb_loginForm .input-group.i {
  width: 2em;
}
.omb_login .omb_loginForm  .help-block {
    color: red;
}

  
@media (min-width: 768px) {
    .omb_login .omb_forgotPwd {
        text-align: right;
    margin-top:10px;
  }   
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
                              <div class="omb_login">
      
    

    <div class="row omb_row-sm-offset-3 omb_loginOr">
      <div class="col-xs-12 col-sm-6">
        <hr class="omb_hrOr">
        <span class="omb_spanOr">Login</span>
      </div>
    </div>

    <div class="row omb_row-sm-offset-3">
      <div class="col-xs-12 col-sm-6">  
          <form class="omb_loginForm" action="" autocomplete="off" method="POST">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="user_username" placeholder="email address">
          </div>
          <span class="help-block"></span>
                    
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" name="user_password" placeholder="Password">
          </div>
                   <!--  <span class="help-block">Provide details information</span> -->
                    <br/>
          <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login" name="submit">
        </form>
      </div>
      </div>
         
  </div>
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
