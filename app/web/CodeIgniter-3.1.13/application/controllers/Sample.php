<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$query = $this->db->query('SELECT name FROM sample');
		foreach ($query->result() as $row)
		{
			echo $row->name . '<br />';
		}
		echo 'Total Results: ' . $query->num_rows();
	}
}
