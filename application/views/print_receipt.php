<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    
    <style type="text/css">
      .col-centered{
    float: none;
    margin: 0 auto;
}
    </style>


</head>

<body>

    
       
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-6 col-centered" >
                       
                        <div class="page-header">
                          <h1>Receipt </h1>
                        </div>
                    		<div class="row">
                        
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
                                <td><img src="<?php echo base_url();?>assets/uploads/files/<?php echo $value['food_picture'];?>" alt="..." width="50" height="50"></td>
                                <td><?php echo $value['food_category_name'];?></td>
                                <td><?php echo $value['food_name'];?></td>                                
                                <td>
                                <?php 
                                  if($value['food_order_status']==0)                                
                                    echo '<font color="red">This order not confirm yet</font>';
                                  else if($value['food_order_status']==1)  
                                    echo '<font color="green">Order confirmed</font>';
                                  else if($value['food_order_status']==2)  
                                    echo '<font color="orange">Delivery Process</font>';
                                  else if($value['food_order_status']==3)  
                                    echo '<font color="green">Delivered</font>';
                                  else if($value['food_order_status']==4)  
                                    echo '<font color="red">Food out service</font>';                                
                                     
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
                          
                           
                        </form><br/><br/><br/>
                            </div>
                    	</div>
                    </div>
                    <!-- /.col-lg-12 -->                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        





<!-- dont disturb here -->
    </div>
    <!-- /#wrapper -->
       <?php $this->load->view('main_footer'); ?>

       <script type="text/javascript">
       $(function()
       {
        window.print();
       })
       </script>

</body>

</html>
