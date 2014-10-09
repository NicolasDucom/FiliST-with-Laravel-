<?php

class AuthController extends BaseController 
{
    public function __construct()
    {

    }

    public function getIndex()
    {
        if (Auth::check())
            return Redirect::to('mon-compte');
        else
            return View::make('auth.index');
    }

    public function postLogin()
    {
        if (Input::has('email', 'mot_de_passe')) {
            if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('mot_de_passe')))) {
                return Redirect::intended('mon-compte');
            } else {
                return Redirect::to('auth')->with('error_login', 'Identifiants non reconnus.');
            }
        }

        return Redirect::to('/');
    }

    public function getLogout()
    {
        
        return (Auth::logout() AND Redirect::to('/'));
    }

    public function getTest()
    {
        $t = new Utilisateur;
        $t->email = 'me@valentinpolo.fr';
        $t->mot_de_passe = Hash::make('polopolo42');
        $t->save();
    }
}