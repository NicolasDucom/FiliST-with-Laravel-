<?php

class PetitesAnnoncesController extends BaseController
{
	public function getIndex()
	{
		return Redirect::to('petites-annonces/toutes');
	}

	public function getToutes()
	{
		return View::make('petites-annonces.toutes')
			->with('petitesAnnonces', PetiteAnnonce::orderBy('id', 'DESC')->paginate(5));
	}

	public function getVoir($idPetiteAnnonce = null)
	{
		if (isset($idPetiteAnnonce)) {
			return View::make('petites-annonces.voir')->with('petiteAnnonce', PetiteAnnonce::find($idPetiteAnnonce));
		} else {
			return Redirect::to('/');
		}
	}
}