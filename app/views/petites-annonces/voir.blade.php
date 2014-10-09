@extends('page-with-sidebar')

@section('content')
<div class="box">
  <hr>
  <h2 class="intro-text text-center">Voir une <strong>Petite-Annonce</strong></h2>
  <hr>
  <button class="btn btn-primary" onClick="javascript: history.go(-1)">Retour</button><br>
  <h1>{{ $petiteAnnonce->titre }}</h1>
  @if ($petiteAnnonce->image != '')
    <img src="{{ $petiteAnnonce->image }}" class="img-thumbnail" /><br><br>
  @endif
  <div class="well well-sm">
    {{ $petiteAnnonce->description }}
  </div>
  <span class="label label-primary">Prix : {{$petiteAnnonce->prix}} €</span> 
  <span class="label label-info">Lieu : {{$petiteAnnonce->localisation}}</span> 
  <span class="label label-info">Depuis le : {{date('d/m/y - H:m:s', strtotime($petiteAnnonce->date_publication))}}</span><br><br>
  <button class="btn btn-primary" onClick="javascript: history.go(-1)">Retour</button><br><br>
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