<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_management extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->output->enable_profiler(TRUE);
	}	

	public function login()
	{

		$data['title'] = "Login Form";
		$this->load->view('login', $data);

		if($this->input->post('submit'))
		{
			$formData = $this->input->post();
			
			$table = "customers";
			$where = array(
						'customer_email'    => $formData['customer_email'],
						'customer_password' => $formData['customer_password']
					  );
			$customer = $this->k_model->get_specified_row($table, $where);


			if(isset($customer))
			{
				$sessionData = array(
								'user_id'  => $customer['customer_id'],
								'email'    => $customer['customer_email'],
								'category' => 'customer',
								'name'     => $customer['customer_name']
								);			
				
				$this->session->set_userdata($sessionData);
				redirect('welcome/index');
				
			}
			else
			{
				$message = "login_error";
				$urlToGo = 'user_management/login';
				$this->k_model->display_message($message, $urlToGo);
			}


		}

		
	}

	// Admin n staff login
	public function auth_login()
	{

		$data['title'] = "Admin/Staff Login Form";
		$this->load->view('login_admin_staff', $data);

		if($this->input->post('submit'))
		{
			$formData = $this->input->post();
			
			$table = "users";
			$where = array(
					  'user_username' => $formData['user_username'],
					  'user_password' => $formData['user_password']
					  );
			$info = $this->k_model->get_specified_row($table, $where);


			if(isset($info))
			{
				if($info['user_category']=="admin")
				{
					$sessionData = array(
								'user_id'  => $info['user_id'],
								'category' => 'admin',
								'name'     => $info['user_name']
								);			
				
					$this->session->set_userdata($sessionData);
					redirect('food_management');
				}
				else
				{
					$sessionData = array(
								'user_id'  => $info['user_id'],
								'category' => 'staff',
								'name'     => $info['user_name']
								);			
				
					$this->session->set_userdata($sessionData);
					redirect('order_management');
				}
				
				
			}
			else
			{
				$message = "login_error";
				$urlToGo = 'user_management/login_admin_staff';
				$this->k_model->display_message($message, $urlToGo);
			}


		}

		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$message = "logout";
		$urlToGo = 'welcome';
		$this->k_model->display_message($message, $urlToGo);
	}

	public function register()
	{
		$data['title'] = "Registration Form";
		$this->load->view('register', $data);

		if($this->input->post('submit'))
		{
			$formData = $this->input->post();

			$table = "customers";
			$arrayData = array(
						       'customer_password' =>$formData['customer_password'],
							   'customer_name'=>$formData['customer_name'],
							   'customer_ic'=>$formData['customer_ic'],
							   'customer_phone'=>$formData['customer_phone'],
							   'customer_email'=>$formData['customer_email'],
							   'customer_address' => $formData['customer_address']
							  );
			$this->k_model->insert_data($arrayData,$table);

			$message = "login";
			$urlToGo = 'user_management/login';
			$this->k_model->display_message($message, $urlToGo);
		}
	}


	public function  configuration_admin()
	{
		$data['title'] = "Configuration Form";
		$user_id = $this->session->userdata('user_id');
		$table = "users";
		$where = array(
					  'user_id' => $user_id
					  );
		$data['users'] = $this->k_model->get_specified_row($table, $where);
		$this->load->view('configuration_admin', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */