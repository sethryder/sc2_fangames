<?php

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->library('tank_auth');
	}

	public function index()
	{
		if (!$this->tank_auth->is_logged_in()) 
		{
			redirect('/auth/login/');
		} 
		else
		{
			$data['player_count'] = $this->Admin_model->countPlayers();

			$this->load->view('admin_index', $data);
		}
	}

	public function clear()
	{
		if (!$this->tank_auth->is_logged_in())
		{
			redirect('/auth/login/');
			} else 
			{
				$this->load->view('admin_clear');
			}
		}

		public function clear_database()
		{
			if (!$this->tank_auth->is_logged_in())
			{
				redirect('/auth/login/');
			}
			else 
			{
				$this->Admin_model->clearPlayers();

				$this->load->view('admin_cleared');
			}
		}

		public function players()
		{
			if (!$this->tank_auth->is_logged_in()) 
			{
				redirect('/auth/login/');
			}
			else
			{
				if ($this->input->post('submit')) 
				{
					$race = $this->input->post('race');
					$rank = $this->input->post('rank');
					$limit = $this->input->post('limit');

					$data['players'] = $this->Admin_model->searchPlayers($race, $rank, $limit);

					$this->load->view('admin_players', $data);

				} 
				else
				{            
					$data['players'] = $this->Admin_model->randomPlayers(10);

					$this->load->view('admin_players', $data);
				}

			}   
		}

		public function config()
		{
			if (!$this->tank_auth->is_logged_in()) 
			{
				redirect('/auth/login/');
			}
			else
			{
				if ($this->input->post('submit')) 
				{

				}
				else
				{
					$data['config'] = $this->Admin_model->getConfig();            

					$this->load->view('admin_config', $data);
				}        
			}
		}
	}
	?>