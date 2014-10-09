<?php

class MonCompteController extends BaseController
{
	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	public function getIndex()
	{
		return Response::make('Coming soon...');
	}
}