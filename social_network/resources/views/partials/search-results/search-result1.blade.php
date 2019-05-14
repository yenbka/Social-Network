<!-- Search Result -->
<input id="my_token" name="_token" type="hidden" value="{{csrf_token()}}">
<article class="hentry post searches-item">

	<div class="post__author author vcard inline-items">
		<img src="{{asset($profile_result[$i]->avatar_path)}}" width="42" height="42" alt="author">

		<div class="author-date">
			<a class="h6 post__author-name fn" href="{{route('profile', ['id' => $user_result[$i]->id])}}">{{$user_result[$i]->first_name.' '.$user_result[$i]->last_name}}</a>
			<div class="country">{{$profile_result[$i]->address}}</div>
		</div>

		<span id="relationship{{$i}}" class="notification-icon">
			@if ($relationship_result[$i] == 0)
				<a id="add{{$i}}" href="javascript:;" class="accept-request" onclick="send_request({{$user_result[$i]->id}}, {{$i}})">
				<span class="icon-add without-text">
					<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
				</span>
				Thêm bạn
			</a>
			@endif

			@if ($relationship_result[$i] == 1)
				<a id="accept{{$i}}" href="javascript:;" class="accept-request" onclick="process_request(1, {{$user_result[$i]->id}}, {{$i}})">
                    <span class="icon-add">
                    	<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                    </span>
                </a>
				<a id="deny{{$i}}" href="javascript:;" class="accept-request request-del" onclick="process_request(0, {{$user_result[$i]->id}}, {{$i}})">
                    <span class="icon-minus">
                        <svg class="olymp-happy-face-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use></svg>
                    </span>
                </a>
			@endif

			@if ($relationship_result[$i] == -1)
				<button type="button" class="btn btn-success">Đã gửi lời mời</button>
			@endif

			@if ($relationship_result[$i] == -2)
				<button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>Bạn bè</button>
		@endif

			<button id="error{{$i}}" type="button" class="btn btn-warning d-none">Đã có lỗi xảy ra!</button>
		</span>
	</div>

	<p class="user-description">
		<span class="title">Giới thiệu: {{$profile_result[$i]->about_me}}</span>
	</p>

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
			data: {request_id:id, _token: $('#my_token').val()},
			success: function (response) {
				if (response.code == 200) {
					$("#add" + idx).addClass("d-none");
					$("#relationship" + idx).append('<button type="button" class="btn btn-success">Đã gửi lời mời</button>');
				} else {
					$("#add" + idx).addClass("d-none");
					$("#error" + idx).removeClass("d-none");
				}
			},
			error: function () {
				$("#add" + idx).addClass("d-none");
				$("#error" + idx).removeClass("d-none");
			}
		});
	}

	function process_request(is_accept, id, idx){

		var BASE_URL = "{{ url('/') }}";
		$.ajax({
			url: BASE_URL + '/friend/process_request',
			type: "POST",
			data: {is_accept: is_accept, request_id: id, _token: $('#my_token').val()},
			success: function (response) {
				$("#accept" + idx).addClass("d-none");
				$("#deny" + idx).addClass("d-none");
				if (response.code == 200) {
					if (is_accept == 1) {
						$("#relationship" + idx).append('<button type="button" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>Bạn bè</button>');
					} else {
						$("#relationship" + idx).append('<button type="button" class="btn btn-success">Đã từ chối</button>');
					}
				} else {
					$("#error" + idx).removeClass("d-none");
				}
			},
			error: function () {
				$("#accept" + idx).addClass("d-none");
				$("#deny" + idx).addClass("d-none");
				$("#error" + idx).removeClass("d-none");
			}
		});
	}
</script>