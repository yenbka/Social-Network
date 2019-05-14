<!-- W-Latest-Photo -->

@php
	$currentID = Route::getCurrentRoute()->parameters()['id'];
	$currentPhotos = \App\Http\Controllers\PhotoController::getPhotos($currentID);
@endphp
<ul class="widget w-last-photo">
	@foreach($currentPhotos as $photo)
		<li>
			<a href="/uploads/{{$photo->link}}">
				<img src="/uploads/{{$photo->link}}"  alt="photo" width="87px" height="87px">
			</a>
		</li>
	@endforeach
</ul>

<!-- .. end W-Latest-Photo -->