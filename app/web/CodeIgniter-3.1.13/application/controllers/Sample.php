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

	public function indexWithCache()
	{
		$this->load->driver('cache');

		$cacheKey  = 'cache_key';
		$cacheTTL = 3600;

		$cacheData = $this->cache->memcached->get($cacheKey);
		if ($cacheData === FALSE) {
			$this->load->database();
			$query = $this->db->query('SELECT name FROM sample');
			$cacheData = $query->result();
			$this->cache->memcached->save($cacheKey, $cacheData, $cacheTTL);
		}

		foreach ($cacheData as $row)
		{
			echo $row->name . '<br />';
		}
		echo 'Total Results: ' . count($cacheData);
	}
}
