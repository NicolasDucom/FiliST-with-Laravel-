@extends('page-without-sidebar')
@section('content')
	<div class="row box">
		<div class="col-md-6">
			<h2 style="text-align: center;">Connectez-vous</h2>
			{{Form::open(array('url' => 'auth/login', 'class' => 'form-horizontal'))}}
			@if(Session::has('error_login'))
				<div class="alert alert-danger">{{Session::get('error_login')}}</div>
			@endif
			<form class="form-horizontal">
				<div class="control-group">
				  <label class="control-label" for="email">Adresse email :</label>
				  <div class="controls">
				    <input id="email" name="email" type="text" placeholder="john@doe.net" class="col-md-6" required="">
				  </div>
				</div><br><br>
				<div class="control-group">
				  <label class="control-label" for="mot_de_passe">Mot de passe :</label>
				  <div class="controls">
				    <input id="mot_de_passe" name="mot_de_passe" type="password" class="col-md-6" required="">
				  </div>
				</div><br>
				<div class="control-group">
				  <label class="control-label" for="souvenir"></label>
				  <div class="controls">
				    <label class="checkbox inline" for="souvenir-0">
				      <input type="checkbox" name="souvenir" id="souvenir-0" value="Se souvenir de moi">
				      Se souvenir de moi
				    </label>
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="login"></label>
				  <div class="controls">
				    <button id="login" name="login" class="btn btn-primary">Se connecter !</button>
				  </div>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			<h2 style="text-align: center;">Inscrivez-vous</h2>
		</div>
	</div>
@stop