@extends('page-without-sidebar')

@section('custom_css')

@stop

@section('content')
<div class="col-lg-12 box">
	<div id="tchat_container"></div>
	<div>
	    <span id="status">Connexion en cours...</span><br>
	    <input type="text" id="input" disabled="disabled" />
	    <input type="hidden" id="tchat_pseudo" value="{{Auth::user()->infos->prenom}} {{Auth::user()->infos->nom}}" />
	</div>
</div>
@stop

@section('custom_js')
<script type="text/javascript" src="/assets/js/frontend-chat.js"></script>
<script type="text/javascript">
	var pseudo = $('#tchat_pseudo').val();
</script>
@stop