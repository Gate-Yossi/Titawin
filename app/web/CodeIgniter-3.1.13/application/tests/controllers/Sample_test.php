<?php

class Sample_test extends DbTestCase
{
	public function test_index()
	{
		$this->hasInDatabase('sample', [
			'name' => 'unit test'
		]);
		$output = $this->request('GET', 'sample/index');
		$this->assertStringContainsString('test<br />テスト2<br />てすと３<br />unit test<br />Total Results: 4', $output);
	}

}
