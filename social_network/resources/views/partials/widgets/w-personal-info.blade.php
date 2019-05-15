<!-- W-Personal-Info -->
@php
	$currentID = Route::getCurrentRoute()->parameters()['id'];
	$currentUser = \App\User::find($currentID);
	$currentProfile = \App\Http\Controllers\ProfileController::getProfile($currentID);
	$currentHobbies = \App\Http\Controllers\HobbieController::getHobbie($currentID);
@endphp
<ul class="widget w-personal-info item-block">
	@if($currentProfile->about_me&&strlen($currentProfile->about_me)>0)
		<li>
			<span class="title">Về tôi:</span>
			<span class="text">{{$currentProfile->about_me}}</span>
		</li>
	@endif
	@if($currentHobbies->hobbie&&strlen($currentHobbies->hobbie)>0)
		<li>
			<span class="title">Sở thích:</span>
			<span class="text">{{$currentHobbies->hobbie}}</span>
		</li>
	@endif
</ul>

<!-- .. end W-Personal-Info -->