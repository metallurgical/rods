
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
                        <?php $this->load->view('data_messages');?>
                    </div>
                                     
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                    		<div class="row">
                        <span class="label label-danger">Please be noted, after the orders was confirmed, cancelation of order no longer acceptable.</span>
                        <form action="" method="POST">
                            <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Pictures</th>
                                <th>Category</th>                                
                                <th>Name</th>
                                <th>Status Order</th>
                                <th>Method(Delivery)</th>
                                <th>Price(RM)</th>
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
                                  <input type="hidden" name="food_order_id[]" value="<?php echo $value['food_order_id'];?>">
                                </th>
                                <td><img src="<?php echo base_url();?>assets/uploads/files/<?php echo $value['food_picture'];?>" alt="..." width="50" height="50"></td>
                                <td><?php echo $value['food_category_name'];?></td>
                                <td><?php echo $value['food_name'];?></td>                                
                                <td>
                                <?php 
                                  if($value['food_order_status']==0)                                
                                    echo '<font color="red">This order not confirm yet</font>';
                                  else if($value['food_order_status']==1)  
                                    echo '<font color="green">Order confirmed</font>';                                
                                     
                                ;?>
                                </td>
                                <td>
                                <?php 
                                  if($value['food_order_delivery']==0)
                                  { ?>
                                    <input type="radio" name="food_order_delivery[<?php echo $radio_delivery_cod++;?>][]" value="1">COD
                                    <input type="radio" name="food_order_delivery[<?php echo $radio_delivery_shop++;?>][]" value="2" checked>Take at shop
                                  <?php }
                                  else
                                  { ?>
                                    <input type="radio" <?php if($value['food_order_delivery']==1) echo 'checked'?> name="food_order_delivery[<?php echo $radio_delivery_cod++;?>][]" value="1">COD
                                    <input type="radio" <?php if($value['food_order_delivery']==2) echo 'checked'?> name="food_order_delivery[<?php echo $radio_delivery_shop++;?>][]" value="2">Take at shop
                                  <?php }
                                ;?>
                                </td>      
                                <td>
                                <?php 
                                  $total += $value['food_price'];
                                  echo $value['food_price'];
                                ?>
                                </td>
                                <td>
                                <?php 
                                  if($value['food_order_status']==0)
                                  { ?>
                                    <a href="<?php echo base_url();?>booking/delete_order/<?php echo $value['food_order_id'];?>" class="btn btn-danger" role="button" onclick='return confirm("Are you sure to order this item");'>Delete</a> 
                                    
                                  <?php 
                                  }
                                  else
                                  {
                                    echo "No action";
                                  }
                                  
                                ;?></td> 
                              </tr>
                              <?php 
                              }
                              ?>
                              <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>                                
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>RM  <?php echo $total;?> : Total</th>

                              </tr>
                               </tbody>
                           </table>
                           <?php
                           
                           if($order_method)
                            {?>
                           <input type="submit" value="Confirm" name="submit" class="btn btn-info">
                           <?php
                            }
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
