<!-- Search Result -->
<input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
<article class="hentry post searches-item">

	<div class="post__author author vcard inline-items">
		<img src="{{asset($profile_result[$i]->avatar_path)}}" width="42" height="42" alt="author">

		<div class="author-date">
			<a class="h6 post__author-name fn" href="02-ProfilePage.html">{{$user_result[$i]->first_name.' '.$user_result[$i]->last_name}}</a>
			<div class="country">{{$profile_result[$i]->address}}</div>
		</div>

		<span class="notification-icon">
			<a id="add{{$i}}" href="#" class="accept-request" onclick="send_request({{$user_result[$i]->id}}, {{$i}})">
				<span class="icon-add without-text">
					<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
				</span>
				Thêm bạn
			</a>

			<!-- <a href="#" class="accept-request chat-message">
				<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
			</a> -->
			<button id="sent{{$i}}" type="button" class="btn btn-success d-none">Đã gửi lời mời</button>
			<button id="error{{$i}}" type="button" class="btn btn-warning d-none">Đã có lỗi xảy ra!</button>
		</span>

		<!-- <div class="more">
			<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
			<ul class="more-dropdown">
				<li>
					<a href="#">Edit Post</a>
				</li>
				<li>
					<a href="#">Delete Post</a>
				</li>
				<li>
					<a href="#">Turn Off Notifications</a>
				</li>
				<li>
					<a href="#">Select as Featured</a>
				</li>
			</ul>
		</div> -->

	</div>

	<p class="user-description">
		<span class="title">Giới thiệu: {{$profile_result[$i]->about_me}}</span>
	</p>

	<div class="post-block-photo js-zoom-gallery">
		<a href="img/post-photo3.jpg" class="col col-3-width"><img src="img/post-photo3.jpg" alt="photo"></a>
		<a href="img/post-photo4.jpg" class="col col-3-width"><img src="img/post-photo4.jpg" alt="photo"></a>
		<a href="img/post-photo5.jpg" class="more-photos col-3-width">
			<img src="img/post-photo5.jpg" alt="photo">
			<span class="h2">+352</span>
		</a>
	</div>

	<div class="post-additional-info">

		<ul class="friends-harmonic">
			<li>
				<a href="#">
					<img src="img/friend-harmonic9.jpg" alt="friend">
				</a>
			</li>
			<li>
				<a href="#">
					<img src="img/friend-harmonic10.jpg" alt="friend">
				</a>
			</li>
			<li>
				<a href="#">
					<img src="img/friend-harmonic7.jpg" alt="friend">
				</a>
			</li>
			<li>
				<a href="#">
					<img src="img/friend-harmonic8.jpg" alt="friend">
				</a>
			</li>
			<li>
				<a href="#">
					<img src="img/friend-harmonic11.jpg" alt="friend">
				</a>
			</li>
		</ul>
		<div class="names-people-likes">
			You and Marina have
			<a href="#">4 Friends in Common</a>
		</div>

		<div class="friend-count">
			<a href="#" class="friend-count-item">
				<div class="h6">189</div>
				<div class="title">Friends</div>
			</a>
			<a href="#" class="friend-count-item">
				<div class="h6">254</div>
				<div class="title">Photos</div>
			</a>
			<a href="#" class="friend-count-item">
				<div class="h6">16</div>
				<div class="title">Videos</div>
			</a>
		</div>

	</div>

</article>
<!-- ... end Search Result -->
<script>
function send_request(id, idx){

    var BASE_URL = "{{ url('/') }}";
	// var data = new FormData();
	// data.append('request_id', id);

	$.ajax({
		url: BASE_URL + '/friend/send_request',
		type: "POST",
		data: {request_id:id, _token: $('#signup-token').val()},
		success: function (response) {
			if (response.code == 200) {
				$("#add"+idx).addClass("d-none");
				$("#sent"+idx).removeClass("d-none");
			} else {
				$("#add"+idx).addClass("d-none");
				$("#error"+idx).removeClass("d-none");
			}
		},
		error: function () {
			$("#add"+idx).addClass("d-none");
			$("#error"+idx).removeClass("d-none");
		}
	});
}
</script>