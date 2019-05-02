<!-- W-Personal-Info -->

<ul class="widget w-personal-info item-block">
	@if($profile->about_me&&strlen($profile->about_me)>0)
		<li>
			<span class="title">About Me:</span>
			<span class="text">{{$profile->about_me}}</span>
		</li>
	@endif
	@if($hobbies->hobbie&&strlen($hobbies->hobbie)>0)
		<li>
			<span class="title">My hobbies:</span>
			<span class="text">{{$hobbies->hobbie}}</span>
		</li>
	@endif
</ul>

<!-- .. end W-Personal-Info -->