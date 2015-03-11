
<?php $this->load->view('main_header'); ?>
<body>

    <div id="wrapper">

        <?php $this->load->view('main_header_top'); ?>
        <?php $this->load->view('main_menus.php'); ?>            
<!-- dont disturb here -->





        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $title;?></h1>
                    </div>
                                     
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                    		<div class="row">
                              <?php 
                              foreach ($foods as $key => $value)
                              {
                               ?>
                               
                               <div class="col-sm-4 col-md-4">
                                    <div class="thumbnail">
                                      <img src="<?php echo base_url();?>assets/uploads/files/<?php echo $value['food_picture'];?>" alt="..." width="242" height="200">
                                      <div class="caption">
                                        <h3><?php echo $value['food_name'];?></h3>
                                        <p><?php echo $value['food_description'];?></p>
                                        <p>
                                        <a href="<?php echo base_url();?>booking/order/<?php echo $value['food_id'];?>" class="btn btn-primary" role="button">Booking</a> 
                                        </p>
                                      </div>
                                    </div>
                                </div>
                              <?php 
                              }
                              ?>
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
