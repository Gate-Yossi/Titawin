<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cache extends CI_Controller {

	public function memcached()
	{
		$this->load->driver('cache');

		$cacheKey  = 'cache_key';
		$cacheData = 'data_to_be_cached';
		$cacheTTL = 3600;

		$ret = $this->cache->memcached->save($cacheKey, $cacheData, $cacheTTL);
		echo sprintf('save is %s <br />', $ret ? 'success' : 'fail');

		$data = $this->cache->memcached->get($cacheKey);
		echo sprintf('data is [%s] <br />', $data);

		$ret = $this->cache->memcached->delete($cacheKey);
		echo sprintf('delete is %s <br />', $ret ? 'success' : 'fail');

		$data = $this->cache->memcached->get($cacheKey);
		echo sprintf('data is [%s] <br />', $data);

	}
}
