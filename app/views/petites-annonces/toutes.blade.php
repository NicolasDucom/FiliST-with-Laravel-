@extends('page-with-sidebar')

@section('content')
<div class="box">
  <hr>
  <h2 class="intro-text text-center">Toutes les <strong>Petites-Annonces</strong> de la FST</h2>
  <hr>
  @foreach($petitesAnnonces as $petiteAnnonce)
  	<div class="well well-sm toutes_petites_annonces">
  		<h4><a href="{{URL::to('/petites-annonces/voir/'.$petiteAnnonce->id)}}">{{$petiteAnnonce->titre}}</a> <small>{{$petiteAnnonce->etat}}</small></h4>
  		<p>{{$petiteAnnonce->description}}</p>
  		<span class="label label-primary">Prix : {{$petiteAnnonce->prix}} €</span>
  		@if(isset($petiteAnnonce->localisation))
  			<span class="label label-info">Lieu : {{$petiteAnnonce->localisation}}</span>
  		@endif
  	</div>
  @endforeach
  <p class="text-center">{{$petitesAnnonces->links()}}</p>
</div>
@stop

@section('sidebar')
<div class="box">
  <hr>
  <h2 class="intro-text text-center"><strong>Je trouve mon Bonheur</strong></h2>
  <hr>
  <p><input type="text" class="recherchePetitesAnnonces" /></p>
</div>
@stop