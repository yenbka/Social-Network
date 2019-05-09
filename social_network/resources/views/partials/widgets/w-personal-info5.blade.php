
<!-- W-Personal-Info -->

<ul class="widget w-personal-info">
	<li>
		<span class="title">Name</span>
		<span class="text">{{$user->first_name.' '.$user->last_name}}</span>
	</li>
	<li>
		<span class="title">Birthday</span>
		<span class="text">{{$profile->birth_date}}</span>
	</li>
	<li>
		<span class="title">Address</span>
		<span class="text">{{$profile->address}}</span>
	</li>

	<li>
		<span class="title">Gender</span>
		@if($profile->gender==0)
			<span class="text">Male</span>
		@else
			<span class="text">Female</span>
		@endif
	</li>
	<li>
		<span class="title">Status</span>
		<span class="text">Married</span>
	</li>
	<li>
		<span class="title">Email</span>
		<span class="text">{{$user->email}}</span>
	</li>
	<!-- <li>
		<span class="title">Website:</span>
		<a href="#" class="text">daydreamsagency.com</a>
	</li> -->
	<li>
		<span class="title">Phone</span>
		<span class="text">{{$profile->phone}}</span>
	</li>
	<li>
		<span class="title">About Me</span>
		<span class="text">{{$profile->about_me}}</span>
	</li>
	<!-- <li>
		<span class="title">Religious Belifs:</span>
		<span class="text">-</span>
	</li>
	<li>
		<span class="title">Political Incline:</span>
		<span class="text">Democrat</span>
	</li> -->
</ul>

<!-- ... end W-Personal-Info -->