<link rel="stylesheet" href= "../css/main.css">

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
					<li><a href="{{ route('appointment') }}">Appointment</a></li>
						<li><a href="{{ route('record') }}">Patient Health Record</a></li>
                        <li><a style="background-color:#e9c11f; color: rgb(255, 255, 255);">Storage</a></li>
                    </ul>
				</nav>
		</div>
	</section>

	<!--Greetings-->
	<section>
		<div class="greetings">
			<h1>Storage</h1>
		</div>
		<p style="position: inherit; margin: 5px 0 0 4%;">This page allows you to monitor the medicine stocks</p>

		<div>
    		@yield('main')
  		</div>
	</section>