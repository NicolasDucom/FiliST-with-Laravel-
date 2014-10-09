<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Utilisateur extends Eloquent implements UserInterface, RemindableInterface {

	protected $table = 'utilisateurs';
	protected $hidden = array('mot_de_passe');
	protected $appends = array('infos');

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->mot_de_passe;
	}

	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getInfosAttribute()
	{
		return DB::table('utilisateurs_infos')
			->where('utilisateur_id', '=', $this->id)
			->first();
	}

}