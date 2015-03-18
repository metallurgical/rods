
<?php $this->load->view('main_header'); ?>
<body>

    <div id="wrapper">

        <?php $this->load->view('main_header_top'); ?>
        <?php $this->load->view('menus_staff'); ?>            
<!-- dont disturb here -->





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
                        <!-- <span class="label label-danger">Please be noted, after the orders was confirmed, cancelation of order no longer acceptable.</span> -->
                        <form action="" method="POST">
                            <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Status Order</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $total = 0;
                              $num = 1;
                              $radio_delivery_cod = 0;
                              $radio_delivery_shop = 0;
                              foreach ($orders as $key => $value)
                              {
                               ?>
                               <tr>
                                <th scope="row">
                                  <?php echo $num++;?>
                                  <!-- <input type="hidden" name="food_order_id[]" value="<?php echo $value['food_order_id'];?>"> -->
                                </th>
                                
                                <td>
                                <?php 
                                $table = "customers";
                                $where = array(
                                        'customer_id' => $value['customer_id']
                                      );
                                $customer = $this->k_model->get_specified_row($table,$where);
                                echo $customer['customer_name'];
                                ?></td>
                                <td>
                                <?php 
                                $table = "food_order";
                                $tableNameToJoin = array(
                                                    'foods'
                                                  );
                                $tableRelation = array(
                                                  'food_order.food_id = foods.food_id'
                                                );
                                $where = array(
                                        'customer_id' => $value['customer_id']
                                      );
                                $orders = $this->k_model->get_all_rows($table,$where, $tableNameToJoin, $tableRelation);
                                
                                foreach ($orders as $key => $value) {
                                 
                                  if($value['food_order_status']==1)
                                  { 
                                    $sta =  "<font color='green'>Confirmed</font>";
                                  }
                                  else if($value['food_order_status']==2)
                                  {
                                    $sta =  "<font color='orange'>Delivery Process</font>";
                                  }
                                  else if($value['food_order_status']==3)
                                  {
                                    $sta =  "<font color='blue'>Delivered</font>";
                                  }
                                  else if($value['food_order_status']==4)
                                  {
                                    $sta =  "<font color='red'>Food Out of Service</font>";
                                  }

                                    echo $value['food_name']." - $sta"."<br/>";
                                }
                                  /*if($value['food_order_status']==1)
                                  { 
                                    echo "Confirmed";
                                  }
                                  else if($value['food_order_status']==2)
                                  {
                                    echo "Delivery Process";
                                  }
                                  else if($value['food_order_status']==3)
                                  {
                                    echo "Delivered";
                                  }*/
                                  
                                ;?></td> 
                                <td>
                                  <a href="<?php echo base_url();?>order_management/list_order_staff_detail/<?php echo $value['customer_id'];?>" class="btn btn-danger" role="button">View </a>
                                </td>
                              </tr>
                              <?php 
                              }
                              ?>
                              
                               </tbody>
                           </table>
                           <?php
                           /*
                           if($order_method)
                            {?>
                           <input type="submit" value="Confirm" name="submit" class="btn btn-info">
                           <?php
                            }*/
                           ?>
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
