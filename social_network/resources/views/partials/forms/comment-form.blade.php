
<!-- Comment Form  -->
@php
    $currentProfile = \App\Http\Controllers\ProfileController::getProfile(Auth::id());
@endphp
<form class="comment-form inline-items" action="#" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">

	<div class="post__author author vcard inline-items">
		<img src="{{asset($currentProfile->avatar_path)}}" alt="author">

		<div class="form-group with-icon-right ">
			<textarea class="form-control" id="comment-content{{$post->id}}" placeholder=""></textarea>
		</div>
	</div>

	<button class="btn btn-md-2 btn-primary comment" id="comment-btn{{$post->id}}" data-postid="{{$post->id}}" type="submit">Bình luận</button>
</form>

<!-- ... end Comment Form  -->