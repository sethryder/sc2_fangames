<?php

class Signups_model extends CI_Model {

	function addPlayer($account_name, $account_number, $race, $rank, $ip)
	{        
		$data = array(
			'account_name' => $account_name, 
			'account_number' => $account_number, 
			'race' => $race, 
			'rank' => $rank, 
			'ip' => $ip
			);

		$this->db->insert('players', $data);        
	}

	function accountCheck ($account_name, $account_number)
	{
		$this->db->where('account_name', $account_name);
		$this->db->where('account_number', $account_number);
		$query = $this->db->get('players');

		if ($query->num_rows() > 0)
		{
			return false;   
		}
		else
		{
			return true;
		}
	}

	function ipCheck ($ip)
	{
		$this->db->where('ip', $ip);
		$query = $this->db->get('players');

		if ($query->num_rows() >= 3)
		{
			return false;   
		}
		else
		{
			return true;
		}
	}

}