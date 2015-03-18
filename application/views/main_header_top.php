<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Restaurant Al-Idrus(Restoran Order and Delivery System)</a>
            </div>
            
            <ul class="nav navbar-top-links navbar-right">
                
                
                <?php

                if($this->session->userdata('category') == "staff" or $this->session->userdata('category') == "admin")
                {
                    
                        ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url();?>user_management/edit_profile"><i class="fa fa-user fa-fw"></i> Edit Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>user_management/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    
                </li>
                <?php
                    
                }
                else if($this->session->userdata('category')=="")
                {
                }
                else if ($this->session->userdata('category')!="" and $this->session->userdata('category')!="staff" and $this->session->userdata('category')!="admin") {
                    # code...
                
                 ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="<?php echo base_url();?>user_management/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    
                </li>
                <?php
                }
                ?>
               
            </ul>
            