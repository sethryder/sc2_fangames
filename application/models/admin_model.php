<?php

class Admin_model extends CI_Model 
{

    function countPlayers()
    {
        $query = $this->db->get('players');
        return $query->num_rows();        
    }

    function randomPlayers($limit)
    {
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit($limit);
        $query = $this->db->get('players');

        foreach ($query->result() as $row) 
        {
            $players[] = array(
                'id' => $row->id,
                'account_name' => $row->account_name,
                'account_number' => $row->account_number,
                'race' => $row->race,
                'rank' => $row->rank,
            );
        }
 
        return $players;

    }

    function searchPlayers($race, $rank, $limit)
    {
        if ($race != 0) 
        {
        $this->db->where('race', $race);
        }

        if ($rank != 0)
        {
        $this->db->where('rank', $rank);
        }

        $this->db->limit($limit);        
        $query = $this->db->get('players');

        foreach ($query->result() as $row) 
        {
            $players[] = array(
                'id' => $row->id,
                'account_name' => $row->account_name,
                'account_number' => $row->account_number,
                'race' => $row->race,
                'rank' => $row->rank,
            );
        }
    
        if (!isset($players)) 
        {
            $players = NULL;
        }

        return $players;
    }
    
    function clearPlayers()
    {
        $this->db->empty_table('players');
    }
    
}