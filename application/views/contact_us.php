
<?php $this->load->view('main_header'); ?>
<body>

    <div id="wrapper">

        <?php $this->load->view('main_header_top'); ?>
        <?php $this->load->view('main_menus.php'); ?>            
<!-- dont disturb here -->




        <?php $this->load->view('data_messages');?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php echo $title;?></h1>

                    </div>
                    <br/>
                                       
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                    		<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Details Information</h3>
  </div>
  <div class="panel-body">
    Feel free to contact us at rods@yahoo.com. 
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
