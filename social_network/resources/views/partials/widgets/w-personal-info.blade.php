<!-- W-Personal-Info -->

<ul class="widget w-personal-info item-block">
	@if($profile->about_me&&strlen($profile->about_me)>0)
		<li>
			<span class="title">Về tôi:</span>
			<span class="text">{{$profile->about_me}}</span>
		</li>
	@endif
	@if($hobbies->hobbie&&strlen($hobbies->hobbie)>0)
		<li>
			<span class="title">Sở thích:</span>
			<span class="text">{{$hobbies->hobbie}}</span>
		</li>
	@endif
</ul>

<!-- .. end W-Personal-Info -->