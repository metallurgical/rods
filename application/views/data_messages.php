<?php
                //if wanna add any more type, just add the array value here!!! 
                $arr = array(
                             array('text' => $this->session->flashdata('insert'), 'alert_type' => 'alert-success'),
                             array('text' => $this->session->flashdata('update'), 'alert_type' => 'alert-success'),
                             array('text' => $this->session->flashdata('error'), 'alert_type' => 'alert-danger'),
                             array('text' => $this->session->flashdata('delete'), 'alert_type' => 'alert-success'),
                             array('text' => $this->session->flashdata('email'), 'alert_type' => 'alert-success'),
                             array('text' => $this->session->flashdata('login'), 'alert_type' => 'alert-danger'),
                             array('text' => $this->session->flashdata('login_error'), 'alert_type' => 'alert-danger'),
                             array('text' => $this->session->flashdata('logout'), 'alert_type' => 'alert-success')
                             
                            );
                
                foreach ($arr as $key => $value) {
                    if($value['text']){
                        ?>
                        <div class="alert <?php echo $value['alert_type'];?> alert-dismissable">
                             <i class="fa fa-check"></i>
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <b><?php echo $value['text'];?> </b> 
                         </div>
                     <?php
                    }
                    
                }
               
?>

                