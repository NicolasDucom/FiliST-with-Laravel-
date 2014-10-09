<?php

class TrombinoscopeController extends BaseController
{
	public function getIndex()
	{
		return Response::make('TROMBINO INDEX');
	}
}