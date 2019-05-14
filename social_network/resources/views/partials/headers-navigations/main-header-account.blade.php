<!-- Main Header Account -->
@php
	$currentID = Route::getCurrentRoute()->parameters()['id'];
	$currentProfile = \App\Http\Controllers\ProfileController::getProfile($currentID);
@endphp
<div class="main-header">
	<div class="content-bg-wrap bg-account"></div>
	<img class="img-bottom" src="{{asset($currentProfile->header_path)}}" alt="friends" width="1920" height="640">
</div>

<!-- ... end Main Header Account -->
