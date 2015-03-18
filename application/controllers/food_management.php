<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Food_management extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			//$this->output->enable_profiler(TRUE);
	}	

	public function index()
	{
		$data['title'] = "Welcome Admin";
		$this->load->view('admin_index', $data);
	}

	public function food_manage()
	{
		
		$data['title'] = 'Food Management';

		$crud = new grocery_CRUD();
        $state = $crud->getState();
		
		$crud->set_table('foods');
		
		$crud->callback_column('food_category_id',array($this,'callback_food_categories'))
			 ->callback_read_field('food_category_id',array($this,'callback_food_categories'))
			 ->callback_field('food_category_id',array($this,'callback_add_food_categories'));

		$crud->set_field_upload('food_picture','assets/uploads/files');
		



		$output = $crud->render();
		$output->data = $data;
		$this->load->view('universal_page', $output);
	}

	public function callback_food_categories($value, $row)
	{
		$where       = array( 
			 					'food_category_id' => $value
			 				);
	    $student = $this->k_model->get_specified_row('food_categories',$where);
		return $student['food_category_name'];
	}

	public function callback_add_food_categories($value, $primary_key){

    	
    	$display = '<select name="food_category_id">
    					
    					<option value="1">Dessert</option>
    					<option value="2">Drink</option>
    					<option value="3">Food</option>
    				</select>';
    	return $display;
	}

	

	public function staff_manage()
	{
		
		$data['title'] = 'Staff Management';

		$crud = new grocery_CRUD();
        $state = $crud->getState();
		
		$crud->set_table('users')
			 ->where('user_category','staff');
		
		$crud->callback_column('food_category_id',array($this,'callback_food_categories'))
			 ->callback_read_field('food_category_id',array($this,'callback_food_categories'))
			 ->callback_field('user_category',array($this,'callback_user_categories'));

		
		



		$output = $crud->render();
		$output->data = $data;
		$this->load->view('universal_page', $output);
	}

	function callback_user_categories($value = '', $primary_key = null)
	{
    	return '<input type="text"  value="staff" name="user_category" readonly>';
	}


	public function promotion_manage()
	{
		
		$data['title'] = 'Promotions Management';

		$crud = new grocery_CRUD();
        $state = $crud->getState();
		
		$crud->set_table('promotions');	
		
		$crud->set_field_upload('promotion_picture','assets/uploads/files');
		$output = $crud->render();
		$output->data = $data;
		$this->load->view('universal_page', $output);
	}

	public function customer_manage()
	{
		
		$data['title'] = 'Promotions Management';

		$crud = new grocery_CRUD();
        $state = $crud->getState();
		
		$crud->set_table('customers');

		$output = $crud->render();
		$output->data = $data;
		$this->load->view('universal_page', $output);
	}

	public function order_manage()
	{
		
		$data['title'] = 'Customers Order';

		$crud = new grocery_CRUD();
        $state = $crud->getState();
		
		$crud->set_table('food_order')
		     ->or_where('food_order_status',1)
		     ->or_where('food_order_status',2)
		     ->or_where('food_order_status',3);

		$crud->unset_operations();

		$crud->display_as('food_id','Picture')
			 ->display_as('customer_id','Customer Name');

		$crud->callback_column('food_order_status',array($this,'callback_food_status'))
			 ->callback_column('food_order_delivery',array($this,'callback_food_delivery'))
			 ->callback_column('customer_id',array($this,'callback_customer'))
			 ->callback_column('food_id',array($this,'callback_food'));

		$output = $crud->render();
		$output->data = $data;
		$this->load->view('universal_page', $output);
	}


	public function callback_food_status($value, $primary_key){

    	
    	if($value==1)
    	{
    		$status = "Confirmed";
    	}
    	else if($value==2)
    	{
    		$status = "Delivering Process";
    	}
    	else if($value==3)
    	{
    		$status = "Delivered";
    	}
    	return $status;
	}


	public function callback_food_delivery($value, $primary_key)
	{

    	
    	if($value==1)
    	{
    		$status = "Cash On Delivery";
    	}
    	else if($value==2)
    	{
    		$status = "Self Take";
    	}
    	
    	return $status;
	}


	public function callback_customer($value, $row)
	{
		$where       = array( 
			 					'customer_id' => $value
			 				);
	    $student = $this->k_model->get_specified_row('customers',$where);
		return $student['customer_name'];
	}

	public function callback_food($value, $row)
	{
		
		$tableNameToJoin = array(						
							'food_categories'
							);
		$tableRelation = array(
							'foods.food_category_id = food_categories.food_category_id'
							);
		$where        = array( 
			 				'food_id' => $value
			 				);
	    $info = $this->k_model->get_specified_row('foods',$where, $tableNameToJoin, $tableRelation);
		return '<img src="'.base_url().'assets/uploads/files/'.$info['food_picture'].'" width="50" height="50">';
		//$info['food_category_name']
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */