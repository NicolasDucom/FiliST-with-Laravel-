<?php

class AgendaController extends BaseController
{
	public function __construct()
	{

	}

	public function getIndex()
	{
		return Redirect::to('agenda/afficher');
	}

	public function getAfficher($promo = 'M1')
	{
		return View::make('agenda.afficher')
			->with('promo', $promo);
	}

	public function getJson($promo = 'M1')
	{
		$semaine = date("W", strtotime(Input::get('start')));

		return Response::json(Agenda::recupererPlanningDeLaSemaineCourantePourLaPromo($promo, $semaine));
	}
}