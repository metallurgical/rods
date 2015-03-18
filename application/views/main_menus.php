<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="<?php echo base_url();?>welcome"><i class="fa fa-dashboard fa-fw"></i> Index</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Menus<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url();?>welcome/menus/3">Food</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>welcome/menus/1">Dessert</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>welcome/menus/2">Drink</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>welcome/promotions"><i class="fa fa-dashboard fa-fw"></i> Promotion</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url();?>welcome/contact_us"><i class="fa fa-dashboard fa-fw"></i> Contact Us</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> My Account<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                <?php
                                if($this->session->userdata('user_id'))
                                {
                                ?>
                                <li>
                                    <a href="<?php echo base_url();?>booking/list_order">Order</a>
                                </li>
                                <!-- <li>
                                    <a href="<?php echo base_url();?>user_management/login">Message</a>
                                </li> -->
                                <?php
                                }
                                else
                                {
                                ?>
                                <li>
                                    <a href="<?php echo base_url();?>user_management/login">Login</a>
                                </li>
                                <?php
                                }
                                ?>     
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        
                        
                        
                    </ul>
                
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>