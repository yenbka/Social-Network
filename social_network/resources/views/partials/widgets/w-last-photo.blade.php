<!-- W-Latest-Photo -->

{{--<ul class="widget w-last-photo js-zoom-gallery">--}}
<ul class="widget w-last-photo">
	@foreach($photos as $photo)
		<li>
			<a href="/uploads/{{$photo->link}}">
				<img src="/uploads/{{$photo->link}}"  alt="photo" width="87px" height="87px">
			</a>
		</li>
	@endforeach
</ul>

<!-- .. end W-Latest-Photo -->