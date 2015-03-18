<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_management extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}	

	public function list_order_staff()
	{
		$data['title'] = "List Orders";
		$table = "food_order";
		/*$where = array(
						'food_order_status' => 1,
						'food_order_status' => 2,
						'food_order_status' => 3,
						'food_order_status' => 4
					);*/
		/*$tableNameToJoin = array(
						'customers'
					);
		$tableRelation = array(
						'food_order.customer_id = customers.customer_id'
					);*/
		$data['orders'] = $this->k_model->get_distinct_order($table);
		$this->load->view('list_order_staff.php', $data);
	}

	public function list_order_staff_detail()
	{
		$data['title'] = "Details Order";
		$customer_id = $this->uri->segment(3);

		$table = "customers";
		$where = array(
						'customer_id' => $customer_id
					);
		$data['customer'] = $this->k_model->get_specified_row($table,$where);


		$table = "food_order";
		$where = array(
						'customer_id' => $customer_id
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
		$this->load->view('list_order_staff_detail.php', $data);

		if($this->input->post())
		{
			$arrayData = $this->input->post();
			$customer_id = $arrayData['customer_id'];
			$food_order_status = $arrayData['food_order_status'];

			if($food_order_status==4)
			{
				$columnToUpdate = array(
									'food_order_notis' => 'Food out of services',
									'food_order_status' => $food_order_status
									);
			}
			else
			{
				$columnToUpdate = array(
									'food_order_notis' => '',
									'food_order_status' => $food_order_status
									);
			}

			$tableToUpdate = "food_order";

			for($i=0; $i<count($arrayData['food_order_id']); $i++)
			{
				$usingCondition = array(
									'food_order_id' => $arrayData['food_order_id'][$i]
									);
				$this->k_model->update_data($columnToUpdate, $tableToUpdate, $usingCondition);
			}

			$message = "update";
			$url = 'order_management/list_order_staff';
			$this->k_model->display_message($message,$url);
		}
	}

	public function print_receipt()
	{
		$customer_id = $this->uri->segment(3);




		$table = "food_order";
		$where = array(
						'customer_id' => $customer_id,
						'food_order_status' => 3
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
		$this->load->view('print_receipt', $data);
	}
	

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */