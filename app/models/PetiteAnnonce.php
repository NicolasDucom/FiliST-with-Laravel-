<?php

class PetiteAnnonce extends Eloquent
{
	protected $table = 'petites_annonces';

	public function auteur()
	{
	    return $this->belongsTo('Utilisateur');
	}
}