<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {

	

	public function order()
	{

		$food_id = $this->uri->segment(3);		
		$user_id = $this->session->userdata('user_id');

		if(!$user_id)
		{
			$message = "login";
			$urlToGo = 'user_management/login';
			$this->k_model->display_message($message, $urlToGo);
		}
		else
		{
			/*$data['title'] = $food_type;	

			$table = "foods";
			$tableNameToJoin = array('food_categories');
			$tableRelation = array('foods.food_category_id = food_categories.food_category_id');
			$where = array('foods.food_category_id' => $food_category);

			$data['foods'] = $this->k_model->get_all_rows($table, $where, $tableNameToJoin, $tableRelation);

			$this->load->view('foods', $data);*/
		}
						
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */