<?php

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{  
		//Load our Signups Model. We use this to interact with the dtabase.
		$this->load->model('Signups_model');

		//Load our form validation library.
		$this->load->library('form_validation');

		//Grab the person IP. Help prevent form submit spam.
		$ip = $this->input->ip_address();

		//Set our required validations for the form.            
		$this->form_validation->set_rules('account_name', 'Character Name', 'xss_clean|max_length[15]|required|callback_account_check[' . $this->input->post('account_number') . ']|callback_ip_check[' . $ip . ']');
		$this->form_validation->set_rules('account_number', 'Character Number', 'required|exact_length[3]|numeric|xss_clean');
		$this->form_validation->set_rules('race', 'Race', 'required|exact_length[1]|numeric|xss_clean');
		$this->form_validation->set_rules('rank', 'Rank', 'required|exact_length[1]|numeric|xss_clean');

		//Set some error messages.
		$this->form_validation->set_message('account_check', 'You have signed up already!');
		$this->form_validation->set_message('ip_check', 'You IP has hit the signup limit!');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('signup_form');
		}
		else
		{
			$account_name = $this->input->post('account_name', TRUE);
			$account_number = $this->input->post('account_number', TRUE); 
			$race = $this->input->post('race', TRUE);
			$rank = $this->input->post('rank', TRUE);

			//Add the player.
			$this->Signups_model->addPlayer($account_name, $account_number, $race, $rank, $ip); 

			//Show our success page.
			$this->load->view('signup_sucess');
		}

	}

	function account_check($account_name, $account_number)
	{
		return $this->Signups_model->accountCheck($account_name, $account_number);
	}

	function ip_check($blank, $ip)
	{
		return $this->Signups_model->ipCheck($ip);
	}
}