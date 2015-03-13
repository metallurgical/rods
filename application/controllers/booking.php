<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	

	public function order()
	{

		$user_id = $this->session->userdata('user_id');

		if(!$user_id)
		{
			$message = "login";
			$urlToGo = 'user_management/login';
			$this->k_model->display_message($message, $urlToGo);
		}
		else
		{
			$food_id = $this->uri->segment(3);

			$table = "food_order";
			$arrayData = array(
							'customer_id' => $user_id,
							'food_id' => $food_id,
							'food_order_delivery' => 0,
							'food_order_status' => 0 // Dalam Proses(new order)
						);
			$this->k_model->insert_data($arrayData,$table);

			$message = "order";
			$urlToGo = 'booking/list_order';
			$this->k_model->display_message($message, $urlToGo);
		}
						
		
	}

	public function list_order()
	{
		$data['title'] = "Order List";
		$user_id = $this->session->userdata('user_id');

		$table = "food_order";
		$where = array(
						'customer_id' => $user_id
					);
		$tableNameToJoin = array(
						'foods',
						'food_categories'
					);
		$tableRelation = array(
						'food_order.food_id = foods.food_id',
						'foods.food_category_id = food_categories.food_category_id'
					);
		$data['orders'] = $this->k_model->get_all_rows($table,$where, $tableNameToJoin, $tableRelation);

		$order_method = false;
		foreach ($data['orders'] as $key => $value) {
			if($value['food_order_delivery']==0)
			{
				$order_method = true;
			}
		}

		$data['order_method'] = $order_method;

		$this->load->view('list_order', $data);

		if($this->input->post('submit'))
		{
			$formData = $this->input->post();
			$data['food_order_id'] = $formData['food_order_id'];
			$data['food_order_delivery'] = $formData['food_order_delivery'];


			for($i = 0; $i < count($data['food_order_id']); $i++)
			{
				$tableToUpdate 			= "food_order";
				$usingCondition = array(
									'food_order_id' => $data['food_order_id'][$i]
								);
				$columnToUpdate = array(
									'food_order_status' => 1,
									'food_order_delivery' => $data['food_order_delivery'][$i][0]
								);
				$this->k_model->update_data($columnToUpdate, $tableToUpdate, $usingCondition);
			}

			$message = "confirm_order";
			$urlToGo = 'booking/list_order';
			$this->k_model->display_message($message, $urlToGo);
		}

	}


	public function delete_order()
	{
		$food_order_id = $this->uri->segment(3);
		$table = "food_order";
		$where = array(
						'food_order_id' => $food_order_id
					);
		$this->k_model->delete_data($table, $where);

		$message = "delete";
		$urlToGo = 'booking/list_order';
		$this->k_model->display_message($message, $urlToGo);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */