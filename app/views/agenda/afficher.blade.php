@extends('page-without-sidebar')

@section('custom_css')
<link rel='stylesheet' type='text/css' href='/assets/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='/assets/fullcalendar/fullcalendar.print.css' />
@stop

@section('content')
<div class="col-lg-12 box calendrier_container">
	<div id="calendrier"></div>
</div>
@stop

@section('custom_js')
<script src="/assets/fullcalendar/moment.js"></script>
<script src="/assets/fullcalendar/fullcalendar.min.js"></script>
<script src='/assets/fullcalendar/lang/fr.js'></script>
<script>
  $(document).ready(function() {
    $('#calendrier').fullCalendar({
      height: 650,
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek'
      },
      defaultView: 'agendaWeek',
      editable: false,
      minTime: 10,
      events: {
        url: '/agenda/json/{{$promo}}'
      }
    });
  });
</script>
@stop