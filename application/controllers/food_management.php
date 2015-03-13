<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Food_management extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->output->enable_profiler(TRUE);
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
		/*$crud->unset_columns('student_id','appointment_reply')
			 ->unset_read_fields('student_id'); // never displayed this column in list

		$crud->add_fields('appointment_date','appointment_time','appointment_message','student_id')
			 ->edit_fields('appointment_date','appointment_time','appointment_message');

		$crud->callback_column('appointment_status',array($this,'callback_display_status'))
			 ->callback_read_field('appointment_status',array($this,'callback_display_status')) // on view/read part
			 ->callback_read_field('appointment_reply',array($this,'callback_display_reply'))
			 ->callback_before_insert(array($this,'callback_add_student_data'));  // on view/read part
	
		$crud->change_field_type('student_id','invisible');*/



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

    	/*$a = ($value == 0) ? 'selected' : '';
    	$b = ($value == 1) ? 'selected' : '';
    	$c = ($value == 2) ? 'selected' : '';
    	$d = ($value == 3) ? 'selected' : '';
*/
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
		
		/*$crud->callback_column('food_category_id',array($this,'callback_food_categories'))
			 ->callback_read_field('food_category_id',array($this,'callback_food_categories'))
			 ->callback_field('food_category_id',array($this,'callback_add_food_categories'));
*/
		$crud->set_field_upload('promotion_picture','assets/uploads/files');
		/*$crud->unset_columns('student_id','appointment_reply')
			 ->unset_read_fields('student_id'); // never displayed this column in list

		$crud->add_fields('appointment_date','appointment_time','appointment_message','student_id')
			 ->edit_fields('appointment_date','appointment_time','appointment_message');

		$crud->callback_column('appointment_status',array($this,'callback_display_status'))
			 ->callback_read_field('appointment_status',array($this,'callback_display_status')) // on view/read part
			 ->callback_read_field('appointment_reply',array($this,'callback_display_reply'))
			 ->callback_before_insert(array($this,'callback_add_student_data'));  // on view/read part
	
		$crud->change_field_type('student_id','invisible');*/



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
		
		/*$crud->callback_column('food_category_id',array($this,'callback_food_categories'))
			 ->callback_read_field('food_category_id',array($this,'callback_food_categories'))
			 ->callback_field('food_category_id',array($this,'callback_add_food_categories'));
*/
		/*$crud->set_field_upload('promotion_picture','assets/uploads/files');*/
		/*$crud->unset_columns('student_id','appointment_reply')
			 ->unset_read_fields('student_id'); // never displayed this column in list

		$crud->add_fields('appointment_date','appointment_time','appointment_message','student_id')
			 ->edit_fields('appointment_date','appointment_time','appointment_message');

		$crud->callback_column('appointment_status',array($this,'callback_display_status'))
			 ->callback_read_field('appointment_status',array($this,'callback_display_status')) // on view/read part
			 ->callback_read_field('appointment_reply',array($this,'callback_display_reply'))
			 ->callback_before_insert(array($this,'callback_add_student_data'));  // on view/read part
	
		$crud->change_field_type('student_id','invisible');*/



		$output = $crud->render();
		$output->data = $data;
		$this->load->view('universal_page', $output);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */