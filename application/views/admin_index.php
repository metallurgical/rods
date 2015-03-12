
<?php $this->load->view('main_header'); ?>
<body>

    <div id="wrapper">

        <?php $this->load->view('main_header_top'); ?>
        <?php $this->load->view('menus_admin.php'); ?>            
<!-- dont disturb here -->




        <?php $this->load->view('data_messages');?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hello Admin</h1>

                    </div>
                    <br/>
                    <div class="jumbotron">
                      <h1></h1>
                      <p>...</p>
                      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                    		
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
