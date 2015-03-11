<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_management extends CI_Controller {

	

	public function login()
	{

		$data['title'] = "Login Form";
		$this->load->view('login', $data);
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
			$urlToGo = 'welcome';
			$this->k_model->display_message($message, $urlToGo);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */