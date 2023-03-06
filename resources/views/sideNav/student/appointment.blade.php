<link rel="stylesheet" href= "../css/main.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

<!--Header and Navigation-->
<section>
	<!--Header-->
	<div class="header">
		<label id="burger" for="toggle">&#9776;</label>
		<img class="APC" src="../assets/APC_Logo.png" alt="">
		<a class="Logo" href="#">E-Cliniq</a>
		<div class="dropdown">
			<label id="username" for="name">{{ Auth::user()->name }}</label>
			
			<input type="checkbox" id="name">
			<div class="dropdown-content">
			<a class="dropdown-item" href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
				@csrf
				</form>
			</div>
		</div>
	</div>

	<!--Burger nav-->
	<div class="container">
		<input type="checkbox" id="toggle">
			<nav>
				<ul>
					<li><a style="background-color:#e9c11f; color: rgb(255, 255, 255);">Appointment</a></li>
					<li><a href="{{ route('student.record') }}">My Health Record</a></li>
				</ul>
			</nav>
	</div>
</section>

<!--Greetings-->
<section>
	<div class="greetings">
		<h1>Appointment</h1>
	</div>
	<p style="position: inherit; margin: 5px 0 0 4%;">what do you want to do?</p>
	
	<!--Content-->
	<div class="content_show">
		<div id='full_calendar_events'></div>
	</div>
</section>

{{-- Scripts --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
	$(document).ready(function () {
		var SITEURL = "{{ url('/') }}";
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var calendar = $('#full_calendar_events').fullCalendar({
			editable: true,
			editable: true,
			events: SITEURL + "/calendar-event",
			displayEventTime: true,
			eventRender: function (event, element, view) {
				if (event.allDay === 'true') {
					event.allDay = true;
				} else {
					event.allDay = false;
				}
			},
			selectable: true,
			selectHelper: true,
			select: function (event_start, event_end, allDay) {
				var event_name = prompt('Event Name:');
				if (event_name) {
					var event_start = $.fullCalendar.formatDate(event_start, "Y-MM-DD HH:mm:ss");
					var event_end = $.fullCalendar.formatDate(event_end, "Y-MM-DD HH:mm:ss");
					$.ajax({
						url: SITEURL + "/calendar-crud-ajax",
						data: {
							event_name: event_name,
							event_start: event_start,
							event_end: event_end,
							type: 'create'
						},
						type: "POST",
						success: function (data) {
							displayMessage("Event created.");
							calendar.fullCalendar('renderEvent', {
								id: data.id,
								title: event_name,
								start: event_start,
								end: event_end,
								allDay: allDay
							}, true);
							calendar.fullCalendar('unselect');
						}
					});
				}
			},
			eventDrop: function (event, delta) {
				var event_start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
				var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
				$.ajax({
					url: SITEURL + '/calendar-crud-ajax',
					data: {
						title: event.event_name,
						start: event_start,
						end: event_end,
						id: event.id,
						type: 'edit'
					},
					type: "POST",
					success: function (response) {
						displayMessage("Event updated");
					}
				});
			},
			eventClick: function (event) {
				var eventDelete = confirm("Are you sure?");
				if (eventDelete) {
					$.ajax({
						type: "POST",
						url: SITEURL + '/calendar-crud-ajax',
						data: {
							id: event.id,
							type: 'delete'
						},
						success: function (response) {
							calendar.fullCalendar('removeEvents', event.id);
							displayMessage("Event removed");
						}
					});
				}
			}
		});
	});
	function displayMessage(message) {
		toastr.success(message, 'Event');            
	}
</script>