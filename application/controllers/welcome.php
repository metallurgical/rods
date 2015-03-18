<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}
	
	public function index()
	{
		$this->load->view('index');
		
	}

	public function menus(){

		$food_category = $this->uri->segment(3);		
		$food_type =   (($food_category == 1) ? "Dessert" :
						(($food_category == 2) ? "Drink" :
						(($food_category == 3) ? "Food" :"out of borders"
						)));
						
		$data['title'] = $food_type;
		

		$table = "foods";
		$tableNameToJoin = array('food_categories');
		$tableRelation = array('foods.food_category_id = food_categories.food_category_id');
		$where = array('foods.food_category_id' => $food_category);

		$data['foods'] = $this->k_model->get_all_rows($table, $where, $tableNameToJoin, $tableRelation);

		$this->load->view('foods', $data);
	}

	public function contact_us()
	{
		$data['title'] = "Contact Us";
		$this->load->view('contact_us', $data);
	}


	public function promotions(){

						
		$data['title'] = 'Promotions';
		

		$table = "promotions";

		$data['promotions'] = $this->k_model->get_all_rows($table);

		$this->load->view('promotions', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */